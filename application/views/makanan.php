

    <div class="push large"></div>

    <div class="container">
      <form>
        <div class="form-group row">
          <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Nama</label>
          <div class="col-sm-10">
          <input type="text" class="form-control form-control-sm" id="nama" placeholder="Enter Nama">
          </div>
        </div>
        <div class="form-group row">
          <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Harga</label>
          <div class="col-sm-10">
          <input type="text" class="form-control form-control-sm" id="harga" placeholder="Enter Harga">
          </div>
        </div>
        <div class="form-group row">
          <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Status</label>
          <div class="col-sm-10">
          <select class="form-control" id="status">
              <option value="0">Tersedia</option>
              <option value="1">Kosong</option>
          </select>  
          </div>
        </div>
        <div class="form-group row">
          <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Kategori</label>
          <div class="col-sm-10">
            <select class="form-control" id="kategori">
              <option value="0">Makanan</option>
              <option value="1">Minuman</option>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-10 offset-sm-2">
          <button id="btn-save" type="submit" class="btn btn-primary">Submit</button>
          <button id="btn-save" type="reset" class="btn btn-primary">Reset</button>
          </div>
        </div>
      </form>
    </div>

    <div class="push large"></div>
    <div class="container">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nama Makanan</th>
            <th scope="col">Harga</th>
            <th scope="col">Status</th>
            <th scope="col">Kategori</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody id="show_data">
        </tbody>
      </table>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="modalEdit">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group row">
              <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Nama</label>
              <div class="col-sm-10">
              <input type="text" class="form-control form-control-sm" id="edit-nama" placeholder="Enter Nama">
              </div>
            </div>
            <div class="form-group row">
              <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Harga</label>
              <div class="col-sm-10">
              <input type="text" class="form-control form-control-sm" id="edit-harga" placeholder="Enter Harga">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <input type="hidden" name="id" id="edit-id">
            <button type="button" class="btn btn-primary" id="btn-edit-save">Save changes</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>


    <div class="modal fade" tabindex="-1" role="dialog" id="modalDelete">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Delete Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <p>Are you sure want to delete this record?</p>
          </div>
          <div class="modal-footer">
            <input type="hidden" name="id" id="delete-id">
            <button type="button" class="btn btn-primary" id="btn-delete">Delete</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.2.1.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        show_subs();

        // lihat subscriber
        function show_subs() {
          $.ajax({
            type : "AJAX",
            url : "<?php echo site_url('data/makanan_list'); ?>",
            dataType : "JSON",
            success : function(data) {
              var html = '';
              var i;
              for(i=0; i<data.length; i++) {
                if(data[i].id_kategori == 1){
                  data[i].id_kategori = 'Minuman';
                }else{
                  data[i].id_kategori = 'Makanan';
                }
                if(data[i].status == 1){
                  data[i].status = 'Tersedia';
                }else{
                  data[i].status = 'Kosong';
                }
                html += '<tr>' +
                        '<td>' + (i+1) + '</td>' +
                        '<td>' + data[i].nama + '</td>' +
                        '<td>' + data[i].hrg + '</td>' +
                        '<td>' + data[i].status + '</td>' +
                        '<td>' + data[i].id_kategori + '</td>' +
                        '<td>' + '<a class="edit" data-id="'+ data[i].id_mkn+'" data-nama="' + data[i].nama + '" data-harga="' + data[i].hrg+ '" data-status="'+ data[i].status +'" style="cursor:pointer"><i class="material-icons">settings</i></a><a class="delete" data-delete="' + data[i].id_mkn + '" style="cursor:pointer"><i class="material-icons">clear</i></a><a class="flag" data-id="' + data[i].id_mkn + '" data-status="' + data[i].status + '" style="cursor:pointer"><i class="material-icons">check</i></a>'+ '</td>' +  
                        '</tr>'
              }
              $('#show_data').html(html);
            }
          });
        }

        // save subscriber
        $('#btn-save').on('click', function() {
          var nama = $('#nama').val();
          var harga = $('#harga').val();
          var status = $('#status').val();
          var kategori = $('#kategori').val();
          var gambar = $('#gambar').val();
          $.ajax({
            type : "POST",
            url : "<?php echo site_url('data/makanan_save'); ?>",
            dataType : "JSON",
            data : {nama : nama, harga : harga, status : status, kategori : kategori, gambar : gambar},
            success : function() {
              $('[name="kota"]').val("");
              show_subs();
            }
          });
          return false;
        });

        $('#btn-edit-save').on('click', function() {
          var id = $('#edit-id').val();
          var nama = $('#edit-nama').val();
          var harga = $('#edit-harga').val();
          $.ajax({
            type : "POST",
            url : "<?php echo site_url('data/makanan_edit'); ?>",
            dataType : "JSON",
            data : {id : id, nama : nama, harga : harga},
            success : function() {
              $('#editKategori').val("");
              $("#modalEdit").modal('hide');
              show_subs();
            }
          });
          return false;
        });

        $('#btn-delete').on('click', function() {
          var id_mkn = $('#delete-id').val();
          $.ajax({
            type : "POST",
            url : "<?php echo site_url('data/makanan_delete'); ?>",
            dataType : "JSON",
            data : {id_mkn : id_mkn},
            success : function() {
              $("#modalDelete").modal('hide');
              show_subs();
            }
          });
          return false;
        });

        $('#show_data').on('click','.edit',function(){
          var id = $(this).data('id');
          var nama  = $(this).data('nama');
          var harga = $(this).data('harga');
          var status = $(this).data('status');
          var kategori = $(this).data('kategori');

          $("#edit-id").val(id);
          $("#edit-nama").val(nama);
          $("#edit-harga").val(harga);

          $("#modalEdit").modal('show');

        });

        $('#show_data').on('click','.delete',function(){

          var id   = $(this).data('delete');

          $("#delete-id").val(id);

          $("#modalDelete").modal('show');

        });

        $('#show_data').on('click','.flag',function(){

          var id     = $(this).data('id');
          var status   = $(this).data('status');

          $.ajax({
            type : "POST",
            url : "<?php echo site_url('data/makanan_flag'); ?>",
            dataType : "JSON",
            data : {id : id, status : status},
            success : function() {
              show_subs();
            }
          });

        });

      });
    </script>
  </body>
</html>