<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('products', function(Blueprint $table) {
                    $table->increments('id');
                    $table->string('product_title', 300);
                    $table->string('product_colors', 300)->nullable();
                    $table->string('product_sku', 300)->nullable();
                    $table->string('image1', 100)->nullable();
                    $table->string('image2', 100)->nullable();
                    $table->string('image3', 100)->nullable();
                    $table->string('image4', 100)->nullable();
                    $table->string('image5', 100)->nullable();
                    $table->integer('default_image')->nullable();
                    $table->text('description');
                    $table->decimal('price', 10, 2);
                    $table->decimal('discounted_price', 10, 2)->nullable();
                    $table->integer('stock')->default(0);
                    $table->integer('category_id')->nullable();
                    $table->integer('created_by')->nullable();
                    $table->tinyInteger('is_removed')->default(0);
                    $table->nullableTimestamps();
                });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('products');
    }

}
