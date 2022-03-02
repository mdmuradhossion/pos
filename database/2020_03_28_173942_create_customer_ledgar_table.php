<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerLedgarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_ledgar', function (Blueprint $table) {
            $table->increments('cust_ledg_id');
            $table->string('shops_id');
            $table->string('trans_id');
            $table->string('cus_id');
            $table->string('particulars');
            $table->string('trangaction_type');
            $table->string('amount');
            $table->string('rest_balance'); 
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
        Schema::dropIfExists('customer_ledgar');
    }
}
