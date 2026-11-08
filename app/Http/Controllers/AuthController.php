<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Framework\MockObject\Stub\ReturnStub;

class AuthController extends Controller
{
    public function LoginView()
    {
        return view('auth.login');
    }

    public function LoginPost(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('students.index');
        }

        return back()->withErrors([
            'email' => 'Email or Password is incorrect.',
        ]);
    }

    public function RegisterView()
    {
        return view('auth.register');
    }

    public function RegisterPost(Request $request)
    {
        //Validate Request
        $validatedRequest = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        //send data
        User::create([
            'name' => $validatedRequest['name'],
            'email' => $validatedRequest['email'],
            'password' => bcrypt($validatedRequest['password']),
            'role' => 'student'
        ]);

        //Handle if success
        return redirect()->route('login-view');
    }

    public function Logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login-view');
    }
}