<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('orders', function (Blueprint $table) {
        $table->id();
        $table->string('email');
        $table->string('first_name');
        $table->string('last_name');
        $table->string('address');
        $table->string('apartment')->nullable();
        $table->string('city');
        $table->string('postal_code');
        $table->string('phone');
        $table->string('payment_method');
        $table->decimal('total', 8, 2);
        $table->timestamps();
        $table->date('shipped_date')->nullable();
        $table->string('status')->default('Awaiting Delivery');
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
