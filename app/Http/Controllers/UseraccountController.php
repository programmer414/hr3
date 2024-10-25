<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UseraccountController extends Controller
{
    public function index()
  {

      $user_account= User::all(); 
   return view('content.pages.user-account', ['user_account' => $user_account]);
}


public function store(Request $request)
  {
   
          User::create([
            'name' => $request->name,
            'password' => $request->password,
            'email' => $request->email,
        ]);

               return back();

  }






}
