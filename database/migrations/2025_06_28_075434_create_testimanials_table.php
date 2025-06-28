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
        Schema::create('testimanials', function (Blueprint $table) {
            $table->id();
            $table->string('photo')->nullable();
            $table->string('name')->nullable();
            $table->string('function')->nullable();
            $table->text('testimony')->nullable();
            $table->integer('rating')->default(5);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimanials');
    }
};
