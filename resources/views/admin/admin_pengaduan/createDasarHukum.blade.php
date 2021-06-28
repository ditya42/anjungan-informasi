@extends('admin.admin_pengaduan.content')
@section('title') Tambah Dasar Hukum @endsection
@section('breadcrumb') Tambah Dasar Hukum @endsection
@section('content')
  <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('dasarhukum.store')}}" method="POST">
    @csrf
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title"></h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div class="row">
        <div class="col-md-5">
          <div class="form-group">
            <label>Nama Peraturan</label>
            <input value="{{old('name')}}" type="text" style="width: 500px;" class="form-control {{$errors->first('name') ? "is-invalid": ""}}"  name="name" id="name">
            <div class="invalid-feedback">
                {{$errors->first('name')}}
            </div>

            <label for="address">Tentang</label>
            <textarea name="tentang" id="tentang" rows="5" cols="80" class="form-control {{$errors->first('tentang') ? "is-invalid" : ""}}">{{old('tentang')}}</textarea>
            <div class="invalid-feedback">
                {{$errors->first('tentang')}}
            </div>
          </div>
          <!-- /.form-group -->
        </div>
        <!-- /.col -->
        <br><br><br>
      <!-- /.row -->

    </div>
    <div class="box-footer">
      <button type="submit" class="btn btn-primary btn-save"><i class="fa fa-floppy-o"></i> Simpan </button>
      <a href="{{ route('dasarhukum.index') }}" class="btn btn-warning"><i class="fa fa-arrow-circle-left"></i> Batal</a>
    </div>
  </div>
  </form>
@endsection
