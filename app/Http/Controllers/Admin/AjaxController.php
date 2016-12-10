<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lecturer;
use App\Models\Room;
use App\Models\Teach;
use App\Models\User;
use Illuminate\Http\Request;
use Response;

class AjaxController extends Controller
{
    public function EmailUser(Request $request)
    {
        $users  = User::where('email', $request->emailuser)->first();
        $iduser = $request->iduser;

        if ($users == null)
        {
            $params = true;
        }
        else
        {
            if ($users->id == $iduser)
            {
                $params = true;
            }
            else
            {
                $params = false;
            }
        }
        return Response::json($params);
    }

    public function EmailLecturer(Request $request)
    {
        $lecturers  = Lecturer::where('email', $request->emaillecturer)->first();
        $idlecturer = $request->idlecturer;

        if ($lecturers == null)
        {
            $params = true;
        }
        else
        {
            if ($lecturers->id == $idlecturer)
            {
                $params = true;
            }
            else
            {
                $params = false;
            }
        }
        return Response::json($params);
    }

    public function NidnLecturer(Request $request)
    {
        $lecturers  = Lecturer::where('nidn', $request->nidnlecturer)->first();
        $idlecturer = $request->idlecturer;

        if ($lecturers == null)
        {
            $params = true;
        }
        else
        {
            if ($lecturers->id == $idlecturer)
            {
                $params = true;
            }
            else
            {
                $params = false;
            }
        }
        return Response::json($params);
    }

    public function NameCourses(Request $request)
    {
        $courses  = Course::where('name', $request->namecourses)->first();
        $idcourse = $request->idcourse;

        if ($courses == null)
        {
            $params = true;
        }
        else
        {
            if ($courses->id == $idcourse)
            {
                $params = true;
            }
            else
            {
                $params = false;
            }
        }
        return Response::json($params);
    }

    public function CodeCourses(Request $request)
    {
        $courses  = Course::where('code_courses', $request->code_courses)->first();
        $idcourse = $request->idcourse;

        if ($courses == null)
        {
            $params = true;
        }
        else
        {
            if ($courses->id == $idcourse)
            {
                $params = true;
            }
            else
            {
                $params = false;
            }
        }
        return Response::json($params);
    }

    public function CodeRooms(Request $request)
    {
        $rooms  = Room::where('code_rooms', $request->code_rooms)->first();
        $idroom = $request->idroom;

        if ($rooms == null)
        {
            $params = true;
        }
        else
        {
            if ($rooms->id == $idroom)
            {
                $params = true;
            }
            else
            {
                $params = false;
            }
        }
        return Response::json($params);
    }

    public function NameRooms(Request $request)
    {
        $rooms  = Room::where('name', $request->namerooms)->first();
        $idroom = $request->idroom;

        if ($rooms == null)
        {
            $params = true;
        }
        else
        {
            if ($rooms->id == $idroom)
            {
                $params = true;
            }
            else
            {
                $params = false;
            }
        }
        return Response::json($params);
    }

    public function Teachsroom(Request $request)
    {
        $teachs   = Teach::where('courses_id', $request->courses)->first();
        $idteachs = $request->idteachs;

        if ($teachs == null)
        {
            $params = true;
        }
        else
        {
            if ($teachs->id == $idteachs)
            {
                $params = true;
            }
            else
            {
                $params = false;
            }
        }
        return Response::json($params);
    }

}
