<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (
            $request->username === env('ADMIN_USERNAME') &&
            $request->password === env('ADMIN_PASSWORD')
        ) {
            session(['admin_logged_in' => true]);

            return redirect()->route('admin.memories.index');
        }

        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ]);
    }

    public function logout(Request $request)
    {
        $request->session()->forget('admin_logged_in');

        return redirect()->route('admin.login');
    }
}