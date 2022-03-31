<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class RegisterController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|string|email|max:255|unique:users',
            'password'=>'required|string|min:8|confirmed'
        ]);

            //$request->all()
        $user = User::create([
            'name' => $request->name,
            'email' =>$request->email,
            'password'=> bcrypt($request->password)]);
        
        return response($user,200);
    }
}
