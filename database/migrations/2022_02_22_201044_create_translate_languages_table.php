<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTranslateLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('translate_languages', function (Blueprint $table) {
            $table->id();
            $table->integer('lang_id')->nullable();
            $table->integer('theme_id')->nullable();
            $table->integer('section_id')->nullable();
            $table->string('section_key')->nullable();
            $table->integer('section_group')->nullable();
            $table->string('translate')->nullable();
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
        Schema::dropIfExists('translate_languages');
    }
}
