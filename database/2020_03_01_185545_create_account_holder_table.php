<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountHolderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accountHolder', function (Blueprint $table) {
            $table->increments('acch_id');
            $table->string('shops_id');
            $table->string('name');
            $table->string('phone');
            $table->string('balance');            
            $table->string('address');            
            $table->string('image');
            $table->string('statas');
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
        Schema::dropIfExists('accountHolder');
    }
}
