<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory; 
    protected $table = 'employees';

    public $fillable = [
        'email',
        'password',
        'otp',
        'verified',
        'blocked',
        'token',
        'cv',
        'abstract',
        'education_level_id',
    ];

    protected $hidden = [
        'verified', 'password', 'otp', 'token'
    ];
    
    public function jobsApply()
    {
        return $this->hasMany(AppliedJob::class);
    }
    public function careerDetail()
    {
        return $this->hasOne(CareerDetail::class);
    }
    public function contactDetail()
    {
        return $this->hasOne(ContactDetail::class);
    }
    public function educationDetail()
    {
        return $this->hasMany(EducationDetail::class);
    }
    public function experienceDetail()
    {
        return $this->hasMany(ExperienceDetail::class);
    }
    public function personalDetail()
    {
        return $this->hasOne(PersonalDetail::class);
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
    public function jobTitles()
    {
        return $this->belongsToMany(JobTitle::class);
    }
    public function skills()
    {
        return $this->hasMany(Skill::class);
    }
    public function languages()
    {
        return $this->hasMany(Language::class);
    }
    public function educationLevel()
    {
        return $this->belongsTo(EducationLevel::class);
    }
    public function careerLevel()
    {
        return $this->belongsTo(CareerLevel::class);
    }

    protected $appends = [
        'cv_full_path'
    ];
    public function getCvFullPathAttribute()
    {
          return $this->logo ? env('APP_URL')  . 'uploads/employees/cv' . $this->cv : null;
    }
    
}
