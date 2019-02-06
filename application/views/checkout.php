<h3>Checkout Pemesanan</h3>
<hr>
<div class="row">
	<div class="col-sm-5 col-md-5 col-lg-5">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Data Pembeli</h3>				
			</div>
			<div class="panel-body">
	            <form action="#" id="form" class="form-horizontal">
	                <div class="form-body">                            
	                  <div class="form-group">
	                      <label class="control-label col-md-3">Nama</label>
	                      <div class="col-md-9">
	                        <p class="form-control-static"><?php echo $people->nama_member ?></p>
	                      </div>
	                  </div>
	                  <div class="form-group">
	                      <label class="control-label col-md-3">Email</label>
	                      <div class="col-md-9">
	                        <p class="form-control-static"><?php echo $people->email ?></p>                        
	                      </div>
	                  </div>
	                  <div class="form-group">
	                      <label class="control-label col-md-3">Alamat</label>
	                      <div class="col-md-9">
	                        <p class="form-control-static"><?php echo $people->alamat ?></p>                        
	                      </div>
	                  </div>                             
	                  <div class="form-group">
	                      <label class="control-label col-md-3">Telepon</label>
	                      <div class="col-md-9">
	                        <p class="form-control-static"><?php echo $people->telepon ?></p>                        
	                      </div>
	                  </div>                                               
	                </div>
	            </form>          		
            	<div class="pull-left">
					<a href="<?php echo base_url('shoppingcart') ?>" class="btn btn-primary"><i class="glyphicon glyphicon-chevron-left"></i> Shopping Cart</a>
				</div>
				<div class="pull-right">
					<a href="<?php echo base_url('profil') ?>" class="btn btn-success">Edit Profile <i class="glyphicon glyphicon-chevron-right"></i></a>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-7 col-md-7 col-lg-7">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Detail Pemesanan</h3>
			</div>
			<div class="panel-body">				
				<table class="table table-condensed" id="example">
					<thead>
						<tr class="info">
							<th width="1%">No</th>
							<th>Produk</th>
							<th>Nama Produk</th>
							<th>Jumlah</th>
							<th>Harga</th>
							<th>Total</th>												
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
						</tr>
						<?php } ?>
					</tbody>
				</table>
				<h3>Total Belanja : Rp. <?php echo number_format($total); ?></h3>			
				<div class="well well-sm">
					<i>* Harga total belum termasuk ongkos kirim. <br>
						* Status pemesanan "Proses" sampai pihak kami mengirim detail total pembayaran. <br>
						* Pembayaran bisa dilakukan jika status pemesanan "Menunggu Pembayaran" <br>
						* Konfirmasi pembayaran dapat dilakukan dengan cara upload bukti pembayaran <br>
						* Barang dikirim setelah pembayaran diselesaikan
					</i>
				</div>
				<?php echo form_open('checkout/result'); ?>
				<input type="hidden" name="total" value="<?php echo $total ?>">
				<button type="submit" class="btn btn-primary btn-block" onclick='return confirm("Simpan dan selesaikan transaksi ?")'>Simpan Pemesanan</button>
				<?php echo form_close(); ?>
			</div>
		</div>

	</div>
</div>