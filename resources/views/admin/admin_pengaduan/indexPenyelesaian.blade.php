@extends('admin.admin_pengaduan.content')
@section('title') Waktu Penyelesaian Layanan @endsection
@section('breadcrumb') Waktu Penyelesaian Layanan @endsection
<!-- Small boxes (Stat box) -->
@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box box-primary">
      <div class="box-header">
        <a href="{{ route('layanan.index') }}" class="btn btn-warning"><i class="fa fa-arrow-circle-left"></i> Kembali ke Layanan</a>
        <a href="{{ route('penyelesaian.create' , $layanan->layanan_id) }}" class="btn btn-success"><i class="fa fa-plus-circle"></i> Tambah</a>

      </div>

      <input type="hidden" id="layanan_id" type="text" value="{{ $layanan->layanan_id }}" field="hidden">

      <div class="box-body">
        <div class="table-responsive">
          <table class="table table-bordered table-hover" id="data-tables">
          <thead>
            <tr>
                <th width="30"><center>No</center></th>
                <th><center>Waktu Penyelesaian</center></th>


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
      idlayanan = jQuery('#layanan_id').val();
      table = $('#data-tables').DataTable({


        processing: true,
        serverSide: true,
        ajax:{
                "url": '{!! route('penyelesaian.data') !!}',
                "data": {
                            "id": idlayanan
                        },
        },



        columns : [
          { data: 'DT_RowIndex', orderable: false, searchable: false},
          { data: 'uraian_penyelesaian' },


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
            url : id,
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
