<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserBlogDetails;
use App\Http\Requests\UserDetailsRequest;
use File;
class UserBlogController extends Controller
{
    public function dashboardPage()
    {
    	$blog['blogdetails'] = UserBlogDetails::where('user_id',\Auth::user()->id)->get();
    	return view('userblog',$blog);
    }

    public function UserDetail(UserDetailsRequest $request)
    {

    	//dd($request->all());
    	$imageName = null;
    	if($request->hasfile('image_name'))
    	{
    		$imageName = time().'.'.$request->image_name->getclientOriginalExtension();
    		$destinationpath = public_path('/image');
    		$request->image_name->move($destinationpath,$imageName);

    	}
        
        UserBlogDetails::create(['image_name'=> $imageName , 'title' => $request->title , 'description' => $request->description, 'tag' => $request->tag,'user_id' => \Auth::user()->id]);

         return redirect(url('/dashboard'));

    }

    public function UserdetailDelete($id)
    {

    	UserBlogDetails::where('id',$id)->delete();
    	return redirect(url('/dashboard'));
    }

     public function UserdetailEdit($id)
    {
    	
    	$blogdata['blogvalue'] = UserBlogDetails::where('user_id',\Auth::user()->id)->first();
    	return view('edituserblog',$blogdata);
    }

    public function UserdetailUpdate(Request $request)
    {

    	//dd($request->all());

    	$imageName = null;
    	if($request->hasfile('image_name'))
    	{
    		$imageName = time().'.'.$request->image_name->getclientOriginalExtension();
    		$destinationpath = public_path('/image');
    		$request->image_name->move($destinationpath,$imageName);

    	}
        
    	
    	$blogdata['blogvalue'] = UserBlogDetails::where('user_id',\Auth::user()->id)->update(['image_name'=> $imageName , 'title' => $request->title , 'description' => $request->description, 'tag' => $request->tag,'user_id' => \Auth::user()->id]);
    	return redirect(url('/dashboard'));
    }
}
