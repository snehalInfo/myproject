<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;
use App\Models\ShortUrl;
use Illuminate\Support\Str;
use Auth;
use Hash;

class AdminController extends Controller
{
    //

    public function index(Request $request)
    {
    	$user_id = Auth::user()->id;

    	$adminCount = User::where('inviter_id',$user_id)->count();
        return view('admin.dashboard', compact('adminCount'));
    }

    public function inviteList(Request $request)
    {
    	$user_id = Auth::user()->id;

    	$data = User::where('inviter_id',$user_id)->get();
        return view('admin.invitlist',compact('data'));
    }

    public function invitation(Request $request)
    {
    	$company_id = Auth::user()->company_id;
    	$company = Company::where('id',$company_id)->first();

        return view('admin.invitation',compact('company'));
    }

    public function invite(Request $request)
	{
	    $request->validate([
	    	'name' =>'required',
	        'email' => 'required|email|unique:users,email',
	        'user_type' => 'required',
	        'company' => 'required',
	    ]);

	    $user_id = Auth::user()->id;
	   // echo $user_id;die;
	    $password = "admin@123";

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($password),
            'role' => $request->user_type,
            'company_id' => $request->company,
            'inviter_id'=>$user_id,
        ]);

	    return redirect('admin/invitation')->with('success','User invited successfully');
	}

	public function urlList(Request $request)
    {
    	$company_id = Auth::user()->company_id;
    	$data = ShortUrl::where('company_id',$company_id)->get();
        return view('admin.urllist',compact('data'));
    }

    public function createUrl(Request $request)
	{

	    $request->validate([
	        'original_url' => 'required|url'
	    ]);

	    $shortCode = Str::random(6);

	    $user_id = Auth::user()->id;
	    $company_id = Auth::user()->company_id;

	    $shortUrl = ShortUrl::create([
	        'original_url' => $request->original_url,
	        'short_code' => $shortCode,
	        'user_id' => $user_id,
	        'company_id' => $company_id,
	    ]);

	    return redirect('admin/urllist')->with('success','ShortUrl created successfully');
	    
	}

}
