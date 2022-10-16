<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormColoumnMultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_coloumn_mults', function (Blueprint $table) {
            $table->id();
            $table->foreignId('form_coloumn_id')->constrained('form_coloumns')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name');
            $table->integer('priority');
            $table->string('status')->default('active');
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
        Schema::dropIfExists('form_coloumn_mults');
    }
}
