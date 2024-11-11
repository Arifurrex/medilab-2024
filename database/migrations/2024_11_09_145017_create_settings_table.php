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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('email')->nullable();
            $table->string('phone_no')->nullable();
            $table->string('address')->nullable();
            $table->unsignedInteger('shipping_cost')->default(100);
            $table->string('site_name')->nullable(); // ওয়েবসাইটের নাম
            $table->string('currency')->default('USD'); // মুদ্রা
            $table->decimal('tax_rate', 5, 2)->default(0); // ট্যাক্স হার
            $table->string('facebook_link')->nullable(); // ফেসবুক লিংক
            $table->string('twitter_link')->nullable(); // টুইটার লিংক
            $table->string('instagram_link')->nullable(); // ইনস্টাগ্রাম লিংক
            $table->string('logo_url')->nullable(); // লোগো URL
            $table->boolean('maintenance_mode')->default(0); // মেইন্টেন্যান্স মোড
            $table->string('meta_title')->nullable(); // SEO মেটা টাইটেল
            $table->text('meta_description')->nullable(); // SEO মেটা বর্ণনা
            $table->string('meta_keywords')->nullable(); // SEO মেটা কীওয়ার্ড
            $table->string('smtp_host')->nullable(); // SMTP হোস্ট
            $table->string('smtp_username')->nullable(); // SMTP ইউজারনেম
            $table->string('smtp_password')->nullable(); // SMTP পাসওয়ার্ড
            $table->string('favicon_url')->nullable(); // ফেভিকন URL
            $table->string('timezone')->default('UTC'); // টাইম জোন
            $table->string('default_order_status')->default('pending'); // অর্ডারের ডিফল্ট স্ট্যাটাস
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
