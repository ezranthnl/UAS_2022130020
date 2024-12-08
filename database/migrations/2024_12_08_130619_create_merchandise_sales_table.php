<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchandiseSalesTable extends Migration
{
    public function up()
    {
        Schema::create('merchandise_sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->foreignId('customer_id')->constrained()->onDelete('cascade');
            $table->integer('quantity')->comment('Jumlah barang');
            $table->decimal('total_price', 10, 2)->comment('Total harga');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('merchandise_sales');
    }
}
