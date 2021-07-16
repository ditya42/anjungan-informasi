@extends('admin.admin_pengaduan.content')
@section('title') Dasar Hukum Layanan @endsection
@section('breadcrumb') Dasar Hukum Layanan @endsection
<!-- Small boxes (Stat box) -->
@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box box-primary">
      <div class="box-header">
        <a href="{{ route('layanan.index') }}" class="btn btn-warning"><i class="fa fa-arrow-circle-left"></i> Kembali ke Layanan</a>
        <a onclick="addformpilih()" class="btn btn-success"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Dasar Hukum</button></a>

      </div>



      <div class="box-body">
        <div class="table-responsive">
          <table class="table table-bordered table-hover" id="data-tables">
          <thead>
            <tr>
                <th width="30"><center>No</center></th>
                <th><center>Dasar Hukum</center></th>
                <th><center>Tentang</center></th>

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

{{-- modal --}}
@include('admin.admin_pengaduan.modal.modal_dasarhukumpilih')

@endsection

@section('script')


<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>



  <script>





    $(function() {
      idlayanan = jQuery('#layanan_id').val();
      table = $('#data-tables').DataTable({


        processing: true,
        serverSide: true,
        ajax:{
                "url": '{!! route('dasarlayanan.data') !!}',
                "data": {
                            "id": idlayanan
                        },
        },



        columns : [
          { data: 'DT_RowIndex', orderable: false, searchable: false},
          { data: 'nama_peraturan' },
          { data: 'tentang' },

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

    function addformpilih() {
            save_method = "add";
            $('input[name=_method]').val('POST');
            $('#modaldasarhukumpilih form')[0].reset();

            $('#modaldasarhukumpilih').modal('show');
            $('.title').text('Pilih Dasar Hukum');

            $('#dasarhukum_simpan').show();
            $('#dasarhukum_loading').hide();
        }


        $(function() {
          $('#modaldasarhukumpilih form').on('submit', function(e) {
              if(!e.isDefaultPrevented()) {
                  $('#dasarhukum_simpan').hide();
                  $('#dasarhukum_loading').show();
                  var id = $('#layanan_id').val();
                  if(save_method == "add") url = "{{ route('dasarlayanan.store') }}";
                  else url = "layanan/"+id;

                  $.ajax({
                  url : url,
                  type : "POST",
                  data : $('#modaldasarhukumpilih form').serialize(),
                  success : function(data){
                      if(data.code === 400) {
                          toastr.error('Error', data.status);
                          $('#modaldasarhukumpilih').modal('hide');

                      }

                      if(data.code === 200) {
                          $('#modaldasarhukumpilih').modal('hide');
                              toastr.success('Sukses', data.status, {
                              onHidden: function () {
                                  table.ajax.reload();
                              }
                          })

                      }
                  },
                  error : function(){
                      toastr.error('Gagal', 'Mohon Maaf Terjadi Kesalahan Pada Server');
                      $('#modaldasarhukumpilih').modal('hide');

                  }
                  });
                  return false;
              }
          });
        });



        $(function() {
    $('.select-hukum').select2({
        allowClear: false,
        placeholder: 'Masukkan Nama Peraturan',
        minimumInputLength : 4,
        ajax: {
          url: '{{ route('dasarlayanan.apihukum') }}',
          dataType: 'json',
          delay: 250,
          processResults: function (data) {
            return {
              results:  $.map(data, function (item) {
                    return {
                        text: item.nama_peraturan,
                        id: item.dasarhukum_id,
                    }
                })
            };
          },
          cache: true
        },
        templateSelection: function (selection) {
              var result = selection.text.split('/');
            return result[0];
        }
    });

});

  </script>
@endsection
