<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'employer_hr_name',
        'employer_hr_email',
        'first_name',
        'last_name',
        'phone',
        'POBox',
    ];
}
