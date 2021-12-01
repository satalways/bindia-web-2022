<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableOrderItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->string('name', 200)->unique();
            $table->string('slug', 200)->unique();
            $table->string('code', 3)->nullable();
            $table->tinyInteger('bag_points')->default(0);
            $table->string('description_en', 300)->nullable();
            $table->string('description_dk', 300)->nullable();
            $table->string('portion', 15)->nullable();
            $table->string('section', 15);
            $table->boolean('veg');
            $table->boolean('vegan');
            $table->boolean('nuts');
            $table->boolean('dairy');
            $table->boolean('gluten');
            $table->boolean('chili');
            $table->boolean('double_chili')->default(0);
            $table->boolean('order_chili')->default(0);
            $table->float('price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items');
    }
}
