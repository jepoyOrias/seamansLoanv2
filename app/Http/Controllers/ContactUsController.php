<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use App\Models\ContactUs;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{
    public function sendEmail(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'message' => 'required|string',
        ]);

        $email = $request->email;

        // Check if the email has reached the sending limit
        $emailContact = ContactUs::where('email', $email)->first();

        if ($emailContact && $emailContact->message_count >= 3) {
            return response()->json(['message' => 'Email sending limit exceeded for this email'], 403);
        }

        // Increment message_count or create a new record
        ContactUs::updateOrCreate(
            ['email' => $email],
            ['message_count' => DB::raw('message_count + 1')]
        );

        // Send email
        Mail::to('info@seamanloanexpress.com')->send(new ContactFormMail($request->all()));

        return response()->json(['message' => 'Email sent successfully']);
    }
}
