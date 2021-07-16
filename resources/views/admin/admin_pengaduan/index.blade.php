@extends('admin.admin_pengaduan.content')
@section('title') Pengaduan @endsection
@section('breadcrumb') Pengaduan @endsection
<!-- Small boxes (Stat box) -->
@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box box-primary">
      <div class="box-header">
        <a href="{{ route('AdminPengaduan.create') }}" class="btn btn-success"><i class="fa fa-plus-circle"></i> Tambah</a>
      </div>
      <div class="box-body">
        <div class="table-responsive">
          <table class="table table-bordered table-hover" id="data-tables">
          <thead>
            <tr>
                <th width="20"><center>No</center></th>
                <th width="140"><center>Nama Terlapor</center></th>
                <th width="80"><center>Jabatan Terlapor</center></th>
                <th width="140"><center>Perbuatan</center></th>
                <th width="140"><center>Pelapor</center></th>
                <th width="80"><center>Tanggal</center></th>
                <th width="120"><center>file</center></th>

                <th width="40"><center>ditanggapi</center></th>
                <th width="120"><center>Aksi</center></th>
            </tr>
          </thead>
          <tbody>

          </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>
</div>
<!-- /.row -->
@endsection

@section('script')
  <script>
    $(function() {
      table = $('#data-tables').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('AdminPengaduan.data') !!}',
        columns : [
          { data: 'DT_RowIndex', orderable: false, searchable: false },

          { data: 'nama_terlapor'},
          { data: 'jabatan.nama_jabatan' },
          { data: 'perbuatan' },
          { data: 'user.name'},
          { data: 'created_at'},
          { data: 'file', action: 'actions', orderable: false, searchable: false },

          { data: 'status' },
          { data: 'action', action: 'actions', orderable: false, searchable: false }
        ]
      });
    });



  </script>
@endsection
