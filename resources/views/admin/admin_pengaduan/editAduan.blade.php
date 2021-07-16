@extends('admin.admin_pengaduan.content')
@section('title') Edit Pengelolaan Aduan @endsection
@section('breadcrumb') Edit Pengelolaan Aduan @endsection

@section('content')
<form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('aduan.update', ['id'=>$aduan->pengelolaan_aduan_id])}}" method="POST">
  @csrf
  <input type="hidden" value="PUT" name="_method">
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


          <label for="persyaratan">Uraian Pengelolaan Aduan</label>
          <textarea name="aduan" id="aduan" rows="5" cols="80" class="form-control {{$errors->first('aduan') ? "is-invalid" : ""}}">{{ $aduan->uraian_pengelolaan_aduan }}</textarea>
          <div class="invalid-feedback">
              {{$errors->first('aduan')}}
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
    <a href="{{ url()->previous() }}" class="btn btn-warning"><i class="fa fa-arrow-circle-left"></i> Batal</a>
  </div>
</div>
</form>
<!-- /.box -->
@endsection
