<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeChangesInOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dateTime('unfinished_notification_sent_at')->nullable()->change();
            $table->integer('unfinished_notification_sent_by')->nullable()->change();
            $table->boolean('copy_order')->default(0);
        });

        Schema::table('etakeaway_zones', function (Blueprint $table) {
            $table->integer('post_number')->change();
            $table->integer('post_number2')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('copy_order');
        });
    }
}
