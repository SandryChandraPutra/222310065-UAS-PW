<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{

    public function loginMahasiswa(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:100',
            'password' => 'required|string|max:100',
        ],[
            'email.required' => '*email harus diisi',
            'password.required' => '*password harus diisi.',
        ]);


        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::guard('mahasiswa')->attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended('/main');
        }

        session()->flash('loginError', 'Email or password is incorrect.');
        return redirect('/')->withInput($request->only('email', 'remember'));
    }

    public function logoutMahasiswa(Request $request)
    {
        Auth::guard('mahasiswa')->logout();
        $request->session()->forget('mahasiswa');
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function loginAdmin(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:100',
            'password' => 'required|string|max:100',
        ],[
            'email.required' => '*email harus diisi',
            'password.required' => '*password harus diisi.',
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::guard('admin')->attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended('/admins');
        }

        session()->flash('loginError', 'Email or password is incorrect.');
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logoutAdmin(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->forget('admin');
        $request->session()->regenerateToken();
        return redirect('/loginAdmin');
    }
}
