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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // اسم الباقة
            $table->decimal('price', 10, 2)->default(0); // السعر بالجنيه
            $table->string('duration')->nullable(); // مدة الرحلة (مثلاً: ساعتان، 3 ساعات)
            $table->text('description')->nullable(); // وصف مختصر
            $table->json('features')->nullable(); // قائمة المميزات (مشروبات، ساوند سيستم، إلخ)
            $table->string('image')->nullable(); // صورة الباقة
            $table->boolean('is_featured')->default(false); // هل هي الأكثر طلباً / مميزة؟
            $table->boolean('is_active')->default(true); // مفعلة في الموقع أم لا
            $table->integer('sort_order')->default(0); // ترتيب الظهور
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
