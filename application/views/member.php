<section class="content-header">
  <h1>
    Member
    <small>Data Member</small>    
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>    
    <li class="active">Member</li>
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
								<th>Username</th>
      					      	<th>Nama</th>
								<th>Alamat</th>
                				<th>Telepon</th>
								<th>Aksi</th>								
							</tr>
						</thead>
						<tbody>
							<?php $no = 1;	
							foreach ($row as $data) { ?>
                			<tr>
								<td><?php echo $no++ ?></td>
                				<td><?php echo $data->username ?></td>               
                				<td><?php echo $data->nama_member ?></td>               
								<td><?php echo $data->alamat ?></td>								
								<td><?php echo $data->telepon ?></td>								
								<td>					              
		    						<a href="<?php echo base_url('admin/member/delete/'.$data->id_member) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus Data ?')"><span class="glyphicon glyphicon-trash"></span></a>					              
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