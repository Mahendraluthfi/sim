<h3>Shopping Cart</h3>
<hr>

<div class="row">
	<div class="col-sm-12 col-md-12 col-lg-12">
		<table class="table table-bordered" id="example">
			<thead>
				<tr class="info">
					<th width="1%">No</th>
					<th>Produk</th>
					<th>Nama Produk</th>
					<th>Jumlah</th>
					<th>Harga</th>
					<th>Total</th>					
					<th>Aksi</th>					
				</tr>
			</thead>
			<tbody>
				<?php $no=1; $total=0; foreach ($show as $data) { 
					$th = $data->harga*$data->jml;
					$total = $th + $total;
				?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><img src="<?php echo base_url('asset/foto/').$data->foto ?>" height="100"></td>
					<td><?php echo $data->nama_produk ?></td>
					<td class="text-center"><?php echo $data->jml ?></td>
					<td><?php echo number_format($data->harga) ?></td>
					<td><?php echo number_format($th) ?></td>
					<td>
						<button type="button" class="btn btn-primary btn-sm" onclick="edit('<?php echo $data->id ?>')"><i class="glyphicon glyphicon-edit"></i></button>								
						<a href="<?php echo base_url('shoppingcart/delete/'.$data->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus Produk dari Shopping Cart ?')"><i class="glyphicon glyphicon-trash"></i></a>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		<h3>Total Belanja : Rp. <?php echo number_format($total); ?></h3>
		<div class="pull-left">
			<a href="<?php echo base_url('produk') ?>" class="btn btn-primary"><i class="glyphicon glyphicon-chevron-left"></i> Produk</a>
		</div>
		<div class="pull-right">
			<a href="<?php echo base_url('checkout') ?>" class="btn btn-success">Checkout <i class="glyphicon glyphicon-chevron-right"></i></a>
		</div>
	</div>
</div>
<p></p>

<div class="modal fade" id="modal_validasi" role="dialog">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h3 class="modal-title">Update Jumlah Order</h3>
          </div>
          <div class="modal-body form">
          		<form action="" method="POST" class="form-horizontal" role="form" id="form2">
      				<div class="form-group">
      					<label class="control-label col-md-4 nama"></label>
      					<div class="col-sm-8 col-md-8 col-lg-8">
      						<input type="number" name="jml" class="form-control">      						
      					</div>
      				</div>          				
          		</form>
          </div>
          <div class="modal-footer">            
            <button type="submit" class="btn btn-success" onclick="add()">Update</button>            
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>


<script>
  var gid;
  function edit(id) {
    gid = id;
    $.ajax({
      url : "<?php echo site_url('index.php/shoppingcart/get')?>/" + id,
      type: "GET",
      dataType: "JSON",
      success: function(data){  
          $('.nama').text(data.nama_produk);
          $('[name="jml"]').val(data.jml);
          $('[name="jml"]').attr('max', data.stok);
          $('#modal_validasi').modal('show');
      },
      error: function (jqXHR, textStatus, errorThrown){
          alert('Error get data from ajax');
      }
  });   
  }

  function add() {
      	var url;                  
   		url = "<?php echo site_url('index.php/shoppingcart/edit/')?>" + gid;         
        $.ajax({
              url : url,
              type: "POST",
              data: $('#form2').serialize(),
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
</script>