<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::dropIfExists('posts');
        
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->string('site')->nullable();
            $table->string('title')->nullable();
            $table->text('excerpt')->nullable();
            $table->string('image')->nullable();
            $table->json('tags')->default("[]");
            $table->timestamp('published_at')->nullable();
        });
    }
};
