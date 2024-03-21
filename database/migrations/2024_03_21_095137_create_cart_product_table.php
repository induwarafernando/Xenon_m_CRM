<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('cart_product', function (Blueprint $table) {
            $table->foreignId('cart_id');
            $table->foreignId('product_id');
            $table->integer('quantity');
            $table->float('tax', 10, 2)->default(0.00);
            $table->float('discount', 10, 2)->default(0.00);
            $table->decimal('price', 10, 2);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::table('cart_product', function (Blueprint $table) {
            //

        });
    }
};
