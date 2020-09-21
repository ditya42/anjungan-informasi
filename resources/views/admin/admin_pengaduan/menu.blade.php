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
          <li><a href="{{ route('AdminPengaduan.index') }}"><i class="fa fa-circle-o"></i> List Pengaduan</a></li>
          <li><a href="{{ route('AdminPengaduan.create') }}"><i class="fa fa-circle-o"></i> Tambah Pengaduan</a></li>

        </ul>

      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-file-text-o"></i>
          <span>User</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('users.index') }}"><i class="fa fa-circle-o"></i> List User</a></li>
          <li><a href="{{ route('users.create') }}"><i class="fa fa-circle-o"></i> Tambah User</a></li>

        </ul>

        <li class="treeview">
            <a href="#">
              <i class="fa fa-file-text-o"></i>
              <span>Jabatan BKPP</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ route('jabatan.index') }}"><i class="fa fa-circle-o"></i> List Jabatan</a></li>
              <li><a href="{{ route('jabatan.create') }}"><i class="fa fa-circle-o"></i> Tambah Jabatan</a></li>

            </ul>

      </li>
      <li><a href="{{ route('index') }}">Kembali ke Halaman Depan</a></li>

    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
