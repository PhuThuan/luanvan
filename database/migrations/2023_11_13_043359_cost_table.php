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
        Schema::create('cost', function (Blueprint $table) {
            $table->id();
            $table->date('day');
            $table->integer('cost');//luot truy cap
         $table->integer('id_hospital');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cost');
    }
};
