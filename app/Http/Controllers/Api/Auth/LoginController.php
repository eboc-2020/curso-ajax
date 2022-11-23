<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\UserResourse;
use App\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //
    public function store(Request $request){
        //dd('hola');
        $request->validate([
            'email'=>'required|string|email',
            'password'=>'required|string',
        ]);

        $user = User::where('email', $request->email)->firstOrFail(); //por si el email no exist en la BD
        
        if(Hash::check($request->password,$user->password)){
            return UserResourse::make($user);
        }else{
            return response()->json(['message' =>'Las credenciales son incorrectas'],400);
        }
    }
}
