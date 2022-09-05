<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('pages/login');
    }

    public function store()
    {
        $attributes = request()->validate([
            'username'=>'required',
            'password'=>'required',
        ]);

        if(Auth::attempt($attributes))
        {
            session()->regenerate();
            return redirect('dashboard')->with(['success'=>'You are logged in.']);
        }
        else{
            return back()->withErrors(['error'=>'Email or password invalid.']);
        }
    }

    public function destroy()
    {
        Auth::logout();
        return redirect('/login')->with(['success'=>'You\'ve been logged out.']);
    }
}
