<?php
// database/migrations/yyyy_mm_dd_create_merchandizers_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchandizersTable extends Migration
{
    public function up()
{
    Schema::create('merchandizers', function (Blueprint $table) {
        $table->id();
        $table->string('name'); // Shop Name
        $table->string('email')->unique(); // Email Address
        $table->string('password'); // Password
        $table->string('location')->nullable(); // Location
        $table->string('logo')->nullable(); // Logo URL
        $table->rememberToken();
        $table->timestamp('email_verified_at')->nullable();
        // role 3 for merchandizer
        $table->TinyInteger('role')->default(3);
        $table->timestamps();
    });
}

    public function down()
    {
        Schema::dropIfExists('merchandizers');
    }
}
