<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExperienceDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'job_title',
        'company_name',
        'category_id',
        'job_type_id',
        'start_year',
        'start_month',
        'end_year',
        'end_month',
    ];
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    public function jobType()
    {
        return $this->belongsTo(JobType::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
