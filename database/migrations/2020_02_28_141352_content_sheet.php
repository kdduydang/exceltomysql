<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ContentSheet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_sheet', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('serial');
			$table->date('date');
			$table->string('name');
			$table->string('type');
			$table->bigInteger('quantity')->unsigned();
			$table->bigInteger('price')->unsigned();
			$table->bigInteger('total')->unsigned();
			$table->string('note')->nullable();
			$table->bigInteger('title_sheet_id')->unsigned();
			$table->foreign('title_sheet_id')->references('id')->on('title_sheet');
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
        Schema::dropIfExists('content_sheet');
    }
}
