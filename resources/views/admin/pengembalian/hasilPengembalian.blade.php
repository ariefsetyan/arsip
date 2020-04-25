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
                Page Pengamblian
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Examples</a></li>
                <li class="active">Blank page</li>
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
                            <h3 class="box-title">Cari Karyawan</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="{{url('cari-pengembalian')}}">
                            <div class="box-body">
                                <div class="form-group">
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control" name="cari">
                                        <span class="input-group-btn">
                                          <button type="submit" class="btn btn-info btn-flat">Cari</button>
                                        </span>
                                    </div>
                                </div>

                            </div>

                            <!-- /.box-body -->

                        </form>
                    </div>
                </div>

            </div>

            <!-- /.box -->

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Data Peminjaman</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Dokumen</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>tools</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($peminjaman as $data)
                        <tr>
                            <td>{{$data->nip}}</td>
                            <td>{{$data->name}}</td>
                            <td>{{$data->nama_dokumen}}</td>
                            <td>{{$data->tgl_pinjam}}</td>
                            <td>{{$data->tgl_kembali}}</td>
                            <td>
                                <button type="button" data-toggle="modal" data-target="#exampleModal" 
                                data-nip="{{$data->nip}}"
                                data-name="{{$data->name}}"
                                data-nama_dokumen="{{$data->nama_dokumen}}"
                                data-diskripsi="{{$data->diskripsi}}"
                                data-gedung="{{$data->gedung}}"
                                data-rak="{{$data->baris}}"
                                data-baris="{{$data->baris}}"
                                data-bok="{{$data->bok}}"
                                data-folder="{{$data->folder}}"
                                
                                >kembali</button>
                                
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Dokumen</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>tools</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <!-- modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="exampleModalLabel">New </h4>
            </div>
        <form role="form" action="{{url('admin/kembali')}}" method="post">
            {{ csrf_field() }}
            <div class="modal-body">
                
                    <input type="text" hidden value="{{$data->id}}" name="id">
                
              <table class="table table-bordered">
                
                <tbody>
                  <tr>
                    <td>NIP: </td>
                    <td class="modal-nip"></td>
                  </tr>
                  <tr>
                    <td>Nama</td>
                    <td class="modal-name"></td>
                  </tr>
                  <tr>
                    <td>Dokumen</td>
                    <td class="modal-nama_dokumen"></td>                    
                  </tr>
                  <tr>
                    <td>Deskripsi</td>
                    <td class="modal-diskripsi"></td>                    
                  </tr>
                  <tr>
                    <td>Gedung</td>
                    <td class="modal-gedung"></td>                    
                  </tr>
                  <tr>
                    <td>Rak</td>
                    <td class="modal-rak"></td>                    
                  </tr>
                  <tr>
                    <td>Baris</td>
                    <td class="modal-baris"></td>            
                  </tr>
                  <tr>
                    <td>Bok</td>
                    <td class="modal-bok"></td>
                  </tr>
                  <tr>
                    <td>folder</td>
                    <td class="modal-folder"></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default  pull-left" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary pull-right">Kembali</button>
            </div>
        </form>
          </div>
        </div>
      </div>
    <!-- /modal -->

@include('admin.master.footer')


    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

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
<script>
    $('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var nip = button.data('nip') // Extract info from data-* attributes
  var name = button.data('name') // Extract info from data-* attributes
  var nama_dokumen = button.data('nama_dokumen') // Extract info from data-* attributes
  var diskripsi = button.data('diskripsi') // Extract info from data-* attributes
  var gedung = button.data('gedung') // Extract info from data-* attributes
  var rak = button.data('rak') // Extract info from data-* attributes
  var baris = button.data('baris') // Extract info from data-* attributes
  var bok = button.data('bok') // Extract info from data-* attributes
  var folder = button.data('folder') // Extract info from data-* attributes
  
  var modal = $(this)

  modal.find('.modal-nip').text(nip)
  modal.find('.modal-name').text(name)
  modal.find('.modal-nama_dokumen').text(nama_dokumen)
  modal.find('.modal-gedung').text(gedung)
  modal.find('.modal-rak').text(rak)
  modal.find('.modal-baris').text(baris)
  modal.find('.modal-bok').text(bok)
  modal.find('.modal-folder').text(folder)
  modal.find('.modal-diskripsi').text(diskripsi)
})
</script>
</body>
</html>