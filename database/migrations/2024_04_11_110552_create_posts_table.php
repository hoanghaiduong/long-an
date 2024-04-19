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
            $table->string('title');
            $table->string('sub_title')->nullable();
            $table->longText('details');
            $table->string('slug')->unique();
            $table->string('thumbnail');
            $table->string('photo');
            $table->integer('view_count')->default(0);
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_image')->nullable();
            $table->enum('status', ['draft', 'published', 'scheduled'])->default('draft');
            $table->unsignedBigInteger('author_id');
            $table->foreign('author_id')->references('id')->on('admins')->onDelete('cascade');
            $table->unsignedBigInteger('post_type_id');
            $table->foreign('post_type_id')->references('id')->on('post_types')->onDelete('cascade');
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
