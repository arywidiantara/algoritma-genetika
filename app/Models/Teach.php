<?php namespace App\Models;

use App\Models\Course;
use App\Models\Lecturer;
use Illuminate\Database\Eloquent\Model;

class Teach extends Model
{
    protected $table   = 'teachs';
    protected $guarded = [];

    public function lecturer()
    {
        return $this->belongsTo(Lecturer::class, 'lecturers_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'courses_id');
    }
}
