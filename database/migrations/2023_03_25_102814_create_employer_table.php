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
        Schema::create('employer', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('web_site')->nullable();
            $table->string('position');
            $table->integer('employment');
            $table->integer('city');
            $table->integer('salary');
            $table->integer('experience');
            $table->text('position_desc');
            $table->string('first_last_name');
            $table->integer('phone');
            $table->string('email');
            $table->string('logo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employer');
    }
};
