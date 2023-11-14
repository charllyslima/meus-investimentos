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
        Schema::create('trusts', function (Blueprint $table) {
            $table->id();
            $table->string("acronym", 4)->unique();
            $table->string("fundName");
            $table->string("companyName");
            $table->enum('type', ['FIAGRO', 'FII']);
            $table->string('segment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('real_estate_investment_funds');
    }
};
