<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class UserController extends Controller
{
    public function profile(){
    	$user = User::find(Auth::user()->id);
    	return view('profile', compact('user'));
    }
}
