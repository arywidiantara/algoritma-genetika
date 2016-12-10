@extends('admin.layouts.master')

@section('title')
  {{ $title = 'Dashboard' }}
@stop

@section('content')
  <div class="content-wrapper">
    <section class="content">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
            <h3>{{ $times }}</h3>
              <p>Waktu</p>
            </div>
            <div class="icon">
              <i class="fa  fa-clock-o"></i>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{ $days }}</h3>
              <p>Hari</p>
            </div>
            <div class="icon">
              <i class="fa fa-calendar"></i>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{ $lecturers }}</h3>
              <p>Dosen</p>
            </div>
            <div class="icon">
              <i class="fa  fa-users"></i>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
            <h3>{{ $courses }}</h3>
              <p>Mata Pelajaran</p>
            </div>
            <div class="icon">
              <i class="fa   fa-file"></i>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{ $teachs }}</h3>
              <p>Pengampu</p>
            </div>
            <div class="icon">
              <i class="fa fa-university"></i>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{ $rooms }}</h3>
              <p>Ruangan</p>
            </div>
            <div class="icon">
              <i class="fa fa-home"></i>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{ $users }}</h3>
              <p>Users</p>
            </div>
            <div class="icon">
              <i class="fa  fa-user-plus"></i>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{ $schedules }}</h3>
              <p>Jadwal Mata Kuliah</p>
            </div>
            <div class="icon">
              <i class="fa  fa-folder"></i>
            </div>
          </div>
        </div>
    </section>
  </div>
@stop
