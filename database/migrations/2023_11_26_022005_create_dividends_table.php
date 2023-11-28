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
        Schema::create('dividends', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fi_detail_fund_id')->constrained('fi_detail_fund');
            $table->date('quoted_per');
            $table->string('form');
            $table->string('fund');
            $table->string('ifd');
            $table->string('trading_lot');
            $table->string('quantity');
            $table->string('code');
            $table->string('code_cvm')->nullable();
            $table->string('segment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dividends');
    }
};
