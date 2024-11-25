<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function registerPage(){
        $title = 'Register Page';
        return view('auth.register',compact('title'));
    }
    public function register(Request $request){
        $validated = $request->validate([
            'nama' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);
        $validated['password'] = Hash::make($validated['password']);
        $validated['tanggal_daftar'] = now();
        User::create($validated);
        return redirect()->route('login')->with('success', 'Registration successful!');
    }
    public function loginPage(){
        $title = 'Login Page';
        return view('auth.login', compact('title'));
    }
    public function login(Request $request){
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }
        return back()->with('error', 'Login gagal!');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
