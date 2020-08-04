<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class HouseHoldName extends Model
{
    use SoftDeletes;
    protected $table = 'house_hold_names';
    protected $primaryKey = 'house_name_id	';

    protected $fillable = [
        'data_id', 'enumerator_code', 'name', 'head_name', 'head_sex', 'head_dob', 'head_age_hhm', 'head_int_age', 'head_a4age', 'head_agey', 'head_nin', 'head_bvn',
        'head_relationship', 'head_marritalstatus', 'HouseholdRoster_count', 'head_hasphonno', 'head_telephone_no',
        'B_Household_head_Labour_rs_5_years_and_above', 'head_b2labour', 'head_b3labour', 'head_b4labour', 'head_b5labour',
        'head_disability_information', 'head_educationalqualification', 'head_currentlyenrolledinschl', 'head_healthintro', 'head_pregnant',
        'head_lactating', 'head_benefitfromhealthcare', 'head_chronicallyill', 'head_disability', 'head_note_socialnetwork', 'head_cooperative',
        'head_religiousgroup', 'head_businessgroup', 'head_agegroup', 'head_othergorup'
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
