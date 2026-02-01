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
        Schema::create('bookings', function (Blueprint $table) {
       $table->id();
        $table->string('customer_name');  // اسم الزبون
        $table->string('customer_phone'); // رقم تليفونه (عشان نكلمه)
        
        // توقيت الرحلة: صباحاً، عصراً، ليلاً، أو اليوم كله
        $table->string('trip_time'); 
        
        // تاريخ الرحلة: عشان نعرف هو حاجز يوم إيه بالظبط
        $table->date('trip_date'); 
        
        $table->text('notes')->nullable(); // لو عنده طلبات خاصة
        $table->timestamps(); // تاريخ عمل الحجز (created_at)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
