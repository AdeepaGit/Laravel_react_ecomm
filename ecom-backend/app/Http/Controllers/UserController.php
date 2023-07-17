<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function Register(Request $req)
    {
        $user= new User;
        $user->name=$req -> input('name');
        $user->email=$req -> input('email');
        $user->password=Hash::make($req -> input('password'));
        $user->save();
        return $user;
    }
    function Login(Request $req)
    {
        $user= user::where('email',$req->email)->first();
        if(!$user || !Hash::check($req->password, $user->password))
        {
          return ["status"=>"notok"];
        }
        return $user;
    }
}
