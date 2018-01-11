<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('image')->nullable()->default(null);
            $table->unsignedInteger('pengarang_id');
            $table->unsignedInteger('penerbit_id');
            $table->string('isbn')->unique();
            $table->string('jml_buku');
            $table->enum('lokasi', ['Rak 1', 'Rak 2', 'Rak 3', 'Rak 4']);
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
}
