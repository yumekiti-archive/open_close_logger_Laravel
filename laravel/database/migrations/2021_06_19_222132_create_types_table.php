<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('types', function (Blueprint $table) {

            $table->bigIncrements('id');

            //かぶりなしの種類
            $table->string('type_name', 30)->unique();
            $table->string('type_icon', 50);

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
        Schema::dropIfExists('types');
    }
}
