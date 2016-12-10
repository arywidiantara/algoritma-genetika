@extends('admin.layouts.master')

@section('title')
{{ $title= 'Waktu Berhalangan' }}
@stop

@section('style')
<style type="text/css">
.panel-body{
       width:auto;
       height:auto;
       overflow-x:auto;
    }
</style>
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
                            {!! Form::open(['role' => 'form', 'route' => 'admin.timenotavailables', 'method' =>'get']) !!}
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::text('searchlecturers', Input::get('searchlecturers')?: null, ['class' => 'form-control', 'placeholder' => 'Mencari Berdasarkan Nama Dosen']) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::text('searchday', Input::get('searchday')?: null, ['class' => 'form-control', 'placeholder' => 'Mencari Berdasarkan Hari']) !!}
                                </div>
                            </div>
                            <div class="col-md-12" style="padding-bottom: 15px;">
                                {!! Form::submit('Search',['class'=>'btn btn-default btn-block']) !!}
                            </div>
                            <div class="col-md-12">
                            {!! Form::close() !!}
                            <div class="panel-body table-responsive">
                            @include('admin._partials.notifications')
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr class="info">
                                            <th style="text-align:center;">
                                                No.
                                            </th>
                                            <th style="text-align:center;">
                                                Dosen
                                            </th>
                                            <th style="text-align:center;">
                                                Hari
                                            </th>
                                            <th style="text-align:center;">
                                                Waktu
                                            </th>
                                           <th colspan="2" style="text-align:center;">
                                                <a class="btn btn-primary" href="{{ route('admin.timenotavailable.create') }}">
                                                    <i class="fa fa-plus">
                                                    </i>
                                                    Tambah Data
                                                </a>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     @foreach($timenotavailables as $key => $timenotavailable)
                                        <tr>
                                            <td align="center">
                                                {{ ($timenotavailables->currentpage()-1) * $timenotavailables->perpage() + $key + 1 }}
                                            </td>
                                            <td>
                                                {{ isset($timenotavailable->lecturer->name) ? $timenotavailable->lecturer->name : '' }}
                                            </td>
                                            <td>
                                                {{ isset($timenotavailable->day->name_day) ? $timenotavailable->day->name_day : '' }}
                                            </td>
                                            <td>
                                                {{ isset($timenotavailable->time->range) ? $timenotavailable->time->range : '' }}
                                            </td>
                                           <td class="text-center">
                                                <div class="btn-group">
                                                    <a class="btn btn-warning btn-sm" href="{{ route('admin.timenotavailable.edit', $timenotavailable->id) }}">
                                                        <span class="glyphicon glyphicon-edit">
                                                        </span>
                                                        Ubah
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    {!! Form::model($timenotavailable, ['route' => ['admin.timenotavailable.delete', $timenotavailable->id], 'onclick' => 'return confirm("Anda Yakin?");']) !!}
                                                    {!! Form::hidden('_method', 'DELETE') !!}
                                                    {!! Form::button('
                                                    <span class="glyphicon glyphicon-trash">
                                                    </span>
                                                    Hapus', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm']) !!}
                                                {!! Form::close() !!}
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {!! $timenotavailables->appends(Input::all())->render() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@stop
