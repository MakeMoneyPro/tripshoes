<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Hash;

class AuthController extends Controller
{
   	public function postLogin(Request $request){
   		$validator = Validator($request->all(), [
            'email' => 'required',
            'password' => 'required'
        ]);

        $email = $request->get('email');
        $password = $request->get('password');
        $remember = $request->has('remember');
        
        if($validator->fails()){
            return response()->json([
                'errors' => $validator->messages(),
                'code' => 0
            ]);
        }
        if(!Auth::attempt(['email' => $email, 'password' => $password], $remember)){
            return response()->json([
                'errors' => 'Email or password not match',
                'code' => 0
            ]);
            
        }
        return response()->json([
            'errors' => 'Login Success',
            'code' => 1
        ]);
   	}
    /**
     * Display view Login
     *
     * @return void
     */
    public function getLogin()
    {
        return view('login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request input value
     *
     * @return \Illuminate\Http\Response
     */
    public function PostLoginAdmin(Request $request)
    {
        $this->validate($request, [
                'email'=>'required|email',
                'password'=>'required'
            ]);

        if (!Auth::attempt($request->only(['email','password']), $request->has('remember'))) {
            return redirect()->back()->with(trans('auth.info'), trans('auth.error_login'));
        }
        if (Auth::user()->is_guide==NULL) {
            return redirect()->route('home');
        } else {
            return redirect()->route('admin');
        }
    }
    /**
     * Display view AdminPage
     *
     * @return void
     */
    public function getAdmin()
    {
        return view('backend.layouts.master');
    }
}
