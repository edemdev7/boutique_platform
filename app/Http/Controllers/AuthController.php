<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller {
    public function showRegisterForm() {
        return view('auth.register');
    }

    public function register(Request $request) {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'age'      => 'required|integer|min:1',
            'password' => 'required|string|min:6|confirmed',
        ]);
        
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'age'      => $request->age,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);
        return redirect()->route('login.form')->with('success', 'Votre inscription a été réalisée avec succès. Veuillez vous connecter.');    }

    public function showLoginForm() {
        return view('auth.login');
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'email' => 'Les informations de connexion ne correspondent pas.',
        ]);
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login.form');
    }
}
