<!-- Default Size -->
<div class="modal fade" id="modaldasarhukumpilih" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <form id="form-input-dasarhukumpilih" class="form-horizontal" data-toggle="validator" method="post">
        {{ csrf_field() }} {{ method_field('POST') }}
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="modaldasarhukumpilih-label"></h4>
            </div>
                <div class="modal-body">
                    <input type="hidden" name="layanan_id" id="layanan_id" type="text" value="{{ $layanan->layanan_id }}" field="hidden">
                  <div class="col-md-12">
                      <div class="form-group">

                        <div class="input-group mb-1">
                          <select class="form-control select-hukum" name="dasarhukum" id="dasarhukum">
                          </select>
                        </div><br>

                      </div>
                  </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="dasarhukum_simpan" class="btn btn-success">Simpan</button>
                    <button type="button" id="dasarhukum_loading" class="btn btn-success" disabled="disabled"><i class="fa fa-refresh fa-spin"></i> <span>Loading...</span></button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                </div>
          </div>
        </form>
    </div>
  </div>
