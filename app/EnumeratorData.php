<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class EnumeratorData extends Model
{
    use SoftDeletes;
    protected $table = 'enumerator_datas';
    protected $primaryKey = 'data_id';

    protected $fillable = [
        'uuid', 'sim_serial', 'subscriber_id', 'device_id', 'phone_number', 'enumerator_name', 'enumerator_code'
        ,'cbt_leader', 'cbt_leader_code', 'state', 'community',
    ];

    public function getCreatedAtAttribute($value){
        return \Carbon\Carbon::parse($value)->format('d-m-Y');
    }

    public function getDeletedAtAttribute($value){
        return \Carbon\Carbon::parse($value)->format('d-m-Y');
    }

    public function getUpdatedAtAttribute($value){
        return \Carbon\Carbon::parse($value)->format('d-m-Y');
    }
}
