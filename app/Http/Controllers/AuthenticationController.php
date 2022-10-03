<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function index()
    {
        return Inertia::render('Auth/Login');
    }

    public function login(LoginRequest $request)
    {
        $credential = $request->validated();

        if (Auth::attempt($credential)) {
            if (Auth::user()->is_admin) {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('home');
            }
        }

        return redirect()->back()->withErrors([
            'authentication' => 'Bad email or bad password !'
        ]);
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
