<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class UserProfile extends Controller
{
  public function index()
  {

$name=Auth::user()->name;
$email=Auth::user()->email;


    return view('content.pages.pages-profile-user',compact('name','email'));
  }
}
