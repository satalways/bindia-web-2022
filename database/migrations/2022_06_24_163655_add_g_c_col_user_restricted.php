<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('gift_cards', function(Blueprint $table) {
            $table->boolean('user_restricted')->default(false);
            $table->integer('min_order_amount')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gift_cards', function(Blueprint $table) {
            $table->dropColumn('user_restricted', 'min_order_amount');
        });
    }
};
