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
        Schema::create('fixers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('password');
            $table->string('email')->unique();
            $table->string('City');
            $table->string('profession');
            $table->string('imagePath');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('fixers');
    }    
};
