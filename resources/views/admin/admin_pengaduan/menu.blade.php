<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <ul class="sidebar-menu" data-widget="tree">



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


            <a href="#">
              <i class="fa fa-file-text-o"></i>
              <span>Sub Bidang</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ route('subbidang.index') }}"><i class="fa fa-circle-o"></i> List Sub Bidang</a></li>
              <li><a href="{{ route('subbidang.create') }}"><i class="fa fa-circle-o"></i> Tambah Sub Bidang</a></li>

            </ul>


            <a href="#">
                <i class="fa fa-file-text-o"></i>
                <span>Dasar Hukum</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ route('dasarhukum.index') }}"><i class="fa fa-circle-o"></i> List Dasar Hukum</a></li>
                <li><a href="{{ route('dasarhukum.create') }}"><i class="fa fa-circle-o"></i> Tambah Dasar Hukum</a></li>

              </ul>

              <a href="#">
                <i class="fa fa-file-text-o"></i>
                <span>Layanan</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ route('layanan.index') }}"><i class="fa fa-circle-o"></i> List Layanan</a></li>
                <li><a href="{{ route('layanan.create') }}"><i class="fa fa-circle-o"></i> Tambah Layanan</a></li>

              </ul>


        </li>

      <li><a href="{{ route('index') }}">Kembali ke Halaman Depan</a></li>

    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
