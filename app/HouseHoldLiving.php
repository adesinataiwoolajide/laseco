<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class HouseHoldLiving extends Model
{
    use SoftDeletes;
    protected $table = 'house_hold_livings';
    protected $primaryKey = 'living_id';

    protected $fillable = [
        'data_id', 'enumerator_code', 'hh_living', 'roof_dwelling', 'floor_dwelling', 'light_dwelling', 'cook_dwelling', 'drink_dwelling', 'toilet_dwelling', 'num_room'
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
