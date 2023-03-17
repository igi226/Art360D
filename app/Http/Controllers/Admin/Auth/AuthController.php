<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class AuthController extends Controller
{
    public function showLogin() {
        return view("Admin.Auth.login");
    }

    public function login( Request $request ) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $data = $request->all();
        if(Auth::guard('admin')->attempt(["email" => $data["email"], "password" => $data["password"]])){
            return redirect()->route('admin.dashboard');
        }
        else
        {
            return back()->with("msg", "Invalid credentials");
        }
    }

    public function adminLogout() {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with("msg", "Logged out successfully");
    }
}
