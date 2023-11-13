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
        Schema::create('News', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->integer('id_newsCategories');
            $table->text('content');
            $table->string('image_url')->nullable();
            $table->date('published_at');
            $table->string('author');
            $table->text('category');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('News');
    }
};
