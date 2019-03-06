<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Http\Requests\StoreProfile;

class UserController extends Controller
{
	public function update(StoreProfile $req, User $user)
	{
		if ($req->get('password') == '') {
		    $user->update($req->except('password'));
		} else {
		    $user->update($req->all());
		}

		return redirect()->route('profile', ['user' => $user])->with('info', 'Your profile has been updated successfully.');
	}

    public function profile()
    {
    	$user = User::find(Auth::user()->id);
    	return view('profile', compact('user'));
    }
}
