<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;
use Illuminate\Validation\ValidationException;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate the email input to ensure it's required and a valid email format
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        // Attempt to send the password reset link to the user
        $status = Password::sendResetLink(
            $request->only('email')
        );

        // Check if the reset link was sent successfully
        if ($status == Password::RESET_LINK_SENT) {
            return back()->with('status', __('We have emailed your password reset link!'));
        }

        // If there's an error (e.g., email not found), return input with error messages
        return back()->withInput($request->only('email'))
                    ->withErrors(['email' => __('We could not find a user with that email address.')]);
    }
}
