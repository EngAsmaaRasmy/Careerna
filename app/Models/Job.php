<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'location',
        'experience',
        'vacancies',
        'career_level_id',
        'job_type_id',
        'salary',
        'requirements',
        'job_status',
        'type',
        'admin_approve',
        'category_id',
        'employer_id',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }
    public function careerLevel()
    {
        return $this->belongsTo(CareerLevel::class);
    }
    public function jobType()
    {
        return $this->belongsTo(JobType::class);
    }
    public function educationLevel()
    {
        return $this->belongsTo(EducationLevel::class);
    }
    public function jobApply()
    {
        return $this->hasMany(AppliedJob::class);
    }
    public function jobSave()
    {
        return $this->hasMany(SavedJob::class);
    }
}
