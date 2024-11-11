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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            // ফরেন কী সম্পর্ক এবং অপশনাল ক্ষেত্র
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('payment_id')->nullable();

            // অর্ডারের বিস্তারিত
            $table->decimal('total_amount', 10, 2);
            // status ফিল্ড pending, processing, completed, বা cancelled) ট্র্যাক করার জন্য ব্যবহৃত হয়।
            $table->string('status')->default('pending');
            $table->text('shipping_address');
            $table->string('phone_no');
            $table->string('email')->nullable();
            $table->string('transaction_id')->nullable();

            // অ্যাডমিনের জন্য কিছু ফ্ল্যাগ
            $table->boolean('is_paid')->default(0);
            $table->boolean('is_completed')->default(0);
            $table->boolean('is_seen_by_admin')->default(0);

            // গ্রাহক থেকে পাওয়া ঐচ্ছিক বার্তা
            $table->text('message')->nullable();

            // টাইমস্ট্যাম্প
            $table->timestamps();

            // নিরাপত্তা এবং অডিটিংয়ের জন্য
            $table->string('ip_address')->nullable();

            // পারফরম্যান্স বৃদ্ধির জন্য ইনডেক্স . স্ট্যাটাসের উপর ভিত্তি করে ফিল্টার করলে দ্রুত ফলাফল পেতে সাহায্য করবে।
            $table->index('status'); // ইনডেক্স শুধু `status` ফিল্ডের জন্য
            $table->index('user_id'); // user_id এর উপর ইনডেক্স
            $table->index('payment_id'); // payment_id এর উপর ইনডেক্স
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
