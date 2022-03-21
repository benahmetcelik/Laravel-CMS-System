<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->integer('parent_id')->nullable();
            $table->string('title',255)->nullable();
            $table->string('img_url',255)->nullable();
            $table->string('en_title',255)->nullable();
            $table->string('ru_title',255)->nullable();
            $table->string('ar_title',255)->nullable();
            $table->string('de_title',255)->nullable();
            $table->string('slug',255)->nullable();
            $table->integer('total_view')->nullable();
            $table->integer('status')->nullable();
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
        Schema::dropIfExists('categories');
    }
}
