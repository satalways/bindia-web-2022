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
        Schema::create('metas', function(Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('data_id')->unsigned()->index();
            $table->string('key')->index();
            $table->longText('value')->nullable();
            $table->string('table_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('metas');
    }
};
