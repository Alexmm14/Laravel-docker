<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
        'group',
        'max_students',
    ];
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'CourseGroup', 'group_id', 'course_id');
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'UserGroup', 'groupId', 'userId');
    }
}

