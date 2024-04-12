<?php

namespace App\Listeners;

use App\Events\AdminRegistered;
use App\Mail\AdminRegistrationNotification;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

class SendAdminRegistrationNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    public function handle(AdminRegistered $event): void
    {
        $admin = $event->admin;
        $tempPassword = $event->tempPassword;

        // Generate the verification URL for the admin
        $verificationUrl = $this->generateVerificationUrl($admin);

        // Send an email to the admin with the verification URL
        Mail::to($admin->email)->send(new AdminRegistrationNotification($admin,$verificationUrl, $tempPassword));
    }

    /**
     * Generate the verification URL for the admin.
     */
    protected function generateVerificationUrl($admin): string
    {
        // Compute the hash based on the admin's email
        $hash = sha1($admin->email);
    
        $url = URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(config('auth.verification.expire', 60)),
            ['id' => $admin->id, 'hash' => $hash],
            
        );
        return $url;
    }
}
