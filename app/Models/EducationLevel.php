<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationLevel extends Model
{
    use HasFactory;
 
    protected $fillable = [
        'name',
    ];
    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
    public function employee()
    {
        return $this->hasOne(Employee::class);
    }
}
