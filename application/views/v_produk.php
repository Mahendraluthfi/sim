<h3>Produk Faiz Collection</h3>
<hr>
<div class="row text-center">
<?php 
	$kolom = 4;
	$batas = 0;
	foreach ($get as $data) {
		if ($batas % $kolom == "0") {
	        echo "</div><div class='row text-center'>";
	    }
	    $batas++; ?>
	      <div class="col-md-3 col-sm-6 hero-feature">
		        <div class="thumbnail">
		            <img src="<?php echo base_url('asset/foto/'.$data->foto) ?>" height="400" alt="">
		            <div class="caption">
		                <h3><?php echo $data->nama_produk; ?></h3>
		                <h4><b><?php echo 'Rp. '.number_format($data->harga); ?></b></h4>
		                <p><i><?php echo $data->detail; ?></i></p>
		                <p style="color: red;">
		                	<?php if ($data->stok == "0"){ ?>
		                		<b><i><strike>Stok Habis</strike></i></b>
		                	<?php }else{ ?>
		                		Stok : <?php echo $data->stok ?>
		                	<?php } ?>
		                </p>
		                <p>
	                    <button class="btn btn-primary" <?php if($data->stok == "0"){ echo 'disabled=""'; } ?>  onclick="shop('<?php echo $data->id_produk ?>')"><span class="glyphicon glyphicon-shopping-cart"></span> Order</button>
	                </p>
	            </div>
	        </div>
	    </div>
<?php } ?>
</div>
<?php echo $halaman; ?>	

<div class="modal fade" id="modal_validasi" role="dialog">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h3 class="modal-title"></h3>
          </div>
          <div class="modal-body form">
            <div class="row">
              <div class="col-sm-5 col-md-5 col-lg-5">
                <img src="" alt="" id="gambar">
              </div>
              <div class="col-sm-7 col-md-7 col-lg-7">
                <form action="" method="POST" role="form" id="form">
                  <div class="form-group">
                    <label for="">Harga</label>
                    <h4 class="harga"></h4>
                  </div>
                  <div class="form-group">
                    <label for="">Detail</label>
                    <p class="detail"></p>
                  </div>
                  <div class="form-group">
                    <label for="">Jumlah Order</label>
                    <input type="number" name="jml" class="form-control" id="jml" min="1" value="1">
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="modal-footer">            
            <button type="submit" class="btn btn-success" onclick="add()">Tambahkan ke Shopping Cart</button>            
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>


<script>
  var gid;
  function shop(id) {
    gid = id;
    $.ajax({
      url : "<?php echo site_url('index.php/produk/get')?>/" + id,
      type: "GET",
      dataType: "JSON",
      success: function(data){  
          $('#gambar').attr('src','<?php echo base_url('asset/foto/') ?>'+data.foto);    
          $('.modal-title').text(data.nama_produk);           
          $('.harga').text(data.harga);           
          $('.detail').text(data.detail);           
          $('#jml').attr('max',data.stok);           
          $('#modal_validasi').modal('show');   
      },
      error: function (jqXHR, textStatus, errorThrown){
          alert('Error get data from ajax');
      }
  });   
  }

  function add() {
      var url;            
      var session = '<?php echo $this->session->userdata('member') ?>';
      if (session == '') {
        alert('Anda harus Login terlebih dahulu');
      }else{
        url = "<?php echo site_url('index.php/produk/add_shop/')?>" + gid;         
        $.ajax({
              url : url,
              type: "POST",
              data: $('#form').serialize(),
              dataType: "JSON",
              success: function(data)
              {
                 //if success close modal and reload ajax table
                 $('#modal_validasi').modal('hide');
                location.reload();// for reload a page
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                  alert('Error adding / update data');
              }
          });
      }
  }
</script>