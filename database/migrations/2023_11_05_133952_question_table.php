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
        Schema::create('question', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->integer('id_questionCategories');
            $table->string('name');
            $table->text('Answer');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('question');
    }
};
