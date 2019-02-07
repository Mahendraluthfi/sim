<h3>Data Pemesanan</h3>
<hr>
<div class="row">
	<div class="col-sm-12 col-md-12 col-lg-12">
		<table class="table table-bordered table-hover" id="example">
			<thead>
				<tr class="active">
					<th width="1%">No</th>								
					<th>Kode Penjualan</th>
				    <th>Nama Member</th>
					<th>Tanggal</th>
    				<th>Total Bayar Item</th>
					<th>Ongkir</th>								
					<th>Total</th>								
					<th>Status</th>								
					<th>Aksi</th>																
				</tr>
			</thead>
			<tbody>
				<?php $no=1; foreach ($show as $key) { ?>
					<tr style="font-size: 12px;">
						<td><?php echo $no++ ?></td>
						<td><?php echo $key->kode_penjualan ?></td>
						<td><?php echo $key->nama_member ?></td>
						<td><?php echo $key->date ?></td>
						<td><?php echo number_format($key->total_item) ?></td>
						<td><?php echo number_format($key->ongkir) ?></td>
						<td><?php echo number_format($key->total) ?></td>
						<td><?php echo $key->sts ?></td>
						<td>
							<button type="button" class="btn btn-primary btn-sm" onclick="detail('<?php echo $key->kode_penjualan ?>')" title="Detail">Detail</button>		
							<?php if ($key->sts == 'MENUNGGU PEMBAYARAN') { ?>
							<button type="button" class="btn btn-warning btn-sm" title="Konfirmasi Pembayaran" onclick="konfirmasi('<?php echo $key->kode_penjualan ?>')">Konfirmasi Bayar</button>
							<?php } ?>							
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>

<div class="modal fade" id="modal_detail" role="dialog">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h3 class="modal-title"></h3>
          </div>
          <div class="modal-body form">

          	<table class="table table-bordered table-hover" id="tb1">
          		<thead>
          			<tr class="info">
          				<th>No</th>
          				<th>Nama Produk</th>
          				<th>Harga</th>
          				<th>Jumlah</th>
          				<th>Total</th>
          			</tr>
          		</thead>
          		<tbody id="show_data">
          			
          		</tbody>
          	</table>          
          </div>
          <div class="modal-footer">            
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>

<div class="modal fade" id="modal_ongkir" role="dialog">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h3 class="modal-title"></h3>
          </div>
          <div class="modal-body form">
          	 <?php echo form_open_multipart('pemesanan/konfirmasi', array('id' => 'form1', 'class' => 'form-horizontal')); ?>
	                <div class="form-body">                            
	                  <div class="form-group">
	                      <label class="control-label col-md-3">Kode Penjualan</label>
	                      <div class="col-md-9">
	                        <p class="form-control-static kode"></p>
	                      </div>
	                  </div>	                
	                  <div class="form-group">
	                      <label class="control-label col-md-3">Tanggal</label>
	                      <div class="col-md-9">
	                        <p class="form-control-static tanggal"></p>                        
	                      </div>
	                  </div>                             
	                  <div class="form-group">
	                      <label class="control-label col-md-3">Total</label>
	                      <div class="col-md-9">
	                        <p class="form-control-static total"></p>
	                      </div>
	                  </div>                                               
	                  <div class="form-group">
	                      <label class="control-label col-md-3">Nomor Rekening</label>
	                      <div class="col-md-9">
	                        <input type="text" name="norek" class="form-control" placeholder="Nomor Rekening">
	                      </div>
	                  </div>                                               
  	                  <div class="form-group">
	                      <label class="control-label col-md-3">Atas Nama</label>
	                      <div class="col-md-9">
	                        <input type="text" name="atasnama" class="form-control" placeholder="Atas Nama">	                        
	                      </div>
	                  </div>                                               
  	                  <div class="form-group">
	                      <label class="control-label col-md-3">Nominal</label>
	                      <div class="col-md-9">
	                        <input type="number" name="nominal" class="form-control" placeholder="Nominal" min="0">
	                      </div>
	                  </div>                                               
  	                  <div class="form-group">
	                      <label class="control-label col-md-3">Foto</label>
	                      <div class="col-md-9">
	                        <input type="file" name="file" required="">
	                        <input type="hidden" name="kodepenjualan">
	                      </div>
	                  </div>                                               
	                </div>
          </div>
          <div class="modal-footer">            
            <button type="submit" class="btn btn-primary">Save</button>          	
	            </form>        
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>


<script>
	function detail(id) {
		var b = $('#tb1').DataTable();           
        b.clear().draw();
        b.destroy();
        $.ajax({
            url : "<?php echo site_url('index.php/admin/penjualan/get')?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data){
                var html1 = '';
            	var x;  
            	var no = 1;
                for(x=0; x<data.length; x++){
                    html1 += "<tr>"+                        
                        "<td>"+no+++"</td>"+
                        "<td>"+data[x].nama_produk+"</td>"+
                        "<td>"+data[x].harga+"</td>"+
                        "<td>"+data[x].jml+"</td>"+
                        "<td>"+data[x].sub+"</td>"+
                        "</tr>";
                    }
                $('.modal-title').text(id);
                $('#show_data').html(html1);
                $('#tb1').DataTable();                  
                $('#modal_detail').modal('show');
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error get data from ajax');
            }
        });
	}	

	function konfirmasi(id) {
	  gid = id;
      $('#form1')[0].reset(); // reset form on modals   
       $.ajax({
            url : "<?php echo site_url('index.php/pemesanan/get')?>/" + gid,
            type: "GET",
            dataType: "JSON",
            success: function(data){
	            $('.kode').text(gid);                		
	            $('.tanggal').text(data.date);                		
	            $('.total').text(data.total);                		
	            $('[name="kodepenjualan"]').val(gid)
                $('.modal-title').text('Konfirmasi Pembayaran '+gid);                
    			$('#modal_ongkir').modal('show'); // show bootstrap modal when complete loaded                    
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error get data from ajax');
            }
        });   
            // $('#kabkot').trigger('change');              
	}

</script>