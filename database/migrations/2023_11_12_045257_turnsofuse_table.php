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
        Schema::create('turnsofuse', function (Blueprint $table) {
            $table->id();
            $table->date('day');
            $table->integer('turnsofuse');//luot truy cap
            $table->integer('visit');// luot kham
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('turnsofuse');
    }
};

