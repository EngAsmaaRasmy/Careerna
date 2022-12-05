<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
      use HasFactory;

      public $fillable = [
          'name',
          'description',
          'icon',
      ];
      public function jobs()
      {
          return $this->hasMany(Job::class);
      }
      protected $appends = [
          'icon_full_path'
      ];

      public function getIconFullPathAttribute()
      {
          return $this->icon ? env('APP_URL')  . 'uploads/categories/' . $this->icon : null;
      }
      public function employeeCategories()
      {
          return $this->belongsToMany(Employee::class);
      }
}
