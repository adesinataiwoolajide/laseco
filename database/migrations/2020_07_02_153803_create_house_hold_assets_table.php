<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHouseHoldAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('house_hold_assets', function (Blueprint $table) {
            $table->bigIncrements('asset_id');
            $table->unsignedBigInteger('data_id')->references('data_id')->on('enumerator_datas')->onDelete('cascade');
            $table->string('enumerator_code');
            $table->string('own_hhitem');
            $table->string('note_hhasset');
            $table->string('radio');
            $table->string('touchlight');
            $table->string('kerosenestove');
            $table->string('television');
            $table->string('mobilephone');
            $table->string('landphone');
            $table->string('housecurrent');
            $table->string('houseelsewhere');
            $table->string('landforhousing');

            $table->string('farmland');
            $table->string('bird');
            $table->string('goat');
            $table->string('cattle');
            $table->string('bicycle');
            $table->string('motocycle');
            $table->string('car');
            $table->string('canoe');
            $table->string('boat');
            $table->string('video_dvd');
            $table->string('generator');
            $table->string('iron_electric');
            $table->string('iron_charcoal');
            $table->string('fan');
            $table->string('air_conditioner');
            $table->string('refrigerator');
            $table->string('freezer');
            $table->string('furniture_sofa');
            $table->string('furniture_table');
            $table->string('hifi');
            $table->string('mattress');
            $table->string('bed');
            $table->string('computer');

            $table->string('wash_machine');

            $table->string('radio_num');
            $table->string('touchlight_num');
            $table->string('mobilephone_num');
            $table->string('housecurrent_num');

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
        Schema::dropIfExists('house_hold_assets');
    }
}
