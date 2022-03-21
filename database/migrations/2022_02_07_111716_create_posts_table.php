<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title',255)->nullable();
            $table->string('img_url',255)->nullable();
            $table->string('content')->nullable();
            $table->string('slug',255)->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('total_view')->nullable();
            $table->integer('author_id')->nullable();
            $table->integer('status')->nullable();
            $table->integer('slider_status')->default(0)->nullable();
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
        Schema::dropIfExists('posts');
    }
}
