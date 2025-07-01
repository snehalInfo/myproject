<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;
use App\Models\ShortUrl;
use Auth;
use Hash;
class SuperAdminController extends Controller
{
    //

    public function index(Request $request)
    {
    	$user_id = Auth::user()->id;

    	$adminCount = User::where('inviter_id',$user_id)->count();
    	$companyCount = Company::count();
    	
        return view('superadmin.dashboard',compact('adminCount','companyCount'));
    }

    public function inviteList(Request $request)
    {
    	$user_id = Auth::user()->id;

    	$data = User::where('inviter_id',$user_id)->get();
        return view('superadmin.invitlist',compact('data'));
    }

    public function invitation(Request $request)
    {
    	$company = Company::all();
        return view('superadmin.invitation',compact('company'));
    }

    public function invite(Request $request)
	{
	    $request->validate([
	    	'name' =>'required',
	        'email' => 'required|email|unique:users,email',
	        'company' => 'required',
	    ]);

	    $user_id = Auth::user()->id;
	   // echo $user_id;die;
	    $password = "admin@123";

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($password),
            'role' => 'Admin',
            'company_id' => $request->company,
            'inviter_id'=>$user_id,
        ]);

	    return redirect('superadmin/invitation')->with('success','User invited successfully');
	}

    public function urlList(Request $request)
    {
        $data = ShortUrl::all();
        return view('superadmin.urllist',compact('data'));
    }

}
