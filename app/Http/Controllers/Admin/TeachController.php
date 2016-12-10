<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lecturer;
use App\Models\Teach;
use Illuminate\Http\Request;

class TeachController extends Controller
{

    public function index(Request $request)
    {
        $searchlecturers = $request->input('searchlecturers');
        $searchcourse    = $request->input('searchcourse');
        $teachs          = Teach::whereHas('lecturer', function ($query) use ($searchlecturers)
        {

            if (!empty($searchlecturers))
            {
                $query = $query->where('lecturers.name', 'LIKE', '%' . $searchlecturers . '%');
            }
        })->whereHas('course', function ($query) use ($searchcourse)
        {
            if (!empty($searchcourse))
            {
                $query = $query->where('courses.name', 'LIKE', '%' . $searchcourse . '%');
            }
        });

        if (!empty($request->searchclass))
        {
            $teachs = $teachs->where('class_room', 'LIKE', '%' . $request->searchclass . '%');
        }

        if (!empty($request->searchclass))
        {
            $teachs = $teachs->where('class_room', 'LIKE', '%' . $request->searchclass . '%');
        }

        $teachs = $teachs->orderBy('id', 'desc')->paginate(10);

        return view('admin.teach.index', compact('teachs'));
    }

    public function create(Request $request)
    {
        $lecturers = Lecturer::orderBy('name', 'asc')->pluck('name', 'id');
        $courses   = Course::orderBy('name', 'asc')->pluck('name', 'id');

        return view('admin.teach.create', compact('lecturers', 'courses'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'roomclass' => 'required',
            'year'      => 'required',
            'lecturers' => 'required',
            'courses'   => 'required',
        ]);

        $params = [
            'class_room'   => $request->input('roomclass'),
            'year'         => $request->input('year'),
            'lecturers_id' => $request->input('lecturers'),
            'courses_id'   => $request->input('courses'),
        ];

        $teachs = Teach::create($params);

        return redirect()->route('admin.teachs');
    }

    public function edit($id)
    {
        $teachs    = Teach::find($id);
        $lecturers = Lecturer::orderBy('name', 'asc')->pluck('name', 'id');
        $courses   = Course::orderBy('name', 'asc')->pluck('name', 'id');

        if ($teachs == null)
        {
            return view('admin.layouts.404');
        }

        return view('admin.teach.edit', compact('teachs', 'lecturers', 'courses'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'roomclass' => 'required',
            'year'      => 'required',
            'lecturers' => 'required',
            'courses'   => 'required',
        ]);

        $teachs               = Teach::find($id);
        $teachs->class_room   = $request->input('roomclass');
        $teachs->year         = $request->input('year');
        $teachs->lecturers_id = $request->input('lecturers');
        $teachs->courses_id   = $request->input('courses');
        $teachs->save();

        return redirect()->route('admin.teachs');
    }

    public function destroy($id)
    {
        Teach::find($id)->delete();

        return redirect()->route('admin.teachs')->with('success', 'Pengampu berhasil dihapus');
    }
}
