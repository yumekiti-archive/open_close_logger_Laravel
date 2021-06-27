<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeviceCategoryChainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('device_category_chains', function (Blueprint $table) {
            //devices外部キー制約
            $table->unsignedBigInteger('device_id')->index();
            $table->foreign('device_id')->references('id')->on('devices');
            
            //category外部キー制約
            $table->unsignedBigInteger('category_id')->index();
            $table->foreign('category_id')->references('id')->on('categories');

            //複合主キー
            $table->primary(['device_id', 'category_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('device_category_chains');
    }
}
