<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePriceFinicalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_finicals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('form_data_list_id')->constrained('form_data_lists')->onDelete('cascade')->onUpdate('cascade');
            $table->string('fee')->default('0');
            $table->string('sum')->default('0');
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
        Schema::dropIfExists('price_finicals');
    }
}
