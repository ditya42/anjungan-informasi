@extends('admin.guest.content')
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

@section('title') Tambah @endsection
@section('breadcrumb') Tambah @endsection
@section('content')

<h2>TAMBAHKAN PENGADUAN</h2>
<form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('pengaduan.store')}}" method="POST">
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
        <div class="col-md-4">
          <div class="form-group">
            <label>Nama Terlapor</label>
            <input value="{{old('nama')}}" type="text" class="form-control {{$errors->first('nama') ? "is-invalid": ""}}"  name="nama" id="nama">
            <p>*Optional jika mengetahui nama yang dilaporkan</p>
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

                    <option value="{{ $jab->id }}" {{ ($jab->nama_jabatan == "tidak tahu") ? 'selected' : '' }}>
                        {{ $jab->nama_jabatan }}
                    </option>

                @endforeach

              </select>


            <p>*Optional jika mengetahui jabatan orang yang dilaporkan</p>
            <div class="invalid-feedback">
                {{$errors->first('jabatan')}}
            </div>
          </div>
        </div>

        {{-- <div class="col-md-2">
          <div class="form-group">
            <label>Status</label>
            <select name="status" id="status" class="form-control">
              <option>Publish</option>
              <option>Draft</option>
            </select>
          </div>
        </div> --}}

        <div class="col-md-12">
          <div class="form-group">
            <label>Perbuatan/Tindakan yang dilaporkan</label>
            <textarea name="perbuatan" id="perbuatan" rows="4" cols="10" class="form-control">
              {{ old('perbuatan') }}
            </textarea>
          </div>
          <div class="invalid-feedback">
            {{$errors->first('perbuatan')}}
          </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
              <label>Perkara yang berkaitan dengan Pengaduan (Optional)</label>
              <textarea name="perkara" id="perkara" rows="4" cols="10" class="form-control">
                {{ old('perkara') }}
              </textarea>
            </div>
            <div class="invalid-feedback">
              {{$errors->first('perkara')}}
            </div>
          </div>

        <div class="col-md-4">
            <div class="form-group">
              <label>Bukti Laporan (Harus Diisi)</label>
              <input name="file_upload" id="file_upload" data-height="100" type="file" class="dropify" data-default-file="url_of_your_file"/>
              <p>*Optional, dapat berupa pdf, rar, jpg atau mp4 (max 25 mb)</p>
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
      <a href="{{ route('pengaduan.index') }}" class="btn btn-warning"><i class="fa fa-arrow-circle-left"></i> Batal</a>
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
@endsection
