<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    //
    public function index(Request $request) {
    	if($request->isMethod('GET')) {
    		return view('admin.profile.index', ['user' => Auth::user()]);
    	}
    	else
    	{
    		if($request->isMethod('POST')) {
    			$this->validate($request, [
    				'name' => 'required|string|min:3',
    				'email' => ['required', 'email', Rule::unique('users')->ignore(Auth::id())],
    				'phone' => ['required', Rule::unique('users')->ignore(Auth::id())]
    			]);
    			$user = Auth::user();
    			$user->name = $request->name;
    			$user->email = $request->email;
    			$user->phone = $request->phone;
    			$user->save();

    			return redirect()->back()->with('status', 'Profile Updated Successfully');
    		}
    		else
    		{
    			return redirect()->back()->with('error', 'Invalid Request');
    		}

    	}
    	
    }
}
