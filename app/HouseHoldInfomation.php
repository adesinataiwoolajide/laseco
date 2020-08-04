<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class HouseHoldInfomation extends Model
{
    use SoftDeletes;
    protected $table = 'house_hold_infomations';
    protected $primaryKey = 'data_id';

    protected $fillable = [
        'data_id', 'enumerator_code', 'start_time','end_time', 'geopoint', 'urban_rural', 'hhno', 'consent', 'hhh_surname', 'hhh_firstname', 'hhh_othername', 'hhh_image', 'contact_no', 'altno',
        'hhaddress', 'interviewdate', 'hhsize', 'HouseholdRoster_count', 'note_hhroster', 'position', 'roster_index', 'zone', 'lga', 'ward',
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
