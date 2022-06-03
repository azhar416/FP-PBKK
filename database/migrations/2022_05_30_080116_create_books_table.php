<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('book_type', ['magazine', 'paper', 'textbook']);
            // auto-input slug
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->string('author')->nullable();
            $table->string('category')->nullable();
            $table->string('publisher', 64);
            $table->year('year_published');
            $table->text('description');
            // link buku (.pdf)
            $table->string('link', 128)->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
};
