<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Hash;
use Validator;
use Session;
use App\Models\User;
use Auth;
use App\Repositories\Eloquent\UserRepositoryEloquent;
use App\Models\EmailTemp;
class UserController extends Controller
{
    protected $userrepo;
    /**
     * Create a new authentication controller instance.
     *
     * @param UserRepositoryEloquent $user the user repository
     *
     * @return void
     */
    public function __construct(UserRepositoryEloquent $user)
    {
        $this->userrepo = $user;
    }
    /**
     * Store a report to the database.
     *
     * @param Request $request the reporting request
     *
     * @return Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
        $data= $request->all();
        $folderPath = config('path.avatar');
        $file = $request->file('file');
        $filename = '';
        $upload = '';
        if (null != $file) {
            $filename = time() . '_'.$file->getClientOriginalName();
            $upload = $file->move($folderPath, $filename);
            $data['avatar'] = $filename;
        }
        $list = $this->userrepo->find(Auth::user()->id);
        if (!empty($list)) {
            $datareturn = $this->userrepo->update($data, Auth::user()->id);
            return response()->json(['avatar'=>$datareturn,'mes'=>'update avatar success'], 200);
        } else {
            return response()->json(['mes'=>'error update image']);
        }
    }
     /**
     * Store a report to the database.
     *
     * @param Request $request the reporting request
     *
     * @return Illuminate\Http\Response
     */
    public function postRegister(Request $request){
        
    	$validator = Validator::make($request->all(), [
            'name' 		=> 'required',
            'email' 	=> 'required|unique:tbl_user,email',
            'age'       => 'required',
            'password' 	=> 'required',
            'country' 	=> 'required',
            'code' 		=> 'required'

        ]);

        
        if($validator->fails()){
            return response()->json([
                'errors' => $validator->messages(),
                'code' => 0
            ]);
        }
        $name = $request->get('name');
        $email = $request->get('email');
        $password = Hash::make($request->get('password'));
        $age = $request->get('age');
        $country = $request->get('country');
        $code = $request->get('code');

        $findEmail = EmailTemp::where('email', $email)->first();
        if($findEmail){
            if($findEmail->access_code !== $code){
                return response()->json([
                    'errors' => 'Wrong access code',
                    'code' => 0
                ]);
                
            }
            
        }else{
            return response()->json([
                'errors' => 'This email have not been sent access code',
                'code' => 0
            ]);
        }
    	

    	

    	$user = new User;
        $user->username = $name;
    	$user->email = $email;
        $user->age = $age;
    	$user->password_hash = $password;
        $user->password = $password;
    	$user->country = $country;
        $user->save();

        return response()->json([
            'message' => 'Register Sucess...',
            'code' => 1
        ]);
    }
     /**
     * log out a report to the database.
     *
     * @return Illuminate\Http\Response
     */
    public function logout(){
        Auth::logout();
        return redirect('/');
    }
    /**
     * Store a report to the database.
     *
     * @param Request $request the reporting request
     *
     * @return Illuminate\Http\Response
     */
    public function getprofile(){
        $banner = false;
        $text_banner = '';
        $user = Auth::user();
        return view('frontend.profile', compact('banner', 'text_banner', 'user'));
    }


    public function updateLeftProfile(Request $request){

        $validator = Validator::make($request->all(),[
            'firstname'     => 'required',
            'lastname'      => 'required',
            'mobilephone'   => ['regex:/(0|(\+))([0-9]){1,4}(\s)*(\.)*([0-9](\.)*(-)*){6,15}/'],
            'phone'         => ['regex:/(0|(\+))([0-9]){1,4}(\s)*(\.)*([0-9](\.)*(-)*){6,15}/']
        ]); 

        if($validator->fails()){
            return response()->json([
                'errors' => $validator->messages(),
                'code' => 0
            ]);
        }

        $firstname = $request->get('firstname');
        $lastname = $request->get('lastname');
        $mobilephone = $request->get('mobilephone');
        $phone = $request->get('phone');
        $address = $request->get('address');
        $confirmcurrentpassword = $request->get('confirmcurrentpassword');
        $confirmnewpassword = $request->get('confirmnewpassword');
        $newpassword = $request->get('newpassword');

        $user = Auth::user();
        $user->first_name = $firstname;
        $user->last_name = $lastname;
        $user->mobile_phone = $mobilephone;
        $user->workphone = $phone;
        $user->address = $address;

        if($confirmcurrentpassword != '' && $confirmnewpassword != ''  && $newpassword != ''){
             $validator = Validator($request->all(), [
                'newpassword' => 'min:6',
                'confirmnewpassword' => 'same:newpassword',
            ]);
            if($validator->fails()){
                return response()->json([
                    'errors' => $validator->messages(),
                    'code' => 0
                ]);
            }
            if(!Hash::check($confirmcurrentpassword, Auth::user()->password)){
                return response()->json([
                    'errors' => 'Wrong password',
                    'code' => 0
                ]);

            }
            $user->password = Hash::make($newpassword);
            $user->password_hash = Hash::make($newpassword);
        }
        $user->save();
        return response()->json([
            'message' => 'Update Success',
            'code' => 1
        ]);
    }
}
