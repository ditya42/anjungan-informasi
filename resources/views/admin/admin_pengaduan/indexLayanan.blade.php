@extends('admin.admin_pengaduan.content')
@section('title') Layanan @endsection
@section('breadcrumb') Layanan @endsection
<!-- Small boxes (Stat box) -->
@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box box-primary">
      <div class="box-header">
        <a href="{{ route('layanan.create') }}" class="btn btn-success"><i class="fa fa-plus-circle"></i> Tambah</a>
      </div>
      <div class="box-body">
        <div class="table-responsive">
          <table class="table table-bordered table-hover" id="data-tables">
          <thead>
            <tr>
                <th width="30"><center>No</center></th>
                <th><center>Nama Layanan</center></th>
                <th><center>Sub Bidang</center></th>
                <th><center>Biaya</center></th>

                <th width="100"><center>Aksi</center></th>
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
        ajax: '{!! route('layanan.data') !!}',

        columnDefs: [
                            {
                                "targets": 2, // your case first column, if all "targets": "_all",
                                "className": "text-center",
                                // "width": "4%"
                            },

                            {
                                "targets": 3, // your case first column, if all "targets": "_all",
                                "className": "text-center",
                                "width": "10%"
                            },
                            {
                                "targets": 4, // your case first column, if all "targets": "_all",
                                "className": "text-center",
                                "width": "30%"
                            },
        ],

        columns : [
          { data: 'DT_RowIndex', orderable: false, searchable: false},
          { data: 'nama_layanan' },
          { data: 'nama_subbidang' },
          { data: 'biaya' },

          { data: 'action', action: 'actions', orderable: false, searchable: false }
        ]
      });
    });

    function deleteData(id) {
      swal({
        title: "Apakah kamu yakin ?",
        text: "Akan menghapus data ini",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            $.ajax({
            url : "layanan/"+id,
            type : "POST",
            data: {
                "_method" : "DELETE",
                "_token": "{{ csrf_token() }}"
            },
            success : function(data){
              swal("Data berhasil dihapus", {
                icon: "success",
              });
              table.ajax.reload();
            },
            error : function() {
              swal("Tidak dapat menghapus data");
            }
          });
        } else {
          swal("Batal di hapus");
        }
      });
    }
  </script>
@endsection
