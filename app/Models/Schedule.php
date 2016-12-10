<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table   = 'schedules';
    protected $guarded = [];

    const BEGINNILAI = 1;
    const FRIDAY     = 5;

    public function day()
    {
        return $this->belongsTo(Day::class, 'days_id');
    }

    public function teach()
    {
        return $this->belongsTo(Teach::class, 'teachs_id');
    }

    public function time()
    {
        return $this->belongsTo(Time::class, 'times_id');
    }

    public function room()
    {
        return $this->belongsTo(Room::class, 'rooms_id');
    }
}
