<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //
    public function store(Request $request){
        $request->validate([
            'email'=>'required|string|email',
            'password'=>'required|string',
        ]);

        $user = User::where('email', $request->email)->firstOrFail(); //por si el email no exist en la BD

        if(Hash::check($request->email,$user->password)){
            return $user;
        }else{
            response()->json(['message' =>'Las credenciales son incorrectas'],400);
        }
    }
}
