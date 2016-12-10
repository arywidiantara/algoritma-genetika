<?php namespace app\Algoritma;

use App\Models\Day;
use App\Models\Room;
use App\Models\Schedule;
use App\Models\Teach;
use App\Models\Time;
use App\Models\Timenotavailable;
use DB;

class GenerateAlgoritma
{
    public function randKromosom($kromosom, $count_teachs, $input_year, $input_semester)
    {
        Schedule::truncate();

        for ($i = 0; $i < $kromosom; $i++)
        {
            $values = [];
            for ($j = 0; $j < $count_teachs; $j++)
            {
                $teach = Teach::whereHas('course', function ($query) use ($input_semester)
                {
                    $query->where('courses.semester', $input_semester);
                });

                $day   = Day::inRandomOrder()->first();
                $teach = $teach->where('year', $input_year)->inRandomOrder()->first();
                $room  = Room::where('type', $teach->course->type)->inRandomOrder()->first();
                $time  = Time::where('sks', $teach->course->sks)->inRandomOrder()->first();

                $params = [
                    'teachs_id' => $teach->id,
                    'days_id'   => $day->id,
                    'times_id'  => $time->id,
                    'rooms_id'  => $room->id,
                    'type'      => $i + 1,
                ];

                $schedule = Schedule::create($params);
            }
            $data[] = $values;
        }

        return $data;
    }

    public function checkPinalty()
    {
        $schedules = Schedule::select(DB::raw('teachs_id, days_id, times_id, type, count(*) as `jumlah`'))
            ->groupBy('teachs_id')
            ->groupBy('days_id')
            ->groupBy('times_id')
            ->groupBy('type')
            ->having('jumlah', '>', 1)
            ->get();

        $result_schedules = $this->increaseProccess($schedules);

        $schedules = Schedule::select(DB::raw('teachs_id, days_id, rooms_id, type, count(*) as `jumlah`'))
            ->groupBy('teachs_id')
            ->groupBy('days_id')
            ->groupBy('rooms_id')
            ->groupBy('type')
            ->having('jumlah', '>', 1)
            ->get();

        $result_schedules = $this->increaseProccess($schedules);

        $schedules = Schedule::select(DB::raw('times_id, days_id, rooms_id, type, count(*) as `jumlah`'))
            ->groupBy('times_id')
            ->groupBy('days_id')
            ->groupBy('rooms_id')
            ->groupBy('type')
            ->having('jumlah', '>', 1)
            ->get();

        $result_schedules = $this->increaseProccess($schedules);

        $schedules = Schedule::join('teachs', 'teachs.id', '=', 'schedules.teachs_id')
            ->join('lecturers', 'lecturers.id', '=', 'teachs.lecturers_id')
            ->select(DB::raw('lecturers_id, days_id, times_id, type, count(*) as `jumlah`'))
            ->groupBy('lecturers_id')
            ->groupBy('days_id')
            ->groupBy('times_id')
            ->groupBy('type')
            ->having('jumlah', '>', 1)
            ->get();

        $result_schedules = $this->increaseProccess($schedules);

        $schedules = Schedule::where('days_id', Schedule::FRIDAY)->whereIn('times_id', [12, 19, 24])->get();

        if (!empty($schedules))
        {
            foreach ($schedules as $key => $schedule)
            {
                $schedule->value         = $schedule->value + 1;
                $schedule->value_process = $schedule->value_process . "+ 1 ";
                $schedule->save();
            }
        }

        $time_not_availables = Timenotavailable::get();

        if (!empty($time_not_availables))
        {
            foreach ($time_not_availables as $k => $time_not_available)
            {
                $schedules = Schedule::whereHas('teach', function ($query) use ($time_not_available)
                {
                    $query = $query->whereHas('lecturer', function ($q) use ($time_not_available)
                    {
                        $q->where('lecturers.id', $time_not_available->lecturers_id);
                    });
                });

                $schedules = $schedules->where('days_id', $time_not_available->days_id)->where('times_id', $time_not_available->times_id)->get();

                if (!empty($schedules))
                {
                    foreach ($schedules as $key => $schedule)
                    {
                        $schedule->value         = $schedule->value + 1;
                        $schedule->value_process = $schedule->value_process . "+ 1 ";
                        $schedule->save();
                    }
                }

            }
        }

        $schedules = Schedule::get();

        foreach ($schedules as $key => $schedule)
        {
            $schedule->value = 1 / (1 + $schedule->value);
            $schedule->save();
        }

        return $schedules;
    }

    public function increaseProccess($schedules = '')
    {
        if (!empty($schedules))
        {
            foreach ($schedules as $key => $schedule)
            {
                if ($schedule->jumlah > 1)
                {
                    $schedule_wheres = Schedule::where('type', $schedule->type)->get();
                    foreach ($schedule_wheres as $key => $schedule_where)
                    {
                        $schedule_where->value         = $schedule_where->value + ($schedule->jumlah - 1);
                        $schedule_where->value_process = $schedule_where->value_process . " + " . ($schedule->jumlah - 1);
                        $schedule_where->save();
                    }
                }
            }
        }
        return $schedules;
    }

}
