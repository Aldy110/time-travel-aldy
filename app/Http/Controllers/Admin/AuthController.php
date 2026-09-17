<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (
            $credentials['username'] === env('ADMIN_USERNAME') &&
            $credentials['password'] === env('ADMIN_PASSWORD')
        ) {
            $request->session()->put('admin_logged_in', true);

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