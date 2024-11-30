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

public function loginpost(Request $request){

// dd('test post', $request->all());

  $user = User::where('email', $request->email)->first();

  // dd($user);

  if(!$user){

    // TODO:
    return back()->with('error', 'user not found');
  }



  if(!Hash::check($request->password, $user->password)){
    return back()->with('error', 'incorrect credential');
  }



  Auth::login($user);


  return redirect('/dashboard/crm');

}
}






