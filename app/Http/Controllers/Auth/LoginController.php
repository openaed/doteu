<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller {

    public function loginPage() {
        if(auth()->check()) return redirect()->route('admin.dashboard');
        return view('pages.auth.login');
    }

    public function login(Request $request) {
        if(auth()->check()) return redirect()->route('admin.dashboard');
        $credentials = $request->only('email', 'password');

        $user = User::where('email', $credentials['email'])->first();
        if(!$user) {
            return back()->withErrors([
                'email' => 'Account does not exist',
            ]);
        }

        $passwordCorrect = Hash::check($credentials['password'], $user->password);

        if(!$passwordCorrect) {
            return back()->withErrors([
                'password' => 'Password is incorrect',
            ]);
        } else {
            Auth::login($user);
            $user->update([
                'last_logged_in_at' => now(),
            ]);
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('home');
    }

}
