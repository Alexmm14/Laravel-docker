<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_teacher');
    }
}

