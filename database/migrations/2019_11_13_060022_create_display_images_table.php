<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisplayImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('display_images', function (Blueprint $table)
        {
            $table->increments('id');
            $table->unsignedInteger('admin_id')->nullable();
            $table->unsignedInteger('designer_id')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->string('image_name', 1000);
            $table->string('image_extension', 10);
            $table->timestamps();
        });

        Schema::table('display_images', function (Blueprint $table)
        {
            $table->foreign('admin_id')->references('id')->on('admins');
        });

        Schema::table('display_images', function (Blueprint $table)
        {
            $table->foreign('designer_id')->references('id')->on('designers');
        });

        Schema::table('display_images', function (Blueprint $table)
        {
            $table->foreign('user_id')->references('id')->on('users');
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