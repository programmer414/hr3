<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class LoginBasic extends Controller
{
 
    public function index()
    {
        $pageConfigs = ['myLayout' => 'blank'];
        return view('content.authentications.auth-login-basic', ['pageConfigs' => $pageConfigs]);
    }


public function loginpost(Request $request) {
    $user = User::where('email', $request->email)->first();
    if (!$user) {
        return redirect()->back()->with('error', 'User not found');
      }
    if (!Hash::check($request->password, $user->password)) {
        return redirect()->back()->with('error', 'Incorrect credentials');
      }

    Auth::login($user);
    return redirect('/dashboard/crm')->with('success', 'Login successful!');
    }

}






