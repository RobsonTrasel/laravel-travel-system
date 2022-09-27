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
        Schema::create('ticket', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('agent_id');
            $table->string('from');
            $table->string('to');
            $table->date('departure');
            $table->string('class');
            $table->integer('qty');
            $table->string('note')->nullable();
            $table->double('amount');
            $table->boolean('received')->default(0);
            $table->double('payment')->nullable();
            $table->boolean('payed')->default(0);
            $table->boolean('terminated')->default(0);
            $table->date('create');
            $table->timestamps();
            $table->foreign('customer_id')->references('id')->on('customer')->onDelete('cascade');
            $table->foreign('agent_id')->references('id')->on('agent')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ticket');
    }
};
