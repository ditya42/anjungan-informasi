@extends('admin.admin_pengaduan.content')
@section('title') Tambah Jabatan @endsection
@section('breadcrumb') Tambah Jabatan @endsection
@section('content')
  <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('jabatan.store')}}" method="POST">
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
            <label>Nama Jabatan</label>
            <input value="{{old('nama_jabatan')}}" type="text" class="form-control {{$errors->first('nama_jabatan') ? "is-invalid": ""}}"
            name="nama_jabatan" id="nama_jabatan">
            <div class="invalid-feedback">
                {{$errors->first('nama_jabatan')}}
            </div>
          </div>
          <!-- /.form-group -->
        </div>
        <!-- /.col -->

      </div>
    </div>
    <div class="box-footer">
      <button type="submit" class="btn btn-primary btn-save"><i class="fa fa-floppy-o"></i> Simpan </button>
      <a href="{{ route('jabatan.index') }}" class="btn btn-warning"><i class="fa fa-arrow-circle-left"></i> Batal</a>
    </div>
  </div>
  </form>
@endsection
