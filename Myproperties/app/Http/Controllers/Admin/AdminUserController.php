<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;

class AdminUserController extends Controller
{
    public function __construct() {
        $this->middleware('superadmin');
    }

    public function index() {
    	return view('admin.users.index', ['users' => user::all()]);
    }

    public function view($id) {
    	$user = null;

    	if(is_null($id) || is_null($user = User::find($id))) {
    		return redirect()->back()->with('error', 'User not found!');
    	}

    	return view('admin.users.view', ['users' => $user]);
    }

    public function delete(Request $request) {
        $user = null;

        if(is_null($request->id) || is_null($user = User::find($request->id))) {
            return redirect()->back()->with('error', 'User not found!');
        }

        if(Auth::id() == $request->id) {
            return redirect()->back()->with('error', 'User is Active!');
        }

        $user->delete();
        return redirect()->back()->with('status', 'User Deleted Successfully!');
    }
}
