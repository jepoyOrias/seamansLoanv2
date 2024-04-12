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
        Schema::create('repayments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('loan_information_id');
            $table->foreign('loan_information_id')->references('id')->on('loan_information')->onDelete('cascade');
            $table->date('start_date');
            $table->integer('term_month');
            $table->decimal('amount', 10, 2);
            $table->date('due_date');
            $table->string('receipt')->nullable();
            $table->unsignedBigInteger('status_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('repayments');
        Schema::table('repayments', function (Blueprint $table) {
            $table->dropForeign(['loan_information_id']);
            $table->dropColumn('loan_information_id');
        });
    }
};
