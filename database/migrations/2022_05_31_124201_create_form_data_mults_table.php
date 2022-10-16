<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormDataMultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_data_mults', function (Blueprint $table) {
            $table->id();
            $table->foreignId('form_coloumn_mult_id')->constrained('form_coloumn_mults')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('form_coloumn_id')->constrained('form_coloumns')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('form_data_list_id')->constrained('form_data_lists')->onDelete('cascade')->onUpdate('cascade');
            $table->string('data');
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
        Schema::dropIfExists('form_data_mults');
    }
}
