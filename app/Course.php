<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'course_name', 'created_at', 'updated_at'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
    ];

    /**
     * Users who have opted this course
     */
    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    /**
     * Course timings
     */
    public function timings()
    {
        return $this->hasMany('App\Timing');
    }
}
