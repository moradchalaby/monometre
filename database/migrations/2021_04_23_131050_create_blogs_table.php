<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('update_at')->nullable()->useCurrent();
            $table->string('blog_title')->nullable();
            $table->string('blog_slug')->nullable();
            $table->string('blog_file')->nullable();
            $table->integer('blog_must')->nullable();
            $table->text('blog_content')->nullable();
            $table->enum('blog_status',['0','1'])->default('1');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}
