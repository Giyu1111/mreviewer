<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function show(): View|RedirectResponse
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        return view('auth');
    }



public function login(Request $request): RedirectResponse
{
    $credentials = $request->validateWithBag('login', [
        'role' => ['required', 'in:student,instructor'],
        'email' => ['required', 'email'],
        'password' => ['required', 'string'],
    ]);

    $authenticated = Auth::attempt([
        'email' => $credentials['email'],
        'password' => $credentials['password'],
        'role' => $credentials['role'],
        'is_active' => true,
    ], $request->boolean('remember'));

    if (!$authenticated) {
        return back()->withErrors([
            'email' => 'The email, password, or selected account type is incorrect.',
        ], 'login')->onlyInput('email', 'role');
    }

    $request->session()->regenerate();

    return redirect()->intended(route('dashboard'));
}



    public function register(Request $request): RedirectResponse
    {
        $data = $request->validateWithBag('register', [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        Auth::login($user);

        $request->session()->regenerate();

        return redirect()->route('dashboard');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
