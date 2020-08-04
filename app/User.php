<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable implements MustVerifyEmail
{

    use Notifiable;
    use HasRoles;
    use SoftDeletes;

    protected $table = 'users';
    public $primaryKey = 'id';
    protected $guard_name = 'web';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name', 'phone_number', 'email', 'password', 'role', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getFirstNameAttribute($value)
    {
        return ($value);
    }
    public function setFirstNameAttribute($value)
    {
        return $this->attributes['first_name'] = ($value);
    }

    public function getLastNameAttribute($value)
    {
        return ($value);
    }
    public function setLastNameAttribute($value)
    {
        return $this->attributes['last_name'] = ($value);
    }

    public function getEmailAttribute($value)
    {
        return $value;
    }
    public function setEmailAttribute($value)
    {
        return $this->attributes['email'] = $value;
    }

    public function getPhoneNumberAttribute($value)
    {
        return $value;
    }

    public function setPhoneNumberAttribute($value)
    {
        return $this->attributes['phone_number'] = $value;
    }

    public function getPasswordAttribute($value)
    {
        return $value;
    }

    public function setPasswordAttribute($value)
    {
        return $this->attributes['password'] = $value;
    }

    public function getRoleAttribute($value)
    {
        return $value;
    }

    public function setRoleAttribute($value)
    {
        return $this->attributes['role'] = $value;
    }

    public function getStatusAttribute($value)
    {
        return $value;
    }

    public function setStatusAttribute($value)
    {
        return $this->attributes['status'] = $value;
    }

    public function getCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d-m-Y');
    }

    public function getDeletedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d-m-Y');
    }

    public function getUpdatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d-m-Y');
    }

    public function clientDetails()
    {
        return $this->belongsTo('App\Client', 'client_id', 'user_id');
    }
}
