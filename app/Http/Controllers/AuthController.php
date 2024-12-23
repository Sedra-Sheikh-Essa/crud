<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm(){
        return view("auth.login");
    }

    public function login(Request $request){
        if(Auth::attempt([
            "email" => $request->email ,
            "password" => $request->password ,
            "is_admin" => true ,
            ])){
            $request->session()->regenerate();
            return redirect()->route("users.index");
        }
        else if(Auth::attempt([
            "email" => $request->email ,
            "password" => $request->password ,
            "is_admin" => false ,
            ])){
            $request->session()->regenerate();
            return redirect()->route("posts.index");
        }
        else{
            return back()->withErrors(["massage" => "invalid email or password"]);
        }
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route("login");
    }


}
