<section class="content-header">
  <h1>
    Penjualan
    <small>Data Penjualan</small>    
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>    
    <li class="active">Penjualan</li>
  </ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="box box-danger">
				<div class="box-header">
					<!-- <button type="button" class="btn btn-primary" onclick="add_jm()"><span class="glyphicon glyphicon-plus"></span> Add</button> -->
				</div>
				<div class="box-body">
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
								<tr>
									<td><?php echo $no++ ?></td>
									<td><?php echo $key->kode_penjualan ?></td>
									<td><?php echo $key->nama_member ?></td>
									<td><?php echo $key->date ?></td>
									<td><?php echo number_format($key->total_item) ?></td>
									<td><?php echo number_format($key->ongkir) ?></td>
									<td><?php echo number_format($key->total) ?></td>
									<td><?php echo $key->sts ?></td>
									<td>
										<button type="button" class="btn btn-default btn-sm">Detail</button>
										<button type="button" class="btn btn-default btn-sm">Ongkir</button>
										<a href="" class="btn btn-default btn-sm">Hapus</a>
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>