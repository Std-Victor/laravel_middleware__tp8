<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class loginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function login(Request $request){
        if($request->username === 'admin' && $request->password === 'admin'){
            $request->session()->put('username', $request->username);
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'username' => 'Username not found'
        ])->onlyInput('username');
    }

    public function logout(Request $request){
        $request->session()->flush();
        return redirect('/login');
    }
}
