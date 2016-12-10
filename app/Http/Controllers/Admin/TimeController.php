<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Time;
use App\Models\Timenotavailable;
use Illuminate\Http\Request;

class TimeController extends Controller
{
    public function index(Request $request)
    {
        $times = Time::orderBy('id', 'desc')->paginate(10);

        return view('admin.time.index', compact('times'));
    }

    public function create(Request $request)
    {
        return view('admin.time.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'code_times'  => 'unique:times,code_times|required',
            'time_begin'  => 'required',
            'time_finish' => 'required',
            'sks'         => 'required',
        ]);

        $begin  = $request->input('time_begin');
        $finish = $request->input('time_finish');
        $range  = $request->input('time_begin') . " - " . $request->input('time_finish');

        $params = [
            'code_times'  => $request->input('code_times'),
            'time_begin'  => $begin,
            'time_finish' => $finish,
            'range'       => $range,
            'sks'         => $request->input('sks'),
        ];

        $times = Time::create($params);

        return redirect()->route('admin.times');
    }

    public function edit($id)
    {
        $times = Time::find($id);

        if ($times == null)
        {
            return view('admin.layouts.404');
        }

        return view('admin.time.edit', compact('times'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'code_times'  => 'required',
            'time_begin'  => 'required',
            'time_finish' => 'required',
            'sks'         => 'required',
        ]);

        $times              = Time::find($id);
        $begin              = $request->input('time_begin');
        $finish             = $request->input('time_finish');
        $range              = $request->input('time_begin') . " - " . $request->input('time_finish');
        $times->code_times  = $request->input('code_times');
        $times->time_begin  = $begin;
        $times->time_finish = $finish;
        $times->range       = $range;
        $times->sks         = $request->input('sks');
        $times->save();

        return redirect()->route('admin.times');
    }

    public function destroy($id)
    {
        $timenotavailables = Timenotavailable::where('times_id', $id)->first();

        if (!empty($timenotavailables))
        {
            return redirect()->route('admin.times')->with('danger', 'Anda Harus Menghapus Data Waktu Yang Berhalangan yang Berhubungan Dengan Waktu Ini Terlebih Dahulu');
        }
        else
        {
            Time::find($id)->delete();
        }

        return redirect()->route('admin.times')->with('success', 'Waktu berhasil dihapus');
    }

}
