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
        Schema::create('testimonials', function (Blueprint $table) {
        $table->id();
        $table->string('name');          // اسم العميل
        $table->string('job')->nullable(); // وظيفته (اختياري)
        $table->text('content');         // رأي العميل
        $table->integer('stars')->default(5); // التقييم من 5
        $table->string('image')->nullable();  // صورة العميل (اختياري)
        $table->boolean('is_active')->default(true); // عشان تقدر تخفي رأي معين
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
