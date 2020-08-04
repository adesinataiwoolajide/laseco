<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Log extends Model
{
    use SoftDeletes;
    protected $table = 'logs';
    protected $primaryKey = 'log_id';

    protected $fillable = [
        'email', 'activities',
    ];

    public function getEmailAttribute($value){
        return ($value);
    }

    public function seEmailAttribute($value){
        return $this->attributes['email'] = ($value);
    }

    public function getActivitiesAttribute($value){
        return ($value);
    }

    public function setActivitiesAttribute($value){
        return $this->attributes['activities'] = ($value);
    }

    public function getCreatedAtAttribute($value){
        return \Carbon\Carbon::parse($value)->format('d-m-Y');
    }

    public function getDeletedAtAttribute($value){
        return \Carbon\Carbon::parse($value)->format('d-m-Y');
    }

    public function getUpdatedAtAttribute($value){
        return \Carbon\Carbon::parse($value)->format('d-m-Y');
    }
    //
}
