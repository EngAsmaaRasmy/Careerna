<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareerDetail extends Model
{
    use HasFactory;
     
    protected $fillable = [
        'employee_id',
        'experience',
        'career_level_id',
        'job_type_id',
        'salary',
        'candidates_status'
    ];
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    public function careerLevel()
    {
        return $this->belongsTo(CareerLevel::class);
    }
    public function jobType()
    {
        return $this->belongsTo(JobType::class);
    }
}
