<?php

namespace App\Http\Controllers\Auth;

use App\Events\AdminRegistered;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Mail\TempPasswordEmail;
use Illuminate\Support\Facades\Mail;

class CreateAdminController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
        ]);

        // If validation fails, return the error response
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Generate a temporary password
        $tempPassword = Str::random(8);

        // Create the admin user record
        $admin = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($tempPassword),
            'role_id' => 1, // Assuming role_id 1 represents admin
            'email_verified_at' => null, // Mark email as not verified
        ]);

        // Fire the Registered event with admin and credentials data
        event(new AdminRegistered($admin, $tempPassword));

        // Return success response
        return response()->json(['message' => 'Admin user created successfully']);
    }
   
}

