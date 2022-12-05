<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'university',
        'field_of_study',
        'degree',
        'start_year',
        'end_year',
        'education_level'
    ];
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
