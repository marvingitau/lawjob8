<?php

namespace App\Models\Admin;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobAttributs extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name', 'email', 'password',
    ];


    public static function types(){
        $data = collect([]);
        $data->put('job_experience',['label'=>'Job Experience','icon'=>'<i class="fas fa-chart-bar"></i>']);
        $data->put('job_level',['label'=>'Career Level','icon'=>'<i class="fas fa-users"></i>']);
        $data->put('monthly_salary',['label'=>'Monthly Salary','icon'=>'<i class="fas fa-money-bill-wave"></i>']);
        $data->put('work_type',['label'=>'Job Type','icon'=>'<i class="fas fa-briefcase"></i>']);
        $data->put('education_qualification',['label'=>'Education Level','icon'=>'<i class="fas fa-graduation-cap"></i>']);
        $data->put('country',['label'=>'Country','icon'=>'<i class="fas fa-flag-checkered"></i>']);
        $data->put('city',['label'=>'City','icon'=>'<i class="fas fa-city"></i>']);
        $data->put('package',['label'=>'Package','icon'=>'<i class="fas fa-box"></i>']);

        return $data;
    }
    public static function getAttr($type){
        return JobAttributs::where('type',$type)->get();
    }

}
