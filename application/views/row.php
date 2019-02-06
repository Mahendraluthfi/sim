<section class="content-header">
  <h1>
    Produk
    <small>Row of Material</small>    
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>    
    <li><a href="<?php echo base_url('admin/produk') ?>"> Produk</a></li>    
    <li class="active">Row of Material</li>
  </ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="box box-danger">
				<div class="box-header">
					<h3><?php echo $prod->nama_produk ?></h3>
				</div>
				<div class="box-body">					            		
					<?php echo form_open('admin/produk/save_bahan', array('class' => 'form-inline')); ?>
            			<div class="form-group">	            				
            				<select name="bahan" class="form-control">
            					<?php foreach ($option as $key) { ?>
            						<option value="<?php echo $key->id_bahan ?>"><?php echo $key->nama_bahan ?></option>
            					<?php } ?>	            					
            				</select>
            				<input type="number" name="jml" class="form-control" placeholder="Jumlah" min="1">
            				<input type="hidden" name="id" value="<?php echo $prod->id_produk ?>">
            			</div>
            			<button type="submit" class="btn btn-primary">Tambahkan</button>
            		</form><br>
            		<h4>Row of Material : <?php echo $prod->nama_produk ?></h4>
            		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            			<table class="table table-bordered table-hover" id="example">
            				<thead>
            					<tr class="active">
            						<th width="1%">No</th>
            						<th>Nama Bahan</th>
            						<th>Jumlah</th>
            						<th>Satuan</th>
            						<th>Aksi</th>
            					</tr>
            				</thead>
            				<tbody>
            					<?php $no=1 ;
            					foreach ($row as $data) { ?>
            						<tr>
            							<td><?php echo $no++ ?></td>
            							<td><?php echo $data->nama_bahan ?></td>
            							<td><?php echo $data->jumlah ?></td>
            							<td><?php echo $data->satuan ?></td>
            							<td>
            								<a href="<?php echo base_url('admin/produk/delete_material/'.$data->id_material.'/'.$data->id_produk) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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

</section>
