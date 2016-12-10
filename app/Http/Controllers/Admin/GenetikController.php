<?php namespace App\Http\Controllers\Admin;

use App\Algoritma\GenerateAlgoritma;
use App\Http\Controllers\Controller;
use App\Models\Lecturer;
use App\Models\Schedule;
use App\Models\Setting;
use App\Models\Teach;
use Excel;
use Illuminate\Http\Request;

class GenetikController extends Controller
{
    public function index(Request $request)
    {
        $years = Teach::select('year')->groupBy('year')->pluck('year', 'year');

        return view('admin.genetik.index', compact('years'));
    }

    public function submit(Request $request)
    {
        $years            = Teach::select('year')->groupBy('year')->pluck('year', 'year');
        $input_kromosom   = $request->input('kromosom');
        $input_year       = $request->input('year');
        $input_semester   = $request->input('semester');
        $input_generasi   = $request->input('generasi');
        $input_crossover  = $request->input('crossover');
        $input_mutasi     = $request->input('mutasi');
        $count_lecturers  = Lecturer::count();
        $count_teachs     = Teach::count();
        $kromosom         = $input_kromosom * $input_generasi;
        $crossover        = $input_kromosom * $input_crossover;
        $generate         = new GenerateAlgoritma;
        $data_kromosoms   = $generate->randKromosom($kromosom, $count_teachs, $input_year, $input_semester);
        $result_schedules = $generate->checkPinalty();

        $total_gen        = Setting::firstOrNew(['key' => 'total_gen']);
        $total_gen->name  = 'Total Gen';
        $total_gen->value = $crossover;
        $total_gen->save();

        $mutasi        = Setting::firstOrNew(['key' => 'mutasi']);
        $mutasi->name  = 'Mutasi';
        $mutasi->value = (3 * $count_teachs) * $input_kromosom * $input_mutasi;
        $mutasi->save();

        return redirect()->route('admin.generates.result', 1);
    }

    public function result($id)
    {
        $years          = Teach::select('year')->groupBy('year')->pluck('year', 'year');
        $kromosom       = Schedule::select('type')->groupBy('type')->get()->count();
        $crossover      = Setting::where('key', Setting::CROSSOVER)->first();
        $mutasi         = Setting::where('key', Setting::MUTASI)->first();
        $value_schedule = Schedule::where('type', $id)->first();
        $schedules      = Schedule::orderBy('days_id', 'desc')
            ->orderBy('times_id', 'desc')
            ->where('type', $id)
            ->paginate();

        if (empty($value_schedule))
        {
            abort(404);
        }

        for ($i = 1; $i <= $kromosom; $i++)
        {
            $value_schedules = Schedule::where('type', $i)->first();
            $data_kromosom[] = [
                'value_schedules' => $value_schedules->value,

            ];
        }

        return view('admin.genetik.result', compact('schedules', 'years', 'data_kromosom', 'id', 'value_schedule', 'crossover', 'mutasi'));
    }

    public function excel($id)
    {
        $schedules = Schedule::orderBy('days_id', 'desc')
            ->orderBy('times_id', 'desc')
            ->where('type', $id)
            ->get();

        return Excel::create('Algoritma Genetika', function ($excel) use ($schedules)
        {
            $excel->sheet('Genetika', function ($sheet) use ($schedules)
            {
                $sheet->loadView('admin.genetik.export')->with('schedules', $schedules);
            });
        })->export('xlsx');

        return redirect()->back();
    }

}
