<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('update_at')->nullable()->useCurrent();
            $table->string('brand_title')->nullable();
            $table->string('brand_slug')->nullable();
            $table->string('brand_url')->nullable();
            $table->string('brand_file')->nullable();
            $table->integer('brand_must')->nullable();
            $table->text('brand_content')->nullable();
            $table->enum('brand_status', ['0', '1'])->default('1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brands');
    }
}
