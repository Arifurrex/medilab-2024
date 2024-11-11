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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // User ID
            $table->foreignId('division_id')->nullable()->constrained()->onDelete('set null'); // Division ID
            $table->foreignId('district_id')->nullable()->constrained()->onDelete('set null'); // District ID
            $table->foreignId('upazila_id')->nullable()->constrained()->onDelete('set null'); // Upazila/Thana ID
            $table->string('street_address')->nullable(); // স্ট্রিট ঠিকানা
            $table->string('postal_code')->nullable(); // পোস্টাল কোড
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
