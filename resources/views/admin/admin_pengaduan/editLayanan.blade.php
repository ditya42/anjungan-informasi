@extends('admin.admin_pengaduan.content')
@section('title') Edit Layanan @endsection
@section('breadcrumb') Edit Layanan @endsection

@section('content')
<form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('layanan.update', ['id'=>$layanan->layanan_id])}}" method="POST">
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
          <label>Nama Layanan</label>
          <input value="{{ $layanan->nama_layanan }}" type="text" style="width: 500px;" class="form-control {{$errors->first('name') ? "is-invalid": ""}}"  name="name" id="name">
          <div class="invalid-feedback">
              {{$errors->first('name')}}
          </div>

          <label for="address">Biaya</label>
          <textarea name="biaya" id="biaya" rows="5" cols="80" class="form-control {{$errors->first('biaya') ? "is-invalid" : ""}}">{{ $layanan->biaya }}</textarea>
          <div class="invalid-feedback">
              {{$errors->first('biaya')}}
          </div>


          <br>
            <div>

                <label for="subbidang">Subbidang</label>
            <select name="subbidang">

                    @foreach($subbidang as $r)
                        @if ($r->subbidang_id == $layanan->subbidang_id)
                            <option selected value="{{ $r->subbidang_id }}">{{ $r->nama_subbidang }}</option>
                        @else
                            <option value="{{ $r->subbidang_id }}">{{ $r->nama_subbidang }}</option>
                        @endif

                    @endforeach
            </select>
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
    <a href="{{ route('layanan.index') }}" class="btn btn-warning"><i class="fa fa-arrow-circle-left"></i> Batal</a>
  </div>
</div>
</form>
<!-- /.box -->
@endsection
