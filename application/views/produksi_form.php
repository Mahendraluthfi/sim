<section class="content-header">
  <h1>
    Produksi
    <small>Data Produksi</small>    
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>    
    <li><a href="<?php echo base_url('admin/produksi') ?>">Produksi</a></li>
    <li class="active">Produksi</li>
  </ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="box box-danger">
				<div class="box-header">
					<h4>Kode Produksi : <?php echo $this->session->userdata('kp'); ?></h4>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-sm-6 col-md-6 col-lg-6">
							<?php echo form_open('admin/produksi/save_produk', array('class' => 'form-inline')); ?>
            				<div class="form-group">	            				
            				<label>Nama Produk </label>
            				<select name="produk" class="form-control">
            		 			<?php foreach ($option as $key) { ?>
            						<option value="<?php echo $key->id_produk ?>"><?php echo $key->nama_produk ?></option>
            					<?php } ?>
            				</select>
            					<input type="number" name="jml" class="form-control" placeholder="Jumlah" min="1">
            				</div>
            					<button type="submit" class="btn btn-primary">Tambahkan</button>
	            			</form><p></p>
							<?php echo form_open('admin/produksi/save_produksi', array('class' => 'form-inline')); ?>
	            				<div class="form-group">
            						<label>Tanggal </label>
	            					<input type="text" name="tgl" class="form-control" id="datepicker" placeholder="Tanggal Produksi" required="" <?php if (!empty($this->session->userdata('date'))) {
	            						echo "value='".$this->session->userdata('date')."'";
	            					} ?>>
	            				</div>
	            				<button type="submit" class="btn btn-primary" onclick="return confirm('Simpan Data ?')">Simpan</button>
	            			</form>
						</div>
						<div class="col-sm-6 col-md-6 col-lg-6">
							<table class="table table-bordered table-hover" id="example">
								<thead>
									<tr class="active">
										<th width="1%">No</th>
										<th>Nama Produk</th>
										<th>Jumlah</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $no=1; foreach ($row as $data) { ?>
									<tr>
										<td><?php echo $no++; ?></td>
										<td><?php echo $data->nama_produk ?></td>
										<td><?php echo $data->total_produksi; ?></td>
										<td>
											<a href="<?php echo base_url('admin/produksi/hapus_produk/'.$data->id) ?>" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i></a>
										</td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>