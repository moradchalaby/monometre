<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('update_at')->nullable()->useCurrent();
            $table->integer('product_category')->nullable();
            $table->string('product_title')->nullable();
            $table->string('product_slug')->nullable();
            $table->string('product_file')->nullable();
            $table->string('product_price')->nullable();
            $table->integer('product_must')->nullable();
            $table->text('product_content')->nullable();
            $table->enum('product_status', ['0', '1'])->default('1');
            $table->integer('product_stock')->default('1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
