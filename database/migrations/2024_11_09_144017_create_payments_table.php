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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            // order_id কলাম তৈরি ও ফোরেইন কী সংযুক্তি
            $table->foreignId('order_id')->constrained()->onDelete('cascade');

            $table->decimal('amount', 10, 2); // পেমেন্টের পরিমাণ
            $table->string('status')->default('pending'); // পেমেন্ট স্ট্যাটাস, ডিফল্ট 'pending'
            $table->string('payment_method'); // পেমেন্ট পদ্ধতির নাম
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
