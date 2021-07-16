@extends('admin.admin_pengaduan.content')
@section('title') Tambah Persyaratan @endsection
@section('breadcrumb') Tambah Persyaratan @endsection
@section('content')
  <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('persyaratan.store')}}" method="POST">
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

            <input type="hidden" name="layanan_id" id="layanan_id" type="text" value="{{ $layanan->layanan_id }}" field="hidden">

            <label for="persyaratan">Uraian Persyaratan</label>
            <textarea name="persyaratan" id="persyaratan" rows="5" cols="80" class="form-control {{$errors->first('persyaratan') ? "is-invalid" : ""}}">{{old('persyaratan')}}</textarea>
            <div class="invalid-feedback">
                {{$errors->first('persyaratan')}}
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
      <a href="{{ route('persyaratan.index',$layanan->layanan_id ) }}" class="btn btn-warning"><i class="fa fa-arrow-circle-left"></i> Batal</a>
    </div>
  </div>
  </form>
@endsection
