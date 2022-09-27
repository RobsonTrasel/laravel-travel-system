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
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->unsignedBigInteger('type_id');
            $table->double('expense');
            $table->string('description');
            $table->binary('file');
            $table->string('sys');
            $table->string('sys_url');
            $table->timestamps();
            $table->foreign('type_id')->references('id')->on('ads_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ads');
    }
};
