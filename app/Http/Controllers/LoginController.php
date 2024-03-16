<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function show()
    {
        return view('app.login');
    }
    public function login(Request $request)
    {
        $login = $request->login;
        $password = $request->password;
        $credentials = [
            'email' => $login,
            'password' => $password
        ];
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (Auth::user()->email == 'admin@admin.admin') {
                return redirect()->route('admin.index');
            } else {
                return redirect()->route('accueil');
            }
        } else {
            return redirect()->route('login.show')->with('error', 'Compte inexistant ou mot de passe incorrect');
        }
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('login.show');
    }
}
