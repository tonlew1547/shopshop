<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detail_products', function (Blueprint $table) {
            //
            $table->decimal('cost', 50, 2)->after('id');
            $table->integer('amount')->after('cost');
            $table->unsignedBigInteger('case_product_id')->nullable();

            $table->foreign('case_product_id')->references('id')->on('case_products')->onDelete('cascade');

            $table->unsignedBigInteger('product_id')->nullable();

            $table->foreign('product_id')->nullable()->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detail_products', function (Blueprint $table) {
            //
        });
    }
}
