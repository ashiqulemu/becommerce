<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    public function login () {
        return view('admin.pages.auth.login');
    }

    public function changePassword () {

        return view('admin.pages.auth.update-password');
    }
    public function UpdatePassword (Request $request) {
        $this->validate($request, [
            'old_password'     => 'required',
            'new_password'     => 'required|min:6',
            'repeat_password'  => 'required|same:new_password',
        ]);
        $current_password = Auth::User()->password;
        if(Hash::check($request['old_password'], $current_password))
        {
            $user_id = Auth::User()->id;
            $obj_user = User::find($user_id);
            $obj_user->password = Hash::make($request['new_password']);;
            $obj_user->save();
            return redirect('/admin/dashboard')->with([
                'type'      => 'success',
                'message'   => 'Password Change successfully'
            ]);;
        } else {
            return redirect()->back()->with([
                'type'      => 'error',
                'message'   => 'Current password did not match please try again'
            ]);;
        }

    }
}
