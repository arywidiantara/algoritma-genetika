
@extends('admin.layouts.master')
@section('title')
Anda Tidak Punya Akses
@stop
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Anda Tidak Punya Akses
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="error-page">
            <h2 class="headline text-yellow">
                404
            </h2>
            <div class="error-content">
                <h3>
                    <i class="fa fa-warning text-yellow">
                    </i>
                    Oops! Anda Tidak Punya Akses.
                </h3>
                <p>
                    Anda Tidak Punya Akses.
                    Sementara itu, Anda dapat kembali ke
                    <a href="{{ route('admin.dashboard') }}">
                        dashboard
                    </a>
                </p>
            </div>
            <!-- /.error-content -->
        </div>
        <!-- /.error-page -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@stop
