<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDesignersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('designers', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('country_code', 10);
            $table->string('phone')->nullable();
            $table->string('portfolio_name', 25)->nullable();
            $table->bigInteger('gender_id')->default(null);
            $table->boolean('is_active')->default(0);
            $table->boolean('is_verified')->default(0);
            $table->string('verification_code', 1000)->default(null);
            $table->binary('display_image')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('designers', function (Blueprint $table)
        {
            $table->foreign('gender_id')->references('id')->on('genders');
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
