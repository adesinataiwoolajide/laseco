<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnumeratorDetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enumerator_datas', function (Blueprint $table) {
            $table->bigIncrements('data_id');
            $table->string('uuid');

            $table->string('sim_serial');
            $table->string('subscriber_id');
            $table->string('device_id');
            $table->string('phone_number');
            $table->string('enumerator_name');
            $table->string('enumerator_code');
            $table->string('cbt_leader');
            $table->string('cbt_leader_code');
            $table->string('state');
            
            $table->string('community');
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
        Schema::dropIfExists('enumerator_detas');
    }
}
