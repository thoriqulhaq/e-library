<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AcademicResourceAuthor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academic_resources_author', function (Blueprint $table) {
            $table->string("author_id");
            $table->unsignedBigInteger("academic_resources_id");

            $table->foreign("author_id")->references("name")->on("authors");
            $table->foreign("academic_resources_id")->references("id")->on("academic_resources");

            $table->primary(["author_id", "academic_resources_id"], "PK_Key_academic_resources_authors");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
