<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobTitle extends Model
{
    use HasFactory;
    
    public $fillable = [
        'name',
    ];
    public function employeeJobTitles()
    {
          return $this->belongsToMany(Employee::class);
    }
}
