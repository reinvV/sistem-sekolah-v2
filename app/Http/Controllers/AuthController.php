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
       
    }

    public function RegisterView()
    {
        return view('auth.register');
    }

    public function RegisterPost(Request $request)
    {

    }

    public function Logout(Request $request)
    {

    }
}