<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Cetak Detail Produksi</title>
  	<link rel="stylesheet" href="<?php echo base_url() ?>asset/bootstrap/dist/css/bootstrap.min.css">
	
</head>
<body>
<p></p>
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<h4>Detail Produksi Kode : <?php echo $kode ?></h4>
			<table class="table table-bordered">
				<thead>
					<tr class="active">
          				<th width="1%">No</th>
          				<th>Kode Produksi</th>
          				<th>Tanggal</th>
          				<th>Nama Produk</th>
          				<th>Jumlah Produksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1;
					foreach ($row1 as $data1) { ?>					 	
					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $data1->kode_produksi ?></td>
						<td><?php echo $data1->tanggal ?></td>
						<td><?php echo $data1->nama_produk ?></td>
						<td><?php echo $data1->total_produksi ?></td>
					</tr>
					 <?php } ?>
				</tbody>
			</table>
			<h4>Detail Kebutuhan Bahan Baku</h4>
			<table class="table table-bordered">
				<thead>
					<tr class="active">
          				<th width="1%">No</th>          				
          				<th>Nama Bahan</th>
          				<th>Total Kebutuhan</th>          				
					</tr>
				</thead>
				<tbody>
					<?php $no = 1;
					foreach ($row2 as $data2) { ?>					 	
					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $data2->nama_bahan ?></td>
						<td><?php echo $data2->total ?></td>						
					</tr>
					 <?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>


<script src="<?php echo base_url() ?>asset/bootstrap/dist/js/bootstrap.min.js"></script>
<script>
	window.print();
</script>
</body>
</html>