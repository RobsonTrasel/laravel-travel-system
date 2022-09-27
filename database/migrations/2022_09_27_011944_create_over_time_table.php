<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('over_time', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('timesheet_id');
            $table->unsignedInteger('overtimetype_id');
            $table->double('hours');
            $table->double('pay');
            $table->foreign('timesheet_id')->references('id')->on('time_sheets')->onDelete('cascade');
            $table->foreign('overtimetype_id')->references('id')->on('over_time_types')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('over_time');
    }
};
