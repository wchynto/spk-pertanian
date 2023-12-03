<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function viewLogin()
    {
        return view('login.login', [
            'title' => 'Login'
        ]);
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentaials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentaials, $request->has('remember') ? true : false)) {
            $request->session()->regenerate();

            return redirect()->intended('admin/dashboard');
        }

        return back()->with('error', 'Email atau Password salah!')->withInput($request->only('username'));
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
