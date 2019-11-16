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
            $table->bigInteger('admin_id')->nullable();
            $table->bigInteger('designer_id')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->binary('display_thumb')->nullable();
            $table->binary('display_image');
            $table->string('image_extension');
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
