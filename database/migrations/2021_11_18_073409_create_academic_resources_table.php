<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcademicResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academic_resources', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("description", 500)->nullable();
            $table->string("genre")->nullable();
            $table->string("publication_place");
            $table->date("publication_date");
            $table->tinyInteger("type");
            $table->bigInteger("download_count");
            $table->string("file_path");
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
        Schema::dropIfExists('academic_resources');
    }
}
