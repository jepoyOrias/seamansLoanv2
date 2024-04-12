<?php

namespace App\Http\Controllers\Auth;

use App\Events\AdminRegistered;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     */
    public function store(Request $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(RouteServiceProvider::HOME);
        }

        event(new AdminRegistered($request->user() , ""));

        return back()->with('status', 'verification-link-sent');
    }
}
