<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class AdminRegistered
{
    use Dispatchable, SerializesModels;

    public $admin;
    public $tempPassword;

    /**
     * Create a new event instance.
     *
     * @param  User  $admin
     * @param  string  $tempPassword
     * @return void
     */
    public function __construct(User $admin, string $tempPassword = "")
    {
        $this->admin = $admin;
        $this->tempPassword = $tempPassword;
    }
}
