<aside class="main-sidebar">

    <section class="sidebar">

        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            
            <li>
            <a href="{{url('admin/cari-dokumen')}}">
                    <i class="fa fa-th"></i> <span>Cari Dokumen</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Penyimpanan</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('admin/form-penyimpanan')}}"><i class="fa fa-circle-o"></i> Form Penyimpanan</a></li>
                    <li><a href="{{url('admin/daftar-dokumen')}}"><i class="fa fa-circle-o"></i> Daftar Dokumen</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>Peminjaman</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{'form-peminjaman'}}"><i class="fa fa-circle-o"></i> Form Peminjaman</a></li>
                    <li><a href="{{'daftar-peminjaman'}}"><i class="fa fa-circle-o"></i> Daftar Peminjaman</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Pengembalian</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('admin/pengembalian')}}"><i class="fa fa-circle-o"></i> Pengembaliam</a></li>
                    <li><a href="{{url('admin/daftar')}}"><i class="fa fa-circle-o"></i> Daftar pengembalian</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-table"></i> <span>Pemusnahan</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('admin/retensi')}}"><i class="fa fa-circle-o"></i> daftar Dokumen</a></li>
                    <li><a href="{{url('admin/daftar-arsip')}}"><i class="fa fa-circle-o"></i> Daftar Arsip</a></li>
                </ul>
            </li>

        </ul>
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">DATA MASTER</li>

            <li>
            <a href="{{url('admin/karyawan')}}">
                    <i class="fa fa-th"></i> <span>Karyawan</span>
                </a>
            </li>

            <li>
                <a href="{{url('admin/lokasi')}}">
                    <i class="fa fa-th"></i> <span>Lokasi Simpan</span>
                </a>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Jenis Dokumen</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('admin/pokok-persolanan')}}"><i class="fa fa-circle-o"></i> Pokok Persoalan</a></li>
                    <li><a href="{{url('admin/anak-persoalan')}}"><i class="fa fa-circle-o"></i> Anak Pokok Persoalan</a></li>
                    <li><a href="{{url('admin/perihal')}}"><i class="fa fa-circle-o"></i> Perihal</a></li>
                </ul>
            </li>

            <li>
                <a href="{{url('admin/jra')}}">
                    <i class="fa fa-th"></i> <span>JRA</span>
                </a>
            </li>

            <li>
            <a href="{{url('admin/manajemen')}}">
                    <i class="fa fa-th"></i> <span>Manajemen Data Master</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
