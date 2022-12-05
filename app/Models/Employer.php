<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;

    public $fillable = [
        'first_name',
        'last_name',
        'name',
        'email',
        'phone',
        'password',
        'otp',
        'verified',
        'blocked',
        'token',
        'description',
        'logo',
        'website',
        'country',
        'employer_size',
        'title',
    ];

    protected $hidden = [
        'verified', 'password', 'otp', 'token'
    ];
    
    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
    protected $appends = [
        'logo_full_path'
    ];
    public function getLogoFullPathAttribute()
    {
          return $this->logo ? env('APP_URL')  . '/uploads/employers/' . $this->logo : null;
    }
    public function industries()
    {
        return $this->belongsToMany(Industry::class);
    }
}
