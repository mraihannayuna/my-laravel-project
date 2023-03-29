<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *3
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('auth.login');
    }

        public function authenticate(Request $request)
    {


        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)) {
            return redirect('posts')->with('login_message', 'OhayoBlog Says : Welcome To OhayoBlog!');
        } else {
            return redirect('login')->with('error_message', 'OhayoBlog Says : Wrong email or password');
        }
    }

    public function logout() {
        Session::flush();
        Auth::logout();

        return redirect('login')->with('logout_message', "OhayoBlog Says : You've just logged out");
    }

    public function register_form() {
        return view('Auth.register');
    }

    public function register(Request $request) {

        $request->validate([
            'name' => 'required|min:3|max:30',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4|confirmed'
        ]);

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ]);

        return redirect('login');

    }

}
