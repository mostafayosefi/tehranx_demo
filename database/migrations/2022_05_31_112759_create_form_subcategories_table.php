<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormSubcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_subcategories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('form_category_id')->constrained('form_categories')->onDelete('cascade')->onUpdate('cascade');
            $table->string('link');
            $table->string('status')->default('active');$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_subcategories');
    }
}
