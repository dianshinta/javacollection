<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    public function store(Request $request)
    {
        // Validasi email
        $request->validate([
            'email' => 'required|email',
        ]);

        // Kirimkan link reset password ke email
        $status = Password::sendResetLink(
            $request->only('email')
        );

        // Kembalikan ke form dengan status
        return $status == Password::RESET_LINK_SENT
            ? back()->with('status', __($status))
            : back()->withErrors(['email' => __($status)]);
    }
}
