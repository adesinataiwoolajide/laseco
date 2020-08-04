<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHouseHoldLivingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('house_hold_livings', function (Blueprint $table) {

            $table->bigIncrements('living_id');
            $table->unsignedBigInteger('data_id')->references('data_id')->on('enumerator_datas')->onDelete('cascade');
            $table->string('enumerator_code');
            $table->string('hh_living');
            $table->string('roof_dwelling');
            $table->string('floor_dwelling');
            $table->string('light_dwelling');
            $table->string('cook_dwelling');
            $table->string('drink_dwelling');
            $table->string('toilet_dwelling');
            $table->string('num_room');

            $table->timestamp('updated_at')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('deleted_at')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('house_hold_livings');
    }
}
