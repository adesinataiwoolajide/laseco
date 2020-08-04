<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class HouseHoldAsset extends Model
{
    use SoftDeletes;
    protected $table = 'house_hold_assets';
    protected $primaryKey = 'asset_id';

    protected $fillable = [
        'data_id', 'enumerator_code', 'own_hhitem', 'note_hhasset', 'radio', 'touchlight', 'kerosenestove', 'television', 'mobilephone', 'landphone',
        'housecurrent', 'houseelsewhere', 'landforhousing', 'farmland', 'bird', 'goat', 'cattle', 'bicycle', 'motocycle', 'car', 'canoe',
        'boat', 'video_dvd', 'generator', 'iron_electric', 'iron_charcoal', 'fan', 'air_conditioner', 'refrigerator', 'freezer', 'furniture_sofa',
        'furniture_table', 'hifi', 'mattress', 'bed', 'computer', 'wash_machine', 'radio_num', 'touchlight_num', 'mobilephone_num', 'housecurrent_num',
        'enumerator_code'
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
