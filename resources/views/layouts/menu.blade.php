<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <ul class="sidebar-menu" data-widget="tree">
      <li><a href="{{ route('home') }}"><i class="fa fa-home text-aqua"></i> <span>Dashboard</span></a></li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-file-text-o"></i>
          <span>Post</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('post.index') }}"><i class="fa fa-circle-o"></i> Post</a></li>
          <li><a href="{{ route('category.index') }}"><i class="fa fa-circle-o"></i> Category</a></li>
          <li><a href="{{ route('tag.index') }}"><i class="fa fa-tags"></i> Tag</a></li>
          <li><a href="{{ route('page.index') }}"><i class="fa fa-newspaper-o"></i> Page</a></li>
        </ul>
      </li>
      <li><a href="{{ route('menu') }}"><i class="fa fa-bars"></i> <span>Menu</span></a></li>
      <li><a href="{{ route('users.index') }}"><i class="fa fa-users"></i> <span>Users</span></a></li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>