<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $roles= [
            ['name'=>'admin'],
            ['name'=>'client'],
            ['name'=>'user'],

        ];

        DB::table('roles')->insert($roles);

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'role_id' => 1,
        ]);

        $statuses = [
            ['status' => 'Initial Application'],
            ['status' => 'For Infomation Verification'],
            ['status' => 'For Interview'],
            ['status' => 'For Approval'],
            ['status' => 'Approved'],
            ['status' => 'Declined'],
            ['status' => 'For Releasing'],
            ['status' => 'Released'],
            ['status' => 'N/A'],
            ['status' => 'Payment Verification'],
            ['status' => 'Payment Verified'],
        ];

        // Insert data into the 'loan_statuses' table
        DB::table('loan_statuses')->insert($statuses);
    }
}
