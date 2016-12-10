<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lecturer;
use Illuminate\Http\Request;

class LecturersController extends Controller
{

    public function index(Request $request)
    {
        $lecturers = Lecturer::orderBy('id', 'desc');

        if (!empty($request->searchname))
        {
            $lecturers = $lecturers->where('name', 'LIKE', '%' . $request->searchname . '%');
        }

        if (!empty($request->searchnidn))
        {
            $lecturers = $lecturers->where('nidn', 'LIKE', '%' . $request->searchnidn . '%');
        }

        $lecturers = $lecturers->paginate(10);

        return view('admin.lecturer.index', compact('lecturers'));
    }
    public function create(Request $request)
    {
        return view('admin.lecturer.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'code_lecturers' => 'unique:lecturers,code_lecturers|required',
            'nidnlecturer'   => 'required',
            'name'           => 'required',
            'emaillecturer'  => 'required',

        ]);

        $params = [
            'code_lecturers' => $request->input('code_lecturers'),
            'nidn'           => $request->input('nidnlecturer'),
            'name'           => $request->input('name'),
            'email'          => $request->input('emaillecturer'),
        ];

        $lecturers = Lecturer::create($params);

        return redirect()->route('admin.lecturers');
    }

    public function edit($id)
    {
        $lecturers = Lecturer::find($id);

        if ($lecturers == null)
        {
            return view('admin.layouts.404');
        }

        return view('admin.lecturer.edit', compact('lecturers'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'code_lecturers' => 'unique:lecturers,code_lecturers,' . $id . '|required',
            'nidnlecturer'   => 'required',
            'name'           => 'required',
            'emaillecturer'  => 'required',

        ]);

        $lecturers                 = Lecturer::find($id);
        $lecturers->code_lecturers = $request->input('code_lecturers');
        $lecturers->nidn           = $request->input('nidnlecturer');
        $lecturers->name           = $request->input('name');
        $lecturers->email          = $request->input('emaillecturer');
        $lecturers->save();

        return redirect()->route('admin.lecturers');
    }

    public function destroy($id)
    {
        Lecturer::find($id)->delete();

        return redirect()->route('admin.lecturers')->with('success', 'Dosen berhasil dihapus');
    }

}
