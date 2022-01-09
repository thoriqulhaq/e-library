<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcademicResourcesPublicUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academic_resources_public_users', function (Blueprint $table) {

            $table->unsignedBigInteger("academic_resources_id");
            $table->unsignedBigInteger("user_id");


            $table->foreign("academic_resources_id")->references("id")->on("academic_resources")->onDelete('cascade');
            $table->foreign("user_id")->references("user_id")->on("public_users");

            $table->primary(["academic_resources_id", "user_id"], "PK_Key_academic_resources_public_users");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('academic_resources_public_users');
    }
}
