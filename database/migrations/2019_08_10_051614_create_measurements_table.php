<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeasurementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('measurements', function (Blueprint $table)
        {
            $table->increments('id');
            $table->longText('data');
            $table->bigInteger('chart_id');
            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('designer_user_id')->nullable();
            $table->bigInteger('designer_order_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('measurements', function (Blueprint $table)
        {
            $table->foreign('chart_id')->references('id')->on('measurement_charts');
        });

        Schema::table('measurements', function (Blueprint $table)
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
