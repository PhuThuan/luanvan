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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->integer('id_address');
            $table->string('id_user');
            $table->string('id_specialty');
            $table->string('full_name');
            $table->string('sex');
            $table->string('Qualifications');
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
