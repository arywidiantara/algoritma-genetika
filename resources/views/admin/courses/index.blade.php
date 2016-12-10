@extends('admin.layouts.master')

@section('title')
{{ $title= 'Mata Pelajaran' }}
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
                        {!! Form::open(['role' => 'form', 'route' => 'admin.courses', 'method' =>'get']) !!}
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::text('searchcode', Input::get('searchcode')?: null, ['class' => 'form-control', 'placeholder' => 'Mencari Berdasarkan Kode Mata Kuliah']) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::text('searchname', Input::get('searchname')?: null, ['class' => 'form-control', 'placeholder' => 'Mencari Berdasarkan Nama Mata Kuliah']) !!}
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
                                                Kode Mata Kuliah
                                            </th>
                                            <th style="text-align:center;">
                                                Nama Mata Kuliah
                                            </th>
                                            <th style="text-align:center;">
                                                SKS
                                            </th>
                                            <th style="text-align:center;">
                                                Semester
                                            </th>
                                            <th style="text-align:center;">
                                                Type
                                            </th>
                                           <th colspan="2" style="text-align:center;">
                                                <a class="btn btn-primary" href="{{ route('admin.courses.create') }}">
                                                    <i class="fa fa-plus">
                                                    </i>
                                                    Tambah Data
                                                </a>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($courses as $key => $course)
                                        <tr>
                                            <td align="center">
                                                {{ ($courses->currentpage()-1) * $courses->perpage() + $key + 1 }}
                                            </td>
                                             <td>
                                                {{ $course->code_courses }}
                                            </td>
                                            <td>
                                                {{ $course->name }}
                                            </td>
                                            <td>
                                                {{ $course->sks }}
                                            </td>
                                            <td>
                                                {{ $course->semester }}
                                            </td>
                                            <td>
                                                {{ $course->type }}
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a class="btn btn-warning btn-sm" href="{{ route('admin.courses.edit', $course->id) }}">
                                                        <span class="glyphicon glyphicon-edit">
                                                        </span>
                                                        Ubah
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    {!! Form::model($course, ['route' => ['admin.courses.delete', $course->id], 'onclick' => 'return confirm("Anda Yakin?");']) !!}
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
                                {!! $courses->appends(Input::all())->render() !!}
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
