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
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('ISBN')->unique();
            $table->string('title');
            $table->string('img');
            $table->string('author');
            $table->date('published_date');
            $table->text('description');
            $table->decimal('price');
            // Crea 2 columnas `created_at` y `updated_at`
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
