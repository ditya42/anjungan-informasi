@extends('admin.admin_pengaduan.content')
@section('title') Tambah Prosedur @endsection
@section('breadcrumb') Tambah Prosedur @endsection
@section('content')
  <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('prosedur.store')}}" method="POST">
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

            <label for="persyaratan">Uraian Prosedur</label>
            <textarea name="prosedur" id="prosedur" rows="5" cols="80" class="form-control {{$errors->first('prosedur') ? "is-invalid" : ""}}">{{old('prosedur')}}</textarea>
            <div class="invalid-feedback">
                {{$errors->first('prosedur')}}
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
      <a href="{{ route('prosedur.index',$layanan->layanan_id ) }}" class="btn btn-warning"><i class="fa fa-arrow-circle-left"></i> Batal</a>
    </div>
  </div>
  </form>
@endsection
