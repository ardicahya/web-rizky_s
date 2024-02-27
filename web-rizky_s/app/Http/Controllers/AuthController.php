<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use function Laravel\Prompts\password;

class AuthController extends Controller
{
    // method untuk menampilkan form login
    public function showFormLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request){
        $validateData = $request->validate([
            'email' => 'required|email', 
            'password' => 'required',
        ]);

        if (auth()->attempt($validateData)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin');
        }

        return back()->with('error', 'email atau password salah');
    }

    public function logout(){
        auth()->logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/login');
    }
}
