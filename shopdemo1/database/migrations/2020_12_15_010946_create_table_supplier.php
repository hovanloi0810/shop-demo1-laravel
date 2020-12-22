<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSupplier extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_supplier', function (Blueprint $table) {
            $table->Increments('supplier_id');
            $table->integer('category_id');
            $table->string('supplier_name');
            $table->integer('product_id');
            $table->integer('supplier_amuont');
            $table->string('supplier_price');
            $table->integer('supplier_status');
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
        Schema::dropIfExists('table_supplier');
    }
}
