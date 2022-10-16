<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Mngfinical;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();



            $table->string('title');
            $table->mediumText('textheader')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('instagram')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('youtube')->nullable();
            $table->string('tell');
            $table->string('email');

            $table->string('address');
            $table->longText('description');
            $table->longText('keyword');
            $table->string('fcopy');
            $table->longText('analatik')->nullable();
            $table->longText('codetiket')->nullable();

            $table->string('favicon');
            $table->string('logo');

            $table->string('_token');


            $table->string('template')->nullable();

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
        Schema::dropIfExists('settings');
    }
}
