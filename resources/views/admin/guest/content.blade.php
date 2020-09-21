@include('admin.guest.header')
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  @include('admin.guest.main-header')
  @include('admin.guest.menu')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h4>
        Hi, {{ Auth()->user()->name }}
      </h4>
      <ol class="breadcrumb">
        <li><a href="{{ route('index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">@yield('breadcrumb')</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      @yield('content')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@include('admin.guest.footer')
