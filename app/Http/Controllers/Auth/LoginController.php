<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserAdmin;
use App\Models\UserOperatorKabko;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Cek di tabel user_admins
        $admin = UserAdmin::where('email', $credentials['email'])->first();
        if ($admin && Hash::check($credentials['password'], $admin->password)) {
            Auth::login($admin);
            $request->session()->regenerate();
            return redirect()->intended('admin.index');
        }

        // Cek di tabel user_operatorkabkos
        $operator = UserOperatorKabko::where('email', $credentials['email'])->first();
        if ($operator && Hash::check($credentials['password'], $operator->password)) {
            Auth::login($operator);
            $request->session()->regenerate();
            return redirect()->intended('operator.index');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}