<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->smallInteger('item_count');
            $table->float('sub_total')->default(0);
            $table->float('total_discount')->default(0);
            $table->float('total')->default(0);
            $table->float('total_tax')->default(0)->nullable();
            $table->boolean('is_paid')->default(false);
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
