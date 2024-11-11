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
        Schema::create('menu_items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('link')->nullable(); // URL link for the menu item
            $table->foreignId('parent_id')->nullable()->constrained('menu_items')->onDelete('cascade'); // for sub-menus
            $table->boolean('status')->default(1); // 1 for show, 0 for hide
            $table->integer('order')->default(0); // ordering in the menu
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_items');
    }
};
