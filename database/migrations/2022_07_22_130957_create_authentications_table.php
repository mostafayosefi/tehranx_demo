<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthenticationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authentications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('email')->nullable();
            $table->string('email_verify')->default('inactive');
            $table->string('tell')->nullable();
            $table->string('tell_verify')->default('inactive');
            $table->string('tells')->nullable();
            $table->string('tells_verify')->default('inactive');
            $table->string('cardmelli')->nullable();
            $table->string('cardmelli_verify')->default('inactive');
            $table->string('selfi')->nullable();
            $table->string('selfi_verify')->default('inactive');
            $table->string('document')->nullable();
            $table->string('document_verify')->default('inactive');
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
        Schema::dropIfExists('authentications');
    }
}
