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
        //
        Schema::create('patientRecords', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->integer('id_address');
            $table->string('name');
            $table->string('date_of_birth');
            $table->string('phone');
            $table->string('gender');
            $table->string('job');
            $table->string('CCCD');
            $table->string('email');
            $table->string('ethnic');
            $table->integer('status');
            // You can add more columns as needed
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
    
};
