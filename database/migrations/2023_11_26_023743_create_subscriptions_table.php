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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fi_asset_id')->constrained('fi_assets');
            $table->string('asset_issued');
            $table->float('percentage');
            $table->string('price_unit');
            $table->string('trading_period');
            $table->date('subscription_date');
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
        Schema::dropIfExists('subscriptions');
    }
};
