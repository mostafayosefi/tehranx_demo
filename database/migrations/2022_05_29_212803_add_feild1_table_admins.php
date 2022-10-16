<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFeild1TableAdmins extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('admins', function (Blueprint $table) {
            $table->string('username')->after('email');
            $table->string('tell')->after('email');
            $table->string('image')->after('email');
            $table->string('address')->after('email');
            $table->string('status')->default('active')->after('email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admins', function (Blueprint $table) {
            $table->dropColumn('template');
            $table->dropColumn('tell');
            $table->dropColumn('image');
            $table->dropColumn('address');
            $table->dropColumn('status');
        });
    }
}
