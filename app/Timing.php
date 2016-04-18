<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timing extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'course_id', 'start_time', 'end_time', 'created_at', 'updated_at'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
    ];


    /**
     * Course timings
     */
    public function course()
    {
        return $this->belongsTo('App\Course');
    }
}
