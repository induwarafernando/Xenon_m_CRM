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
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('merchandizers');
    }
}
