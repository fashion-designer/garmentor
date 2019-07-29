<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDesignerUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('designer_users', function (Blueprint $table)
        {
            $table->increments('id');
            $table->bigInteger('gender_id')->nullable();
            $table->bigInteger('designer_id')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->nullable()->unique();
            $table->string('phone')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('designer_users', function (Blueprint $table)
        {
            $table->foreign('gender_id')->references('id')->on('genders');
        });

        Schema::table('designer_users', function (Blueprint $table)
        {
            $table->foreign('designer_id')->references('id')->on('designers');
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
