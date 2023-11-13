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
        Schema::create('appointmentSchedule', function (Blueprint $table) {
            $table->id();
            $table->integer('id_patient_records');
            $table->string('name');
            $table->string('age');
            $table->string('address');
            $table->string('gender');
            $table->string('doctor');
            $table->string('specialty');
            $table->string('hospital');
            $table->string('start_time');
            $table->string('end_time');
            $table->string('day');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('appointmentSchedule');
    }
};
