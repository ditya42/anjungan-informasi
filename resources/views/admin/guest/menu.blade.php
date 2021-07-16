<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <ul class="sidebar-menu" data-widget="tree">

      <li class="treeview">
        <a href="#">
          <i class="fa fa-file-text-o"></i>
          <span>Pengaduan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('pengaduan.index') }}"><i class="fa fa-circle-o"></i> List Pengaduan</a></li>
          <li><a href="{{ route('pengaduan.create') }}"><i class="fa fa-circle-o"></i> Tambah Pengaduan</a></li>

        </ul>

      </li>
      <li><a href="{{ route('index') }}">Kembali ke Halaman Depan</a></li>

    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
