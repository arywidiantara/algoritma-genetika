<?php namespace App\Models;

use App\Models\Day;
use App\Models\Time;
use Illuminate\Database\Eloquent\Model;

class Timeday extends Model
{
    protected $table   = 'timedays';
    protected $guarded = [];

    public function day()
    {
        return $this->belongsTo(Day::class, 'days_id');
    }

    public function time()
    {
        return $this->belongsTo(Time::class, 'times_id');
    }
}
