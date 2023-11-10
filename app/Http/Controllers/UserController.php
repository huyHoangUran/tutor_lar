<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login()
    {
        return view('fe.login');
    }
    public function register()
    {
        return view('fe.register');
    }
    public function postRegister(Request $request)
    {
        // validate
        // Hash::make($request->password);
        $request->merge(['password' => Hash::make($request->password)]);
        try {
            User::create($request->all());
        } catch (\Throwable $th) {
            dd($th);
        }
        return redirect()->route('login');
    }
    public function postLogin(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('index');
        } else {
            return redirect()->back()->with('error', 'sai');
        };
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->back();
    }
}