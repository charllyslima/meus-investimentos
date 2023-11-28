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
        Schema::create('asset_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fi_asset_id')->constrained('fi_assets')->nullable();
            $table->foreignId('stock_asset_id')->constrained('stock_assets')->nullable();
            $table->string('asset_code');
            $table->string('transaction_type');
            $table->integer('quantity');
            $table->decimal('price', 12, 2);
            $table->date('transaction_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asset_transactions');
    }
};
