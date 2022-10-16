<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFeildTableUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {

            $table->string('referal')->nullable()->after('id');
            $table->string('status')->default('active')->after('id');
            $table->string('ip')->nullable()->after('id');
            $table->string('image')->nullable()->after('id');
            $table->string('tell')->nullable()->after('id');
            $table->string('address')->nullable()->after('id');
            $table->string('username')->nullable()->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {

            $table->dropColumn('status');
            $table->dropColumn('ip');
            $table->dropColumn('tell');
            $table->dropColumn('image');
            $table->dropColumn('address');
            $table->dropColumn('referal');
            $table->dropColumn('username');
        });
    }
}
