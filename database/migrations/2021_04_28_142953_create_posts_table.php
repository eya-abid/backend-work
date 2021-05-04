<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->foreign('username')->references('username')->on('users');
            $table->text('body');
            $table->string('image_url');
            $table->string('date');

            
        }) ;
    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
