<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticateController extends Controller
{
    public function login(){
        return view('login.login');
    }

    public function registrasi() {
        return view('login.registrasi');
    }


    public function authentic(Request $request) {
        $credentials = $request->validate([
            'username' => 'required|max:255|min:2',
            'password' => 'required|min:6|max:255'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/dashboard');
        }

        return redirect('/login')->with('failed', 'Login failed ⚠!!');
    }


    public function store(Request $request) {
        $validateData = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'max:255',
            'username' => 'required|unique:users|min:2|max:255',
            'password' => 'required|min:6|max:255'
        ]);


        $validateData['password'] = Hash::make($validateData['password']);

        User::create($validateData);

        return redirect('/login')->with('success', 'Registrasi user success!');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('success', 'Logout user success!');
    }
}
