<?php

// app/Http/Controllers/CustomVerifyEmailController.php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\URL;

class CustomVerifyEmailController extends Controller
{
    public function verify(Request $request, $id, $hash)
    {
        
        $user = User::findOrFail($id);
        if (! hash_equals((string) $hash, sha1($user->getEmailForVerification()))) {
            abort(403); // Invalid verification link
        }

        if ($user->markEmailAsVerified()) {
            event(new Verified($user));
        }

        
        if ($user->hasVerifiedEmail()) {
            return redirect()->route('dashboard'); // Email already verified
        }


        return redirect()->route('verification.notice')->with('verified', true); // Email verified successfully
    }
}
