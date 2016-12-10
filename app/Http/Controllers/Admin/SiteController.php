<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Day;
use App\Models\Lecturer;
use App\Models\Room;
use App\Models\Schedule;
use App\Models\Teach;
use App\Models\Time;
use App\Models\User;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index(Request $request)
    {
        $users     = User::count();
        $courses   = Course::count();
        $days      = Day::count();
        $lecturers = Lecturer::count();
        $rooms     = Room::count();
        $teachs    = Teach::count();
        $times     = Time::count();
        $schedules = Schedule::count();

        return view('admin.site.admin', compact('users', 'courses', 'days', 'lecturers', 'rooms', 'teachs', 'times', 'schedules'));
    }
}
