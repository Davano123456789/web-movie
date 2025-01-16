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
        $request->validate([
            "username"=> "",
            "password"=> ""
        ]);
// mengecek login
    if (Auth::attempt($request->only("username","password"))) {
    $user = Auth::user();
    if ($user->role_id == 1) {
        return redirect("dashboard");
        }else {
            return redirect("/");
        }

        }
        return back()->withErrors(['loginError' => 'Invalid credentials'])->withInput();
    }

        public function logout(Request $request){
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('login');
            
        }

        

}
