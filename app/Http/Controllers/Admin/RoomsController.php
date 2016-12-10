<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomsController extends Controller
{
    public function index(Request $request)
    {
        $rooms = Room::orderBy('id', 'desc');

        if (!empty($request->searchcode))
        {
            $rooms = $rooms->where('code_rooms', 'LIKE', '%' . $request->searchcode . '%');
        }

        if (!empty($request->searchname))
        {
            $rooms = $rooms->where('name', 'LIKE', '%' . $request->searchname . '%');
        }

        $rooms = $rooms->paginate(10);

        return view('admin.room.index', compact('rooms'));
    }

    public function create(Request $request)
    {

        $type = array(
            'Teori'        => 'Teori',
            'Laboratorium' => 'Laboratorium');

        return view('admin.room.create', compact('type'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'code_rooms' => 'unique:rooms,code_rooms|required',
            'namerooms'  => 'required',
            'capacity'   => 'required',

        ]);

        $params = [
            'code_rooms' => $request->input('code_rooms'),
            'name'       => $request->input('namerooms'),
            'capacity'   => $request->input('capacity'),
            'type'       => $request->input('type'),
        ];

        $rooms = Room::create($params);

        return redirect()->route('admin.rooms');
    }

    public function edit($id)
    {
        $rooms = Room::find($id);

        if ($rooms == null)
        {
            return view('admin.layouts.404');
        }

        $type = array(
            'Teori'        => 'Teori',
            'Laboratorium' => 'Laboratorium');

        return view('admin.room.edit', compact('rooms', 'type'));
    }

    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'code_rooms' => 'unique:rooms,code_rooms,' . $id . '|required',
            'namerooms'  => 'required',
            'capacity'   => 'required',

        ]);

        $rooms             = Room::find($id);
        $rooms->code_rooms = $request->input('code_rooms');
        $rooms->name       = $request->input('namerooms');
        $rooms->capacity   = $request->input('capacity');
        $rooms->type       = $request->input('type');
        $rooms->save();

        return redirect()->route('admin.rooms');
    }

    public function destroy($id)
    {
        Room::find($id)->delete();

        return redirect()->route('admin.rooms')->with('success', 'Ruangan berhasil dihapus');
    }
}
