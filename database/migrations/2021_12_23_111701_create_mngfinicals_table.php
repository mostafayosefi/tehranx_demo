<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Setting;

class CreateMngfinicalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mngfinicals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('rateusd');
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
        Schema::dropIfExists('mngfinicals');
    }
}
