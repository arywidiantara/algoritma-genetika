<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="msapplication-config" content="{{ URL::to('assets/img/favicon/browserconfig.xml') }}">
        <meta name="theme-color" content="#ffffff">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport"/>
        <title>
            Optimasi - @yield('title')
        </title>

        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="{{ URL::to('assets/img/apple-touch-icon.png') }}">
        <link rel="icon" type="image/png" href="{{ URL::to('assets/img/favicon/favicon-32x32.png') }}" sizes="32x32">
        <link rel="icon" type="image/png" href="{{ URL::to('assets/img/favicon/favicon-16x16.png') }}" sizes="16x16">
        <link rel="manifest" href="{{ URL::to('assets/img/favicon/manifest.json') }}">
        <link rel="mask-icon" href="{{ URL::to('assets/img/favicon/safari-pinned-tab.svg') }}" color="#5bbad5">
        <link rel="shortcut icon" href="{{ URL::to('assets/img/favicon/favicon.ico') }}">


        <link rel="stylesheet" href="{{ asset('admin/bootstrap/css/bootstrap.min.css') }}"/>
        <link rel="stylesheet" href="{{ asset('admin/dist/css/AdminLTE.min.css') }}"/>
        <link rel="stylesheet" href="{{ asset('admin/dist/css/skins/_all-skins.min.css') }}"/>
        <link rel="stylesheet" href="{{ asset('admin/plugins/select2/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('admin/plugins/datepicker/datepicker3.css') }}">
        <link rel="stylesheet" href="{{ asset('admin/dist/css/rajamobkas-admin.css') }}"/>
        <link rel="stylesheet" href="{{ asset('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}"/>
        <link rel="stylesheet" href="{{ asset('admin/plugins/timepicker/bootstrap-timepicker.min.css') }}"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css"/>
        <style type="text/css">
            .error {
                color: red;
            }
        </style>
        @yield('style')
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        @include('admin._partials.navbar')
        @include('admin._partials.sidebar')
        @yield('content')
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                Powered by
                <b>

                </b>
            </div>
            <strong>
                Copyright &copy; <?php echo Date('Y'); ?>
            </footer>
            <div class="control-sidebar-bg">
            </div>
        </div>
        <!-- ./wrapper -->
        <script src="{{ asset('admin/bootstrap/js/bootstrap.js') }}"></script>
        <script src="{{ asset('admin/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
        <script src="{{ asset('admin/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('admin/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
        <script src="{{ asset('admin/plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
        <script src="{{ asset('admin/plugins/select2/select2.full.min.js') }}"></script>
        <script src="{{ asset('admin/plugins/daterangepicker/moment.js') }}"></script>
        <script src="{{ asset('admin/dist/js/app.min.js') }}"></script>
        <script src="{{ asset('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
        <script src="{{ asset('admin/js/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('admin/js/jquery.mask.min.js') }}"></script>
        @include('admin._partials.js')
        @yield('script')
    </body>
</html>
