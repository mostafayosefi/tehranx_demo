<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGetwaypaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('getwaypayments', function (Blueprint $table) {
            $table->bigInteger('id');
            $table->string('name');
            $table->string('token');
            $table->string('merchent');
            $table->string('status');
            $table->bigInteger('setting_id')->unsigned()->index();
            $table->timestamps();

            $table->foreign('setting_id')->references('id')->on('settings')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('getwaypayments');
    }
}
