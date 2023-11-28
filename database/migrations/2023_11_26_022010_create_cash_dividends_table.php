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
        Schema::create('cash_dividends', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dividend_id')->constrained('dividends');
            $table->string('asset_issued');
            $table->date('payment_date');
            $table->string('rate');
            $table->string('related_to');
            $table->date('approved_on');
            $table->string('isin_code');
            $table->string('label');
            $table->date('last_date_prior');
            $table->text('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cash_dividends');
    }
};
