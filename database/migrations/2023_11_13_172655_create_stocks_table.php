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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->string('codeCVM');
            $table->string('issuingCompany');
            $table->string('companyName');
            $table->string('tradingName');
            $table->string('cnpj');
            $table->string('marketIndicator');
            $table->string('typeBDR')->nullable();
            $table->string('dateListing');
            $table->string('status');
            $table->string('segment');
            $table->string('segmentEng');
            $table->string('type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};
