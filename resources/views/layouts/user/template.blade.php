<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>@yield('title')</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="ThemeDesign" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App Icons -->
    <link rel="shortcut icon" href="{{ asset('themes/user/horizontal-rtl/assets/images/icon.png') }}">

    @if(isset($alertify))
        <!-- Alertify css -->
            <link href="{{ asset('themes/user/plugins/alertify/css/alertify.css') }}" rel="stylesheet" type="text/css">
    @endif
    <!-- App css -->
    <link href="{{ asset('themes/user/horizontal-rtl/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('themes/user/horizontal-rtl/assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('themes/user/horizontal-rtl/assets/css/style.css') }}" rel="stylesheet" type="text/css" />

    @if(isset($editor))
        <!-- Summernote css -->
        <link href="{{ asset('themes/user/plugins/summernote/summernote-bs4.css') }}" rel="stylesheet" />
    @endif
    @if(isset($dropzone))
    <!-- Dropzone css -->
        <link href="{{ asset('themes/user/plugins/dropzone/dist/dropzone.css') }}" rel="stylesheet" type="text/css">
    @endif
    @if(isset($dataTables))
        <!-- DataTables -->
            <link href="{{ asset('themes/user/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('themes/user/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

            <!-- Responsive datatable examples -->
            <link href="{{ asset('themes/user/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    @endif


</head>


<body>

<!-- Loader -->
<div id="preloader">
    <div id="status">
        <div class="spinner">
            <div class="rect1"></div>
            <div class="rect2"></div>
            <div class="rect3"></div>
            <div class="rect4"></div>
            <div class="rect5"></div>
        </div>
    </div>
</div>

<div class="header-bg">
    <!-- Navigation Bar-->
    @include('layouts.user.topnav')
    <!-- End Navigation Bar-->

</div>
<!-- header-bg -->

<div class="wrapper">
    <div class="container-fluid">

        @yield('content')

    </div> <!-- end container-fluid -->
</div>
<!-- end wrapper -->


<!-- Footer -->
<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                رانی شاپ <i class="mdi mdi-heart text-danger"></i> <span class="d-none d-md-inline-block"> کاری از تیم <a
                        href="https://tarahsite.net/">TarahSite.Net</a></span>
            </div>
        </div>
    </div>
</footer>
<!-- End Footer -->


<!-- jQuery  -->
<script src="{{ asset('themes/user/horizontal-rtl/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('themes/user/horizontal-rtl/assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('themes/user/horizontal-rtl/assets/js/modernizr.min.js') }}"></script>
<script src="{{ asset('themes/user/horizontal-rtl/assets/js/waves.js') }}"></script>
<script src="{{ asset('themes/user/horizontal-rtl/assets/js/jquery.slimscroll.js') }}"></script>

<!--Summernote js-->
@if(isset($editor))
    <script src="{{ asset('themes/user/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
    <script src="{{ asset('themes/user/horizontal-rtl/assets/pages/form-advanced.js') }}"></script>
    <script src="{{ asset('themes/user/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script>
        jQuery(document).ready(function(){
            $('#short').summernote({
                lang : 'fa-IR' ,
                height: 300,                 // set editor height
                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor
                focus: true ,                // set focus to editable area after initializing summernote
                name: 'short'
            });
            $('#description').summernote({
                lang : 'fa-IR' ,
                height: 300,                 // set editor height
                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor
                focus: true ,                // set focus to editable area after initializing summernote
                name:'description'
            });
        });
    </script>
@endif

@if(isset($dropzone))
    <!-- Dropzone js -->
    <script src="{{ asset('themes/user/plugins/dropzone/dist/dropzone.js') }}"></script>
@endif
@if(isset($dataTables))
    <!-- Required datatable js -->
    <script src="{{ asset('themes/user/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('themes/user/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Buttons examples -->
    <script src="{{ asset('themes/user/plugins/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('themes/user/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('themes/user/plugins/datatables/jszip.min.js') }}"></script>
    <script src="{{ asset('themes/user/plugins/datatables/pdfmake.min.js') }}"></script>
    <script src="{{ asset('themes/user/plugins/datatables/vfs_fonts.js') }}"></script>
    <script src="{{ asset('themes/user/plugins/datatables/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('themes/user/plugins/datatables/buttons.print.min.js') }}"></script>
    <script src="{{ asset('themes/user/plugins/datatables/buttons.colVis.min.js') }}"></script>
    <!-- Responsive examples -->
    <script src="{{ asset('themes/user/plugins/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('themes/user/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>

    <!-- Datatable init js -->
    <script src="{{ asset('themes/user/horizontal-rtl/assets/pages/datatables.init.js') }}"></script>
@endif

@if(isset($alertify))
    <!-- Alertify js -->
    <script src="{{ asset('themes/user/plugins/alertify/js/alertify.js') }}"></script>
    <script src="{{ asset('themes/user/horizontal-rtl/assets/pages/alertify-init.js') }}"></script>
@endif

@if(isset($XEditable))
    <!-- XEditable Plugin -->
    <script src="{{ asset('themes/user/plugins/moment/moment.js') }}"></script>
    <script src="{{ asset('themes/user/plugins/x-editable/js/bootstrap-editable.min.js') }}"></script>
    <script src="{{ asset('themes/user/horizontal-rtl/assets/pages/xeditable.js') }}"></script>
@endif

<!-- App js -->
<script src="{{ asset('themes/user/horizontal-rtl/assets/js/app.js') }}"></script>


</body>
</html>
