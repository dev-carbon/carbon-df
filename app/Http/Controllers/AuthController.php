<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginFormRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login() {

        // User::create([
        //     'name' => 'dev-carbon',
        //     'email' => 'dev-carbon@mail.com',
        //     'password' => Hash::make('000'),
        // ]);

        return view('auth.login');
    }

    public function attemptLogin(LoginFormRequest $request) {
        $credentials = $request->validated();
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard'));
        }

        return back()->withErrors([
            'email' => 'Email ou mot de passe incorrect.',
        ])->onlyInput('email');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('home');
    }
}
