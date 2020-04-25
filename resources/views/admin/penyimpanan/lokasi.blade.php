
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Blank Page</title>

<!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{url('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{url('bower_components/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{url('bower_components/Ionicons/css/ionicons.min.css')}}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{url('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{url('bower_components/select2/dist/css/select2.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url('dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{url('dist/css/skins/_all-skins.min.css')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style>
        .return-link {
        padding: 20px;
        text-align: center;
}
    </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

@include('admin.master.navbar')

@include('admin.master.menu')

<!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Page Lokasi
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{url('penyimpanan')}}">Page Simpan Dokumen </a></li>
                <li class="active">Page view Pegawai</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="row">

                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <div class="row">
                                <div class="col-md-4">
                                </div>
                                <div class="col-md-8"><h3 class="box-title center">Lokasi Simpan Dokumen</h3></div>

                            </div>

                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <div class="box-body">
                            @foreach($lokasis as $lokasi)
                            <table class="">

                                    {{-- <tr>
                                        <td>
                                            <p>Kode Dokumen </p>
                                        </td>
                                        <td>
                                            <p>:    </p>
                                        </td>
                                        <td>
                                            <p>{{$lokasi->kode_jenis}}</p>
                                        </td>
                                    </tr> --}}
                                    <tr>
                                        <td>
                                            <p>Gedung </p>
                                        </td>
                                        <td>
                                            <p>:    </p>
                                        </td>
                                        <td>
                                            <p>{{$lokasi->gedung}}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Rak </p>
                                        </td>
                                        <td>
                                            <p>:    </p>
                                        </td>
                                        <td>
                                            <p>{{$lokasi->rak}}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Baris </p>
                                        </td>
                                        <td>
                                            <p>:    </p>
                                        </td>
                                        <td>
                                            <p>{{$lokasi->baris}}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Boks </p>
                                        </td>
                                        <td>
                                            <p>:    </p>
                                        </td>
                                        <td>
                                            <p>{{$lokasi->bok}}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Folder </p>
                                        </td>
                                        <td>
                                            <p>:    </p>
                                        </td>
                                        <td>
                                            <p>{{$lokasi->folder}}</p>
                                        </td>
                                    </tr>

                            </table>
                            @endforeach
                        </div>
                        <div class="box-footer">
                        </div>
                    </div>
                </div>

                <div class="return-link">
                <a href="{{url('admin/form-penyimpanan')}}">
                        <span class="glyphicon glyphicon-circle-arrow-left"></span>
                        Go Back
                        </a>
                </div>

            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@include('admin.master.footer')


    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
@include('sweetalert::alert')

<!-- jQuery 3 -->
<script src="{{url('bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{url('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- DataTables -->
<script src="{{url('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{url('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<!-- SlimScroll -->
<script src="{{url('bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{url('bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{url('dist/js/demo.js')}}"></script>
<!-- page script -->

<script>
    $(document).ready(function () {
        $('.sidebar-menu').tree()
    })
</script>
<script>
    $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        })
    })
</script>

</body>
</html>