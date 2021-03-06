<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the profile associated with the Employers
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profile()
    {
        return $this->hasOne('App\Models\Employer\Profile');
    }

    /**
     * Get the extra user data associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function userData()
    {
        return $this->hasOne('App\Models\UserData');
    }


    public function verifyUser()
    {
        return $this->hasOne('App\Models\VerifyUser');
    }

     public function passwordReset()
    {
        return $this->hasOne('App\Models\VerifyUser');
    }

}
