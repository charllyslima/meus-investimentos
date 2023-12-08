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
        Schema::create('fi_dividends', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fi_id')->constrained('fi_assets');
            $table->date('payment_date');
            $table->float('value');
            $table->date('last_date_priority');
            $table->year('payment_year')->virtualAs('YEAR(payment_date)');
            $table->unsignedTinyInteger('payment_month')->virtualAs('MONTH(payment_date)');
            $table->unsignedTinyInteger('payment_day')->virtualAs('DAY(payment_date)');
            $table->timestamps();
            $table->unique(['fi_id', 'payment_year', 'payment_month', 'payment_day', 'value'], 'unique_fi_dividends_per_month');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fi_dividends');
    }
};
