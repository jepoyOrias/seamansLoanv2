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
        Schema::create('releasings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('loan_information_id')->constrained('loan_information')->onDelete('cascade');
            $table->string('bank');
            $table->string('branch');
            $table->date('date_opened');
            $table->string('account_type');
            $table->string('account_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('releasings');
    }
};
