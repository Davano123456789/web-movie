<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm(){
        return view("auth.login");
    }
    public function showRegisterForm(){
        return view("auth.register");
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string|min:6|max:255',
        ]);
    
        // Mengecek login
        if (Auth::attempt($request->only('username', 'password'))) {
            $user = Auth::user();
            if ($user->role_id == 1) {
                return redirect()->route('dashboard');
            } else {
                return redirect('/');
            }
        }
    
        // Jika login gagal
        return back()->withErrors([
            'loginError' => 'Username atau password salah.',
        ])->withInput();
    }
    
    

        public function logout(Request $request){
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('login');
            
        }

        public function register(Request $request){
            $request->validate([
                'username' => 'required|string|max:255|unique:users,username',
                'password' => 'required|string|min:6',
            ]);
            User::create([
                'role_id' => 2, // Nilai user_id otomatis terisi 2
                'username'=> $request->username,
                'password'=> Hash::make($request->password),
            ]);
            return redirect('login')->with('success', 'Registration successful. Please login.');

        }

}
