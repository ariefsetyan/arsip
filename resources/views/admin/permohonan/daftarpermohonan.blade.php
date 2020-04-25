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
                 Page Pengajuan

            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
{{--                <li><a href="#">Examples</a></li>--}}
                <li class="active">Daftar Pengajuan</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Daftar pengajuan</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIP</th>
                                    <th>Nama</th>
                                    <th>Dokumen</th>
                                    <th>Tgl Peinjam</th>
                                    <th>Tgl Kembali</th>
                                    <th>Actoin</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(!empty($datas))
                                    <?php $i=1; ?>
                                @foreach($datas as $data)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$data->nip}}</td>
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->nama_dokumen}}</td>
                                    <td>{{$data->tgl_pinjam}}</td>
                                    <td>{{$data->tgl_kembali}}</td>
                                    <td>

                                        <button type="button" data-toggle="modal" data-target="#exampleModal" 
                                        data-id="{{$data->id}}"
                                        data-nip="{{$data->nip}}"
                                        data-name="{{$data->name}}"
                                        data-nama_dokumen="{{$data->nama_dokumen}}"
                                        data-diskripsi="{{$data->diskripsi}}"
                                        data-tgl_pinjam="{{$data->tgl_pinjam}}"
                                        data-tgl_kembali="{{$data->tgl_kembali}}"
                                        >Proses</button>

                                        
                                    </td>
                                </tr>
                                    <?php $i++; ?>
                                @endforeach
                                    @else
                                
                                @endif


                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>NIP</th>
                                    <th>Nama</th>
                                    <th>Dokumen</th>
                                    <th>Tools</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
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
              <h4 id="exampleModalLabel">Info Data Peminjaman</h4>
            </div>
            <div class="modal-body">
              
              <div class="box-body">
                
                    <table class="">

                        <tr>
                            <td>
                                <p>NIP </p>
                            </td>
                            <td>
                                <p>:    </p>
                            </td>
                            <td>
                                <p class="modal-nip"></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Nama Nama Karyawan </p>
                            </td>
                            <td>
                                <p >:    </p>
                            </td>
                            <td>
                                <p class="modal-name"></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Nama Dokumen </p>
                            </td>
                            <td>
                                <p>:    </p>
                            </td>
                            <td>
                                <p class="modal-nama_dokumen"></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Tanggal Pinjam </p>
                            </td>
                            <td>
                                <p>:    </p>
                            </td>
                            <td>
                                <p class="modal-tgl_pinjam"></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Tanggal Kembali </p>
                            </td>
                            <td>
                                <p>:    </p>
                            </td>
                            <td>
                                <p class="modal-tgl_kembali"></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Deskripsi </p>
                            </td>
                            <td>
                                <p>:    </p>
                            </td>
                            <td>
                                <p class="modal-diskripsi"></p>
                            </td>
                        </tr>

                    </table>
                
            </div>
            </div>
            <div class="modal-footer">
            <form action="{{url('admin/tolak')}}" method="POST">
                {{ csrf_field() }}
                    <input type="text" hidden id="id" name="id">
                   <button type="submit" class="btn btn-default pull-left" >Tolak</button></a>
                </form>
            <form action="{{url('admin/terima')}}" method="POST">
                {{ csrf_field() }}
                    <input type="text" hidden id="id" name="id">
                    <button type="submit" class="btn btn-primary pull-right">terima</button></a>
                </form>
            </div>
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
<script>
    $(document).ready(function () {
        $('.sidebar-menu').tree()
    })
</script>
<!-- page script -->
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
  var id = button.data('id') // Extract info from data-* attributes
  var nip = button.data('nip') // Extract info from data-* attributes
  var name = button.data('name') // Extract info from data-* attributes
  var nama_dokumen = button.data('nama_dokumen') // Extract info from data-* attributes
  var tgl_pinjam = button.data('tgl_pinjam') // Extract info from data-* attributes
  var tgl_kembali = button.data('tgl_kembali') // Extract info from data-* attributes
  var diskripsi = button.data('diskripsi') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
//   modal.find('.modal-title').text('New message to ' + recipient)
//   modal.find('.modal-body input').val(recipient)
console.log(id)
    modal.find('.modal-footer #id').val(id)
    modal.find('.modal-nip').text(nip)
    modal.find('.modal-name').text(name)
    modal.find('.modal-nama_dokumen').text(nama_dokumen)
    modal.find('.modal-tgl_pinjam').text(tgl_pinjam)
    modal.find('.modal-tgl_kembali').text(tgl_kembali)
    modal.find('.modal-diskripsi').text(diskripsi)
    
})
</script>
</body>
</html>
