<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTwoFieldToForms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('forms', function (Blueprint $table) {
            $table->string('texttimerecv')->after('money')->default('زمان تحویل : 1 تا 3 ساعت کاری ')->nullable();
            $table->string('textrecv')->after('money')->default(' تحویل: از طریق پنل')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('forms', function (Blueprint $table) {
            $table->dropColumn('texttimerecv');
            $table->dropColumn('textrecv');
        });
    }
}
