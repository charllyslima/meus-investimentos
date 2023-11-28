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
        Schema::create('fi_share_holder', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fi_detail_fund_id')->constrained('fi_detail_fund');
            $table->string('share_holder_name')->nullable();
            $table->string('share_holder_address')->nullable();
            $table->string('share_holder_phone_number_ddd')->nullable();
            $table->string('share_holder_phone_number')->nullable();
            $table->string('share_holder_fax_number')->nullable();
            $table->string('share_holder_email')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fi_share_holder');
    }
};
