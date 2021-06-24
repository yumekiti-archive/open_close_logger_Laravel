<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {

            $table->bigIncrements('id');

            //種類
            $table->string('category_name', 30);
            $table->string('open_icon', 50);
            $table->string('close_icon', 50);
            $table->string('cmd', 100);

            //外部キー制約
            $table->unsignedBigInteger('device_id')->index();
            $table->foreign('device_id')->references('id')->on('devices');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
