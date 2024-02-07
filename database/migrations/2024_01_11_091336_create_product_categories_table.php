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
        Schema::create('product_categories', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name')->unique();
            // Add slug column with nullable and unique constraints 
            $table->string('slug')->nullable()->unique();
            $table->text('description')->nullable();

            // Parent category relationship
            $table->foreignId('parent_id')
                ->nullable()
                ->constrained('product_categories', 'id')
                ->nullOnDelete();

            $table->boolean('status')->default(true);

            // Additional fields
            $table->string('image')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_categories');
    }
};
