@extends('admin.admin_pengaduan.content')
@section('title') Edit SubProsedur @endsection
@section('breadcrumb') Edit SubProsedur @endsection

@section('content')
<form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('subprosedur.update', ['id'=>$subprosedur->subprosedur_id])}}" method="POST">
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


          <label for="persyaratan">Uraian Sub Prosedur</label>
          <textarea name="subprosedur" id="subprosedur" rows="5" cols="80" class="form-control {{$errors->first('subprosedur') ? "is-invalid" : ""}}">{{ $subprosedur->uraian_subprosedur }}</textarea>
          <div class="invalid-feedback">
              {{$errors->first('subprosedur')}}
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
