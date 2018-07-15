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
            $table->increments('id');
            $table->timestamps();
            $table->string('title');
            $table->text('excerp');
            $table->text('body');

            $table->unsignedInteger('user_id');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            
            $table->unsignedInteger('category_id');
            $table->foreign('category_id')
                ->references('id')->on('categories')
                ->onDelete('cascade');
                
            $table->unsignedInteger('post_id')
                ->nullable();
            $table->foreign('post_id')
                ->references('id')->on('posts')
                ->onDelete('cascade');
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
