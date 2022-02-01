<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\CreateAccountRequest;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    public function login(LoginRequest $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($credentials)) {
            return redirect()->route('app.dashboard');
        }

        return back()->withErrors(['error' => 'Email ou Senha não conferem!']);

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('app.login');
    }

    public function createAccount(CreateAccountRequest $request)
    {

        $response = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        Session::flash('email', $response->email);

        return redirect()->route('app.login');

    }
}
