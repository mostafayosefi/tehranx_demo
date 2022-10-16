<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMultifieldToAuthentications extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('authentications', function (Blueprint $table) {
            $table->string('email_code_verify')->nullable()->after('email');
            $table->string('tell_code_verify')->nullable()->after('tell');
            $table->string('passport_verify')->default('inactive')->after('selfi_verify');
            $table->string('passport')->nullable()->after('selfi_verify');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('authentications', function (Blueprint $table) {
            $table->dropColumn('email_code_verify');
            $table->dropColumn('tell_code_verify');
            $table->dropColumn('passport_verify');
            $table->dropColumn('passport'); 
        });
    }
}
