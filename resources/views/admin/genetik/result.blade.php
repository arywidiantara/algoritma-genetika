@extends('admin.layouts.master')

@section('title')
{{ $title= 'Hasil Generate Algoritma' }}
@stop

@section('style')
<style type="text/css">
.panel-body{
       width:auto;
       height:auto;
       overflow:auto;
    }
</style>
@stop

@section('script')
<script type="text/javascript">
    $('#myAction').change(function(){
        var action =  $(this).val();
        window.location = action;
    });
</script>
@stop

@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            {{ $title }}
                        </h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse" type="button">
                                <i class="fa fa-minus">
                                </i>
                            </button>
                            <button class="btn btn-box-tool" data-widget="remove" type="button">
                                <i class="fa fa-times">
                                </i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4">
                                <a class="btn btn-warning btn-block" href="{{ route('admin.generates', Input::all()) }}">
                                    <span class="glyphicon glyphicon-hand-left">
                                    </span>
                                    Kembali
                                </a>
                            </div>
                            <div class="col-md-4" style="padding-bottom: 3%;">
                                <a class="btn btn-info btn-block" href="{{ route('admin.generates.excel', $id) }}">
                                    <span class="glyphicon glyphicon-download">
                                    </span>
                                    Export Excel Data Ini
                                </a>
                            </div>
                            <div class="col-md-4" style="padding-bottom: 3%;">
                            @if(!empty($data_kromosom))
                                <select class="form-control select2" id="myAction">
                                @foreach ($data_kromosom as $key => $kromosom)
                                    <option value="{{ $key+1 }}"
                                    @if ($id == ($key+1))
                                        selected="selected">
                                    @else
                                        >
                                    @endif
                                            @if ($kromosom['value_schedules'] == 1)
                                                Jadwal Terbaik
                                            @else
                                                Jadwal {{ $key+1 }}
                                            @endif
                                    </li>
                                    </option>
                                @endforeach
                                </select>
                            @endif
                            </div>
                            <div class="col-md-12">
                            {{--
                            @if(!empty($data_kromosom))
                            <ul class="nav nav-tabs nav-justified">
                                @foreach ($data_kromosom as $key => $kromosom)
                                    @if ($id == ($key+1))
                                        <li role="presentation" class="active">
                                    @else
                                        <li role="presentation">
                                    @endif
                                        <a href="{{ URL::Route('admin.generates.result', $key+1) }}">
                                            @if ($kromosom['value_schedules'] == 1)
                                                Jadwal Terbaik
                                            @else
                                                Jadwal {{ $key+1 }}
                                            @endif
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                            @endif
                            --}}
                            <br>
                            <div class="alert alert-success alert-dismissable">
                                <button aria-hidden="true" class="close" data-dismiss="alert" type="button">
                                    ×
                                </button>
                                <h4>
                                    Nilai Fitness : 1 / 1 + ( 0 {{ $value_schedule->value_process }} ) = {{ $value_schedule->value }}
                                    <br>
                                </h4>
                                <h4>
                                    Crossover : {{ $crossover->value }}
                                    <br>
                                </h4>
                                <h4>
                                    Mutasi : {{ $mutasi->value }}
                                    <br>
                                </h4>
                            </div>
                            <div class="panel-body table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr class="info">
                                            <th style="text-align:center;">
                                                No.
                                            </th>
                                            <th style="text-align:center;">
                                                Hari
                                            </th>
                                            <th style="text-align:center;">
                                                Jam
                                            </th>
                                            <th style="text-align:center;">
                                                Nama Ruangan
                                            </th>
                                            <th style="text-align:center;">
                                                Kapasitas Ruangan
                                            </th>
                                            <th style="text-align:center;">
                                                Mata Kuliah
                                            </th>
                                            <th style="text-align:center;">
                                                Dosen Pengampu
                                            </th>
                                            <th style="text-align:center;">
                                                Semester
                                            </th>
                                            <th style="text-align:center;">
                                                SKS
                                            </th>
                                            <th style="text-align:center;">
                                                Kelas
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($schedules as $key => $schedule)
                                        <tr>
                                            <td align="center">
                                                {{ $key + 1 }}
                                            </td>
                                            <td >
                                                {{
                                                    isset($schedule->day->name_day) ? $schedule->day->name_day : ''
                                                }}
                                            </td>
                                            <td >
                                                {{
                                                    isset($schedule->time->range) ? $schedule->time->range : ''
                                                }}
                                            </td>
                                            <td >
                                                {{
                                                    isset($schedule->room->name) ? $schedule->room->name : ''
                                                }}
                                            </td>
                                            <td >
                                                {{
                                                    isset($schedule->room->capacity) ? $schedule->room->capacity : ''
                                                }}
                                            </td>
                                            <td >
                                                {{
                                                    isset($schedule->teach->course->name) ? $schedule->teach->course->name : ''
                                                }}
                                            </td>
                                            <td >
                                                {{
                                                    isset($schedule->teach->lecturer->name) ? $schedule->teach->lecturer->name : ''
                                                }}
                                            </td>
                                            <td >
                                                {{
                                                    isset($schedule->teach->course->semester) ? $schedule->teach->course->semester : ''
                                                }}
                                            </td>
                                            <td >
                                                {{
                                                    isset($schedule->teach->course->sks) ? $schedule->teach->course->sks : ''
                                                }}
                                            </td>
                                            <td >
                                                {{
                                                    isset($schedule->teach->class_room) ? $schedule->teach->class_room : ''
                                                }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {!! $schedules->appends(Input::all())->render() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@stop
