<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeasurementChartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('measurement_charts', function (Blueprint $table)
        {
            $table->increments('id');
            $table->bigInteger('chart_id')->unique();
            $table->string('title', '20');
            $table->text('description');
            $table->binary('thumb')->nullable();
            $table->binary('image');
            $table->string('file_extension', 10);
            $table->timestamps();
            $table->softDeletes();
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
