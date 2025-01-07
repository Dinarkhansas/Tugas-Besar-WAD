<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Layanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Registration successful! You can now log in.');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->intended('/')->with('success', 'Login successful!');
        }

        return redirect()
            ->back()
            ->withErrors(['email' => 'Invalid credentials!']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logout successful!');
    }

    public function home(Request $request)
    {
        $search = $request->input('search');

        $userId = auth()->id();

        if ($search) {
            $layanans = Layanan::where('user_id', '!=', $userId)
                ->where(function ($query) use ($search) {
                    $query
                        ->where('nama_layanan', 'LIKE', "%{$search}%")
                        ->orWhere('kode_layanan', 'LIKE', "%{$search}%")
                        ->orWhereHas('user', function ($query) use ($search) {
                            $query->where('name', 'LIKE', "%{$search}%");
                        });
                })
                ->get();
        } else {
            $layanans = Layanan::where('user_id', '!=', $userId)->get();
        }

        return view('home', compact('layanans'));
    }
}
