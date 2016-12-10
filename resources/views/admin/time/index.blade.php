@extends('admin.layouts.master')

@section('title')
{{ $title = 'Waktu' }}
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
                            <div class="panel-body table-responsive">
                            @include('admin._partials.notifications')
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr class="info">
                                            <th style="text-align:center;">
                                                No.
                                            </th>
                                            <th style="text-align:center;">
                                                Kode Waktu
                                            </th>
                                            <th style="text-align:center;">
                                                Waktu Mulai
                                            </th>
                                            <th style="text-align:center;">
                                                Waktu Selesai
                                            </th>
                                            <th style="text-align:center;">
                                                Range Waktu
                                            </th>
                                            <th style="text-align:center;">
                                                Sks
                                            </th>
                                            <th colspan="2" style="text-align:center;">
                                                <a class="btn btn-primary" href="{{ route('admin.time.create') }}">
                                                    <i class="fa fa-plus">
                                                    </i>
                                                    Tambah Data
                                                </a>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     @foreach($times as $key => $time)
                                        <tr>
                                            <td align="center">
                                                {{ ($times->currentpage()-1) * $times->perpage() + $key + 1 }}
                                            </td>
                                            <td>
                                                {{ $time->code_times }}
                                            </td>
                                            <td>
                                                {{ $time->time_begin }}
                                            </td>
                                            <td>
                                                {{ $time->time_finish }}
                                            </td>
                                            <td>
                                                {{ $time->range }}
                                            </td>
                                            <td>
                                                {{ $time->sks }}
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a class="btn btn-warning btn-sm" href="{{ route('admin.time.edit', $time->id) }}">
                                                        <span class="glyphicon glyphicon-edit">
                                                        </span>
                                                        Ubah
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    {!! Form::model($time, ['route' => ['admin.time.delete', $time->id], 'onclick' => 'return confirm("Anda Yakin?");']) !!}
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
                                {!! $times->appends(Input::all())->render() !!}
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
