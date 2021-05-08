<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\User;
use App\UserBlogDetails;

class SignupController extends Controller
{
    public function signupPage()
    {
    	$blog['blogdetails'] = UserBlogDetails::get();
    	return view('dashboard',$blog);
    }

    public function registration(UserRequest $request)
    {
    	$password = \Hash::make($request->password);
    	user::create(['name'=> $request->name,'email'=>$request->email,'password'=>$password]);

    	return redirect(url('/signup'));
    }

    public function login(UserRequest $request)
    {

    	if(\Auth::attempt(['email'=> $request->email,'password'=> $request->password]))
    	{
    		return redirect(url('/dashboard'));
    	}
    	else{

    		return redirect(url('/signup'));
    	}
    }

    public function logout()
    {
    	\Auth::logout();

    	return redirect(url('/signup'));
    }
}
