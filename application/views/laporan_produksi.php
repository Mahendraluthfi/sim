<section class="content-header">
  <h1>
    Laporan
    <small>Rekap Laporan</small>    
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>    
    <li><a href="<?php echo base_url('laporan') ?>"> Laporan</a></li>    
    <li class="active">Laporan Produksi</li>
  </ol>
</section>

<section class="content">
		<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="box box-danger">				
				<div class="box-body">
					<h4>Laporan Produksi <?php echo $ta.' s/d '.$tb; ?></h4>
					<table class="table table-bordered table-hover" style="font-size: 12px;">
						<thead>
							<tr class="active">
								<th width="1%">No</th>								
								<th>Kode Produksi</th>
								<th>Tanggal</th>
								<th>Nama Produk</th>								
								<th>Total Produksi</th>								
								<th>Status</th>								
							</tr>
						</thead>
						<tbody>
							<?php $no = 1;	
							foreach ($result as $data) { ?>
                			<tr>
								<td><?php echo $no++ ?></td>
								<td><?php echo $data->kode_produksi ?></td>								
								<td><?php echo $data->tanggal ?></td>								
								<td><?php echo $data->nama_produk ?></td>								
								<td><?php echo $data->total_produksi ?></td>								
								<td><?php if($data->status == '0'){ echo "PROSES";}else{echo "SELESAI";} ?></td>								
					          </tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>			
</section>

<script>
	window.print();
</script>