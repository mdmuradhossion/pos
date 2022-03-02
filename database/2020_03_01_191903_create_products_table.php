<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('prod_id');
            $table->string('shops_id');
            $table->string('supp_id');
            $table->string('store_id');
            $table->string('brand_id');
            $table->string('prod_cat_id');
            $table->string('name');
            $table->string('quantity');
            $table->string('purchase_price');
            $table->string('selling_price');            
            $table->string('serial_number');
            $table->string('image');
            $table->string('warranty');
            $table->string('barcode');
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
        Schema::dropIfExists('products');
    }
}
