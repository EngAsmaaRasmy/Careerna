<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'first_name',
        'last_name',
        'gender',
        'phone_number',
        'data_of_birth',
        'country_id',
        'city_id',
        'image'
    ];
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    protected $appends = [
        'image_full_path'
    ];

    public function getImageFullPathAttribute()
    {
        return $this->image ? env('APP_URL')  . '/uploads/employees/' . $this->image : null;
    }
}
