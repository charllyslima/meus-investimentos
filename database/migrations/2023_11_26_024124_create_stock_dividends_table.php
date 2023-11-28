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
        Schema::create('stock_dividends', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fi_asset_id')->constrained('fi_assets');
            $table->date('approvedOn');
            $table->string('assetIssued');
            $table->string('factor');
            $table->string('isinCode');
            $table->string('label');
            $table->string('lastDatePrior');
            $table->string('remarks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_dividends');
    }
};
