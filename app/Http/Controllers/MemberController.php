<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Company;
use App\Models\ShortUrl;
use Illuminate\Support\Str;
use Auth;
use Hash;

class MemberController extends Controller
{
    //

    public function index(Request $request)
    {
    	$user_id = Auth::user()->id;
    	$data = ShortUrl::where('user_id',$user_id)->get();

        return view('dashboard',compact('data'));
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

	    return redirect('dashboard')->with('success','ShortUrl created successfully');
	    
	}
}
