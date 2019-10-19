<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AccionController extends Controller
{
    public function postLogin(Request $request){
        $validator = Validator::make($request->all(),[
            "email" => "email|required",
            "password" => "required",
        ]);

        if($validator->fails()){
            return redirect()->back()->with(array(
                "estado" => "error",
                "errors" => $validator->messages(),
                "message" => "Usuario/Password incorrectos",
            ));
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('home');
        }

        return redirect()->back()->with(array(
            "estado" => "error",
            "errors" => [],
            "message" => "Usuario/Password incorrectos",
        ));
    }

    public function getLogout(){
        Auth::logout();
        return redirect()->intended('/');
    }
}
