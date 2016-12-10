@extends('admin.layouts.master')

@section('title')
{{ $title= 'Generate Algoritma' }}
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
                        {!! Form::open(['role' => 'form', 'route' => 'admin.generates.submit', 'id' => 'form-register', 'method' => 'get']) !!}
                            <div class="col-md-6">
                                <div class="form-group">
                                  {!! Form::select('year',
                                    $years
                                 , Input::get('year'), ['class' => 'form-control select2 to-select required', 'id' => 'year','placeholder' => 'Pilih Tahun Akademik']) !!}
                                <label id="year-error" class="error" for="year" style="display: none;">This field is required.</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                  {!! Form::select('semester', [
                                      'Genap' => 'Genap',
                                  ], Input::get('semester'), ['class' => 'form-control select2 to-select required', 'id' => 'semester','placeholder' => 'Pilih Semester']) !!}
                                <label id="semester-error" class="error" for="semester" style="display: none;">This field is required.</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                  {!! Form::select('kromosom', [
                                        '1' => '1',
                                        '2' => '2',
                                        '3' => '3',
                                        '4' => '4',
                                        '5' => '5',
                                  ], Input::get('kromosom'), ['class' => 'form-control select2 to-select required', 'id' => 'kromosom','placeholder' => 'Masukkan Nilai Pembangkitan Kromosom']) !!}
                                <label id="kromosom-error" class="error" for="kromosom" style="display: none;">This field is required.</label>
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="form-group">
                                  {!! Form::select('generasi', [
                                        '1' => '1',
                                        '2' => '2',
                                        '3' => '3',
                                        '4' => '4',
                                        '5' => '5',
                                  ], Input::get('generasi'), ['class' => 'form-control select2 to-select required', 'id' => 'generasi','placeholder' => 'Masukkan Nilai Maksimal Generasi']) !!}
                                <label id="generasi-error" class="error" for="generasi" style="display: none;">This field is required.</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                {!! Form::text('crossover', Input::get('crossover'), ['class' => 'form-control required', 'maxlength' => '100', 'placeholder' => 'Masukkan Nilai Crossover', 'id' => 'crossover']) !!}
                                <label id="crossover-error" class="error" for="crossover" style="display: none;">This field is required.</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                  {!! Form::text('mutasi', Input::get('mutasi'), ['class' => 'form-control required', 'maxlength' => '100', 'placeholder' => 'Masukkan Nilai Mutasi ', 'id' => 'mutasi']) !!}
                                  {!! Form::hidden('tabs', Input::get('tabs') ? Input::get('tabs') : 1, ['id' => 'tabs']) !!}
                                  <label id="mutasi-error" class="error" for="mutasi" style="display: none;">This field is required.</label>
                                </div>
                            </div>
                            <div class="col-md-12" style="padding-bottom: 15px;">
                                {!! Form::submit('Generate',['class'=>'btn btn-default btn-block']) !!}
                            </div>
                            <div class="col-md-12">
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@stop
