@extends('admin.layouts.master')

@section('title')
{{ $title= 'Pengampu' }}
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
                        {!! Form::open(['role' => 'form', 'route' => 'admin.teachs', 'method' =>'get']) !!}
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::text('searchlecturers', Input::get('searchlecturers')?: null, ['class' => 'form-control', 'placeholder' => 'Mencari Berdasarkan Nama Dosen']) !!}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::text('searchcourse', Input::get('searchcourse')?: null, ['class' => 'form-control', 'placeholder' => 'Mencari Berdasarkan Mata Kuliah']) !!}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::text('searchclass', Input::get('searchclass')?: null, ['class' => 'form-control', 'placeholder' => 'Mencari Berdasarkan Kelas']) !!}
                                </div>
                            </div>
                            <div class="col-md-12" style="padding-bottom: 15px;">
                                {!! Form::submit('Search',['class'=>'btn btn-default btn-block']) !!}
                            </div>
                            <div class="col-md-12">
                            {!! Form::close() !!}
                            @include('admin._partials.notifications')
                            <div class="panel-body table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr class="info">
                                            <th style="text-align:center;">
                                                No.
                                            </th>
                                            <th style="text-align:center;">
                                                Nama Dosen
                                            </th>
                                            <th style="text-align:center;">
                                                Mata Kuliah
                                            </th>
                                            <th style="text-align:center;">
                                                Kelas
                                            </th>
                                            <th style="text-align:center;">
                                                Tahun Kurikulum
                                            </th>
                                           <th colspan="2" style="text-align:center;">
                                                <a class="btn btn-primary" href="{{ route('admin.teach.create') }}">
                                                    <i class="fa fa-plus">
                                                    </i>
                                                    Tambah Data
                                                </a>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     @foreach($teachs as $key => $teach)
                                        <tr>
                                            <td align="center">
                                                {{ ($teachs->currentpage()-1) * $teachs->perpage() + $key + 1 }}
                                            </td>
                                            <td>
                                                {{ isset($teach->lecturer->name) ? $teach->lecturer->name : '' }}
                                            </td>
                                            <td>
                                                {{ isset($teach->course->name) ? $teach->course->name : '' }}
                                            </td>
                                            <td>
                                                {{ $teach->class_room }}
                                            </td>
                                            <td>
                                                {{ $teach->year }}
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a class="btn btn-warning btn-sm" href="{{ route('admin.teach.edit', $teach->id) }}">
                                                        <span class="glyphicon glyphicon-edit">
                                                        </span>
                                                        Ubah
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    {!! Form::model($teach, ['route' => ['admin.teach.delete', $teach->id], 'onclick' => 'return confirm("Anda Yakin?");']) !!}
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
                                {!! $teachs->appends(Input::all())->render() !!}
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
