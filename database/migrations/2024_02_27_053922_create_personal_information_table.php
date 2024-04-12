<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('personal_information', function (Blueprint $table) {
            $table->id();
            $table->string('lastname');
            $table->string('firstname');
            $table->string('middlename');
            $table->string('suffix')->nullable();
            $table->string('email')->unique();
            $table->string('civil_status');
            $table->date('birth_date');
            $table->string('place_of_birth');
            $table->string('present_address');
            $table->string('present_address_length');
            $table->string('address_ownership');
            $table->string('permanent_address');
            $table->string('permanent_address_length');
            $table->string('provincial_address');
            $table->string('provincial_address_length');
            $table->string('nationality')->default('Filipino');
            $table->string('phone_number')->unique();
            $table->string('facebook_account_name');
            $table->string('education');
            $table->string('source_of_fund');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_information');
    }
};
