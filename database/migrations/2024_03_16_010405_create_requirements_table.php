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
        Schema::create('requirements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('personal_information_id');
            $table->foreign('personal_information_id')->references('id')->on('personal_information')->onDelete('cascade');
            $table->string('contract')->nullable();
            $table->string('oec')->nullable();
            $table->string('passport')->nullable();
            $table->string('seamans_book')->nullable();
            $table->string('e_reg')->nullable();
            $table->string('sirb')->nullable();
            $table->string('bill')->nullable();
            $table->string('valid_id_1')->nullable();
            $table->string('valid_id_2')->nullable();
            $table->string('marriage_contract')->nullable();
            $table->string('send_it_thru')->default('Application Form')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requirements');
    }
};
