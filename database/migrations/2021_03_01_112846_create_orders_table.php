<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->string('id', 6)->primary();
            $table->string('customer_name');
            $table->integer('city_id');
            $table->integer('district_id');
            $table->string('address');
            $table->string('email');
            $table->string('phone_number');
            $table->bigInteger('total_price');
            $table->boolean('is_paid');
            $table->integer('status')->default(\App\Enums\OrderStatus::WAITING);
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
        Schema::dropIfExists('orders');
    }
}
