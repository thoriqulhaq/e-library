<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJournalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journals', function (Blueprint $table) {
            $table->unsignedBigInteger("academic_resources_id")->primary();
            $table->tinyInteger("volume");
            $table->tinyInteger("issue")->nullable();
            $table->timestamps();

            $table->foreign("academic_resources_id")->references("id")->on("academic_resources")->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('journals');
    }
}
