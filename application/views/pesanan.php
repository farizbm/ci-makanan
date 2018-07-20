

    <div class="push large"></div>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.2.1.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script type="text/javascript">

        function show_barang(value) {
          $.ajax({
            type : "POST",
            url : "<?php echo site_url('data/getbykat_makanan'); ?>",
            dataType : "JSON",
            data : {id : value},
            success : function(data) {
              var html = '';
              var i;
              html += '<option value="">Enter Makanan</option>'
              for(i=0; i<data.length; i++) {
                html += "<option value='"+ data[i].id_mkn+"'>" + data[i].nama + "</option>"
              }
              if (html === ''){
                $('#barang').html(html);
              }else{
                $('#barang').html(html);
              }
            }
          });
        }

      
    </script>
    <div class="container">
      <form>
        <div class="form-group row">
          <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Nota </label>
          <div class="col-sm-10">
            <input type="text" class="form-control form-control-sm" id="nota" placeholder="Enter Nota">
            </select>
          </div>
        </div>
      <form>
        <div class="form-group row">
          <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Meja </label>
          <div class="col-sm-10">
            <input type="text" class="form-control form-control-sm" id="meja" placeholder="Enter No Meja">
            </select>
          </div>
        </div>
      <form>
        <div class="form-group row">
          <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Nama </label>
          <div class="col-sm-10">
            <select class="form-control" id="makanan" >
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Jumlah</label>
          <div class="col-sm-10">
          <input type="text" class="form-control form-control-sm" id="jumlah" placeholder="Enter Jumlah">
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-10 offset-sm-2">
          <button id="btn-save" type="button" class="btn btn-primary">Add</button>
          <button type="reset" class="btn btn-primary">Reset</button>
          </div>
        </div>
      </form>
    </div>

    <div class="container">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody id="show_data">
        </tbody>
      </table>
    </div>



    <div class="container">
      <form>
        <div class="form-group row">
          <div class="col-sm-10 offset-sm-2">
          <input type="hidden" name="total" id="total">
          <button id="btn-save2" type="button" class="btn btn-primary">Submit</button>
          </div>
        </div>
      </form>
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
            <input type="hidden" name="nota" id="delete-nota">
            <button type="button" class="btn btn-primary" id="btn-delete">Delete</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <script type="text/javascript">
      $(document).ready(function() {
        show_kat();

        function show_kat() {
          $.ajax({
            type : "AJAX",
            url : "<?php echo site_url('data/makanan_list'); ?>",
            dataType : "JSON",
            success : function(data) {
              var html = '';
              var i;
              for(i=0; i<data.length; i++) {
                html += '<option value='+ data[i].id_mkn+'>' +data[i].nama + ' - '+ data[i].hrg+ '</option>'
              }
              $('#makanan').append(html);
            }
          });
        } 

        function show_pesanmakan() {
          var nota = $('#nota').val();
          $.ajax({
            type : "POST",
            url : "<?php echo site_url('data/makanan_list_detail'); ?>",
            dataType : "JSON",
            data : {nota : nota},
            success : function(data) {
              var html = '';
              var i;
              for(i=0; i<data.length; i++) {
                html += '<tr>' +
                        '<td>' + (i+1) + '</td>' +
                        '<td>' + data[i].nama + '</td>' +
                        '<td>' + data[i].jumlah + '</td>' +
                        '<td>' + '<a class="delete" data-delete="' + data[i].id_mkn + '" style="cursor:pointer"><i class="material-icons">clear</i></a>'+ '</td>' +  
                        '</tr>'
              }
              $('#show_data').append(html);
            }
          });
        } 

        // save subscriber
        $('#btn-save').on('click', function() {
          var nota = $('#nota').val();
          var nama = $('#makanan').val();
          var jumlah = $('#jumlah').val();
          $.ajax({
            type : "POST",
            url : "<?php echo site_url('data/transaksi_save'); ?>",
            dataType : "JSON",
            data : {nota : nota, nama : nama, jumlah : jumlah},
            success : function() {
              show_pesanmakan();
            }
          });
          return false;
        });

        $('#btn-save2').on('click', function() {
          var nota   = $('#kode').val();
          var diskon = $('#diskon').val();
          var total  = $('#total').val();
          var status = $('#status').val();
          $.ajax({
            type : "POST",
            url : "<?php echo site_url('master/save_penjualan'); ?>",
            dataType : "JSON",
            data : {nota : nota, diskon : diskon,total : total, status : status },
            success : function() {
              window.location = '<?php echo site_url('penjualan'); ?>'
            }
          });
          return false;
        });

        $('#btn-edit-save').on('click', function() {
          var id = $('#edit-id').val();
          var nama = $('#edit-nama').val();
          var alamat = $('#edit-alamat').val();
          var telepon = $('#edit-telepon').val();
          $.ajax({
            type : "POST",
            url : "<?php echo site_url('master/edit_customer'); ?>",
            dataType : "JSON",
            data : {nama : nama, id : id, alamat : alamat, telepon : telepon},
            success : function() {
              $('#editKategori').val("");
              $("#modalEdit").modal('hide');
              show_subs();
            }
          });
          return false;
        });

        $('#btn-delete').on('click', function() {
          var id = $('#delete-id').val();
          var nota = $('#delete-nota').val();
          $.ajax({
            type : "POST",
            url : "<?php echo site_url('master/delete_penjualanDetail'); ?>",
            dataType : "JSON",
            data : {kode : id, nota: nota},
            success : function() {
              $("#modalDelete").modal('hide');
              show_subs();
            }
          });
          return false;
        });

        $('#show_data').on('click','.edit',function(){

          var id   = $(this).data('id');
          var nama = $(this).data('nama');
          var alamat = $(this).data('alamat');
          var telepon = $(this).data('telepon');

          $("#edit-id").val(id);
          $("#edit-nama").val(nama);
          $("#edit-alamat").val(alamat);
          $("#edit-telepon").val(telepon);

          $("#modalEdit").modal('show');

        });

        $('#show_data').on('click','.delete',function(){

          var id     = $(this).data('id');
          var nota   = $(this).data('nota');

          $("#delete-id").val(id);
          $("#delete-nota").val(nota);

          $("#modalDelete").modal('show');

        });

        $('#show_data').on('click','.flag',function(){

          var id     = $(this).data('id');
          var flag   = $(this).data('flag');

          $.ajax({
            type : "POST",
            url : "<?php echo site_url('master/flag_customer'); ?>",
            dataType : "JSON",
            data : {id : id, flag : flag},
            success : function() {
              show_subs();
            }
          });

        });

      });
    </script>
  </body>
</html>