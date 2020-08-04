<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHouseHoldInfomationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('house_hold_infomations', function (Blueprint $table) {
            $table->bigIncrements('house_hold_id');
            $table->unsignedBigInteger('data_id')->references('data_id')->on('enumerator_datas')->onDelete('cascade');
            $table->string('enumerator_code');
            $table->string('start_time');
            $table->string('end_time');
            $table->string('urban_rural');
            $table->string('hhno');
            $table->string('consent');
            $table->string('hhh_surname');
            $table->string('hhh_firstname');
            $table->string('hhh_othername');
            $table->string('hhh_image');
            $table->string('contact_no');
            $table->string('altno');
            $table->string('hhaddress');
            $table->string('interviewdate');
            $table->string('hhsize');
            $table->string('HouseholdRoster_count');
            $table->string('note_hhroster');
            $table->string('position');
            $table->string('roster_index');
            $table->string('geopoint');
            $table->string('zone');
            $table->string('lga');
            $table->string('ward');
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
        Schema::dropIfExists('house_hold_infomations');
    }
}
