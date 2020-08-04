<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHouseHoldNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('house_hold_names', function (Blueprint $table) {
            $table->bigIncrements('house_name_id');
            $table->unsignedBigInteger('data_id')->references('data_id')->on('enumerator_datas')->onDelete('cascade');
            $table->string('enumerator_code');
            $table->string('name');
            $table->string('head_name');
            $table->string('head_sex');
            $table->string('head_dob');
            $table->string('head_age_hhm');
            $table->string('head_int_age');
            $table->string('head_a4age');
            $table->string('head_agey');
            $table->string('head_nin');
            $table->string('head_bvn');
            $table->string('head_relationship');
            $table->string('head_marritalstatus');
            $table->string('HouseholdRoster_count');
            $table->string('head_hasphonno');
            $table->string('head_telephone_no');
            $table->string('B_Household_head_Labour_rs_5_years_and_above');
            $table->string('head_b2labour');
            $table->string('head_b3labour');
            $table->string('head_b4labour');
            $table->string('head_b5labour');
            $table->string('head_disability_information');
            $table->string('head_educationalqualification');
            $table->string('head_currentlyenrolledinschl');
            $table->string('head_healthintro');
            $table->string('head_pregnant');
            $table->string('head_lactating');
            $table->string('head_benefitfromhealthcare');
            $table->string('head_chronicallyill');
            $table->string('head_disability');
            $table->string('head_note_socialnetwork');
            $table->string('head_cooperative');
            $table->string('head_religiousgroup');
            $table->string('head_businessgroup');
            $table->string('head_agegroup');
            $table->string('head_othergorup');
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
        Schema::dropIfExists('house_hold_names');
    }
}
