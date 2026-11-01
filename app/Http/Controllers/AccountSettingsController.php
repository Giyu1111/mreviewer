<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class AccountSettingsController extends Controller
{
    /**
     * Display the authenticated user's account settings.
     */
    public function index(): View
    {
        return view('account.settings');
    }

    /**
     * Update profile information.
     */
    public function updateProfile(Request $request): RedirectResponse
    {
        $user = $request->user();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->save();

        return redirect()
            ->route('account.settings')
            ->with('profile_status', 'Your profile information was updated successfully.');
    }

    /**
     * Update the authenticated user's password.
     */
    public function updatePassword(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
                'different:current_password',
            ],
        ]);

        $user = $request->user();

        // The User model's password cast automatically hashes this value.
        $user->password = $validated['password'];
        $user->save();

        $request->session()->regenerate();

        return redirect()
            ->route('account.settings')
            ->with('password_status', 'Your password was changed successfully.');
    }
}
