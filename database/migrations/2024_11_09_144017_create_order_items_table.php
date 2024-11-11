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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();

            // order_id কলাম তৈরি ও ফোরেইন কী সংযুক্তি
            $table->foreignId('order_id')->constrained()->onDelete('cascade');

            // product_id কলাম তৈরি ও ফোরেইন কী সংযুক্তি
            $table->foreignId('product_id')->constrained()->onDelete('cascade');

            $table->integer('quantity');  // পণ্যের পরিমাণ
            $table->decimal('price', 8, 2);  // পণ্যের দাম
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
