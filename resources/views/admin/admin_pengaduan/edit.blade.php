@extends('admin.admin_pengaduan.content')
@push('styles')
  <link rel="stylesheet" href="{{asset('vendor/laraberg/css/laraberg.css')}}">
  <link rel="stylesheet" href="{{ asset('css/dropify.css') }}">
  <link rel="stylesheet" href="{{ asset('fonts/dropify.woff') }}">
  <link rel="stylesheet" href="{{ asset('fonts/dropify.ttf') }}">
  <style>
      body {
          height: auto !important;
          overflow-y: scroll !important;
      }
      /* for mobile */
      #laraberg__editor {
          height: 60vh !important;
      }
      /* for desktop */
      @media only screen and (min-width: 768px) {
          #laraberg__editor {
              height: auto !important;
          }
      }
      .input-category .list-checkbox {
          max-height: 200px;
          overflow: scroll;
      }
  </style>
@endpush

@section('title') Edit Pengaduan @endsection
@section('breadcrumb') Edit Pengaduan @endsection
@section('content')

<h2>EDIT PENGADUAN</h2>
<form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('AdminPengaduan.update', ['id' => $data->id])}}" method="POST">
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
        <div class="col-md-4">
          <div class="form-group">
            <label>Nama Terlapor</label>


            <input value="{{ $data->nama_terlapor }}" type="text" class="form-control {{$errors->first('nama') ? "is-invalid": ""}}"  name="nama" id="nama">
            <div class="invalid-feedback">
                {{$errors->first('nama')}}
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label>Jabatan Terlapor</label><br>
            <select name="jabatan" id="jabatan">
                @foreach($jabatan as $jab)

                    <option value="{{ $jab->id }}" {{ ($jab->id == $data->jabatan_id) ? 'selected' : '' }}>
                        {{ $jab->nama_jabatan }}
                    </option>

                @endforeach

              </select>
            <div class="invalid-feedback">
                {{$errors->first('jabatan')}}
            </div>
          </div>
        </div>

        {{-- <div class="col-md-2">
          <div class="form-group">
            <label>Status</label>
            <select name="status" id="status" class="form-control">
              <option value="Publish" {{ $data->status=='Publish' ? 'selected' : '' }}>Publish</option>
              <option value="Draft"   {{ $data->status=='Draft' ? 'selected' : '' }}>Draft</option>
            </select>
          </div>
        </div> --}}

        <div class="col-md-12">
          <div class="form-group">
            <label>Perbuatan/Tindakan yang dilaporkan</label>
            <textarea name="perbuatan" id="perbuatan" rows="4" cols="10" class="form-control">{{ $data->perbuatan }}</textarea>
          </div>
          <div class="invalid-feedback">
            {{$errors->first('perbuatan')}}
          </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
              <label>Perkara yang berkaitan dengan Pengaduan (Optional)</label>
              <textarea name="perkara" id="perkara" rows="4" cols="10" class="form-control">{{ $data->perkara }}</textarea>
            </div>
            <div class="invalid-feedback">
              {{$errors->first('perkara')}}
            </div>
          </div>

          <div class="col-md-12">
            <div class="form-group">
              <label>Tanggapan dari BKPP Tabalong</label>
              <textarea name="tanggapan" id="tanggapan" rows="4" cols="10" class="form-control">{{ $data->tanggapan }}</textarea>
            </div>
            <div class="invalid-feedback">
              {{$errors->first('tanggapan')}}
            </div>
          </div>

        {{-- <div class="col-md-4">
          <div class="form-group">
            <label>Category</label>
            <select multiple class="form-control categories" name="categories[]" id="categories">
              @foreach ($categories as $list)
                  <option value="{{ $list->id }}">{{ $list->name }}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="col-md-4">
          <div class="form-group">
            <label>Tags</label>
            <select multiple class="form-control" name="tags[]" id="tags">
              @foreach ($tags as $list)
                  <option value="{{ $list->id }}">{{ $list->name }}</option>
              @endforeach
            </select>
          </div>
        </div> --}}

        {{-- <div class="col-md-4">
          <div class="form-group">
            <label>Detail Image</label>
            <input name="featured_image" id="featured_image" data-height="100" type="file" class="dropify" data-default-file="url_of_your_file"/>
            <div class="invalid-feedback">
              {{$errors->first('featured_image')}}
            </div>
          </div>
        </div> --}}

        <div class="col-md-4">
            <div class="form-group">
              <label>Ganti/Upload Ulang Bukti Laporan</label>
              <input name="file_upload" id="file_upload" data-height="100" type="file" class="dropify" data-default-file="url_of_your_file"/>
              <div class="invalid-feedback">
                {{$errors->first('file_upload')}}
              </div>
            </div>
          </div>
        <!-- /.col -->
      </div>
    </div>
    <div class="box-footer">
      <button type="submit" class="btn btn-primary btn-save"><i class="fa fa-floppy-o"></i> Simpan </button>
      <a href="{{ route('AdminPengaduan.index') }}" class="btn btn-warning"><i class="fa fa-arrow-circle-left"></i> Batal</a>
    </div>
  </div>
  </form>
@endsection

@section('script')
<script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('js/dropify.js') }}"></script>

<script>
  $('.dropify').dropify({
    messages: {
        'default': 'Drag and drop a file here or click',
        'replace': 'Drag and drop or click to replace',
        'remove':  'Remove',
        'error':   'Ooops, something wrong happended.'
    }
});
</script>

<script>
  var options = {
    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
  };
</script>

<script>
  CKEDITOR.replace( 'editor', options );
</script>

{{-- <script>
  var categories = {!! $data->categories !!}

  $.each(categories, function(i,e){
      $("#categories option[value='" + e.id + "']").prop("selected", true);
  });

  var tags = {!! $data->tags !!}

  $.each(tags, function(i,e){
      $("#tags option[value='" + e.id + "']").prop("selected", true);
  });

</script> --}}
@endsection
