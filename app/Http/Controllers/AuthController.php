<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // view login
    public function index() : View {
        return view('login');
    }
    // view buat akun
    public function create() : View {
        return view('create');
    }
    // post buat akun
    public function created(Request $request) : RedirectResponse {
        // validasi input
        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|min:8|confirmed'
        ]);
        // simpan data user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        // setelah sukses simpan data user, user langsung login
        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
        $request->session()->regenerate();
        return redirect()->route('home')
        ->withSuccess('You have successfully registered & logged in!');
    }
    // post login
    public function login(Request $request) : RedirectResponse {
        // validasi input data
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        // aksi login
        if (Auth::attempt($credentials)) {
            // jika sukses buat lagi session dan buka ke 'baseurl/home'
            $request->session()->regenerate();
            return redirect()->intended('home');
        }
        // jika gagal login, kembali kehalaman sebelumnya dan ada pesan error
        return back()->withErrors([
            'email' => 'Periksa kembali akun anda',
        ])->onlyInput('email');
    }
    // post logout
    public function logout(Request $request): RedirectResponse
    {
        // proses logout
        Auth::logout();
        // reset semua session
        $request->session()->invalidate();
        // reset CSRF token kembali
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
