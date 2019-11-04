<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDesignerOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('designer_orders', function (Blueprint $table)
        {
            $table->increments('id');
            $table->bigInteger('designer_user_id')->nullable();
            $table->bigInteger('designer_id')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('measurement_chart_id')->nullable();
            $table->string('title');
            $table->longText('notes');
            $table->string('measurements');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('designer_orders', function (Blueprint $table)
        {
            $table->foreign('designer_id')->references('id')->on('designers');
        });

        Schema::table('designer_orders', function (Blueprint $table)
        {
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('designer_orders', function (Blueprint $table)
        {
            $table->foreign('measurement_chart_id')->references('id')->on('measurement_charts');
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
