<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\UserRepositoryEloquent;
use Hash;
use Mail;
use Session;
use Validator;
use App\Models\EmailTemp;

class PasswordController extends Controller
{
	use ResetsPasswords;

	protected $user;
	public function __construct(UserRepositoryEloquent $user)
   {
       $this->middleware('guest');
       $this->user = $user;
   }

    public function sendEmailChangePassword(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email'
        ]);
        if($validator->fails()){
            return response()->json([
                'errors' => $validator->messages(),
                'code' => 0
            ]);
        }
    	$email = $request->get('email');
        $findUser = $this->user->findByField('email', $email)->first();
        $allEmailTemp = EmailTemp::all();
        $arrAccessCode = array();
        foreach($allEmailTemp as $emailtemp){
            array_push($arrAccessCode, $emailtemp->access_code);
        }
        $access_code = $this->generateRandomString();
        while(in_array($access_code, $arrAccessCode)){
            $access_code = $this->generateRandomString();
        }
        if($findUser){
            $findEmail = EmailTemp::where('email', $email)->first();
            if(!$findEmail){
                $emailtemp = new EmailTemp();
                $emailtemp->email = $email;
                $emailtemp->access_code = $access_code;
                $emailtemp->save();
            }else{
                $findEmail->access_code = $access_code;
                $findEmail->save();
            }

            
            Mail::send('frontend.sendEmailChangePassword', ['access_code' => $access_code], function ($m) use ($email){

                $m->to($email, 'abc')->subject('Reset Password');
            });
            return response()->json([
                'message' => 'An confirmation was sent to your. Be check it',
                'code' => 1     
            ]);
        }else{
            return response()->json([
                'errors' => 'Email have not been registered',
                'code' => 0
            ]);
        }
    	
    }

    public function resetPassword(){
    	$banner = '/frontend/images/Depositphotos_53914195_original.jpg';
		$text_banner = 
		'<div class="banner-header">
			<h4>Daily Guided Trips in Hoi An</h4>
			<h1>Take a trip in <br> someone else\'s shoes</h1>
			<a href="#" class="btn btn-lg btn-success">Get early access</a>
		</div>';
		/*Mail::send('frontend.sendemail', ['user' => 'hello'], function ($m) {

            $m->to('luongviet82@gmail.com', 'Luong Viet')->subject('Your Reminder!');
        });*/
	    return view('frontend.resetPassword', compact('banner', 'text_banner'));
    }

    public function postResetPassword(Request $request){
        $validator = Validator::make($request->all(), [
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            'email' => 'required|email',
            'access_code' => 'required'
        ]);
        if($validator->fails()){
            return response()->json([
                'errors' => $validator->messages(),
                'code' => 0
            ]);
        }

        $email = $request->get('email');
        $access_code = $request->get('access_code');
    	$password = Hash::make($request->get('password'));
    	$confirm = $request->get('confirm_password');

        $allEmailTemp = EmailTemp::all();
        $arrEmailTemp = array();
        foreach($allEmailTemp as $emailTemp){
            array_push($arrEmailTemp, $emailTemp);
        }   

        
        if(in_array($email, $arrEmailTemp)){
            $findUser = $this->user->findByField('email', $email)->first();
            $findEmailTemp = EmailTemp::where('email', $email)->first();
            if($findEmailTemp->access_code !== $access_code){
                return response()->json([
                    'errors' => 'Access code is not suitable',
                    'code' => 0
                ]);
            }
            $findUser->password = $password;
            $findUser->password_hash = $password;
            $findUser->save();
            return response()->json([
                'message' => 'New Password is saved',
                'code' => 1
            ]);
        }else{
            return response()->json([
                'errors' => 'Email have not been sent access code or registered',
                'code' => 0
            ]);
        }
    }

    private function generateRandomString($length = 12){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
