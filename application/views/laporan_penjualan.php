<section class="content-header">
  <h1>
    Laporan
    <small>Rekap Laporan</small>    
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>    
    <li><a href="<?php echo base_url('laporan') ?>"> Laporan</a></li>    
    <li class="active">Laporan Penjualan</li>
  </ol>
</section>

<section class="content">
		<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="box box-danger">				
				<div class="box-body">
					<h4>Laporan Penjualan <?php echo $ta.' s/d '.$tb; ?></h4>
					<table class="table table-bordered table-hover" style="font-size: 12px;">
						<thead>
							<tr class="active">
								<th width="1%">No</th>								
								<th>Kode Penjualan</th>
								<th>Nama Member</th>
								<th>Tanggal</th>								
								<th>Nama Produk</th>								
								<th>Jumlah</th>								
								<th>Total Bayar</th>								
								<th>Status</th>								
							</tr>
						</thead>
						<tbody>
							<?php $no = 1;	$alltotal = 0;
							foreach ($result as $data) {
								$tbayar = $data->harga * $data->jml;
								$alltotal = $tbayar + $alltotal;
							 ?>
                			<tr>
								<td><?php echo $no++ ?></td>
								<td><?php echo $data->kode_penjualan ?></td>								
								<td><?php echo $data->nama_member ?></td>								
								<td><?php echo $data->date ?></td>								
								<td><?php echo $data->nama_produk ?></td>								
								<td><?php echo $data->jml ?></td>								
								<td><?php echo number_format($tbayar) ?></td>								
								<td><?php echo $data->sts ?></td>								
								
					          </tr>
							<?php } ?>
						</tbody>
					</table>
					<h4>Total : <?php echo number_format($alltotal) ?></h4>
				</div>
			</div>
		</div>
	</div>			
</section>

<script>
	window.print();
</script>