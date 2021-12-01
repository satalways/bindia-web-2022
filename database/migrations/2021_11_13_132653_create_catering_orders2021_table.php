<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCateringOrders2021Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catering_orders_2021', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('type', 7);
            $table->string('menu', 1)->nullable()->default('0');
            $table->mediumInteger('per_person_price');
            $table->boolean('delivery');
            $table->dateTime('pickup_time');
            $table->dateTime('delivery_time')->nullable();
            $table->string('shop', 3);
            $table->string('order_ip', 100);
            $table->string('customer_name', 50);
            $table->string('customer_email', 100);
            $table->string('customer_phone', 50);
            $table->string('customer_address', 150)->nullable();
            $table->string('customer_postal_code', 6)->nullable();
            $table->string('customer_city', 100)->nullable();
            $table->text('comments');
            $table->boolean('paid');
            $table->dateTime('paid_time')->nullable();
            $table->string('paid_ip', 100)->nullable();
            $table->bigInteger('takeout_id')->nullable();
            $table->integer('delivery_fee')->nullable();
            $table->string('user_agent', 200);
            $table->string('payment_id', 100)->nullable();
        });

        Schema::create('catering_orders_2021_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_id');
            $table->string('name', 200);
            $table->string('code', 3);
            $table->integer('price')->default(0);
            $table->unsignedTinyInteger('qty')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('catering_orders_2021');
        Schema::dropIfExists('catering_orders_2021_details');
    }
}
