<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->unsignedBigInteger("academic_resources_id")->primary();
            $table->string("publisher");
            $table->tinyInteger("edition")->nullable();
            $table->string("isbn")->unique();
            $table->timestamps();

            $table->foreign("academic_resources_id")->references("id")->on("academic_resources");
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
