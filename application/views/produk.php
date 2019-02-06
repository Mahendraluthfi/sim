<section class="content-header">
  <h1>
    Produk
    <small>Data Produk</small>    
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>    
    <li class="active">Produk</li>
  </ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="box box-danger">
				<div class="box-header">
					<button type="button" class="btn btn-primary" onclick="add_jm()"><span class="glyphicon glyphicon-plus"></span> Add</button>
				</div>
				<div class="box-body">
					<table class="table table-bordered table-hover" id="example">
						<thead>
							<tr class="active">
								<th width="1%">No</th>								
								<th>Nama Produk</th>
								<th>Harga</th>
								<th>Detail</th>
								<th>Foto</th>
								<th>Stok</th>
								<th>Aksi</th>								
							</tr>
						</thead>
						<tbody>
							<?php $no = 1;	
							foreach ($row as $data) { ?>
                			<tr>
        						<td><?php echo $no++ ?></td>
                				<td><?php echo $data->nama_produk ?></td>               
                				<td><?php echo $data->harga ?></td>               
								<td><?php echo $data->detail ?></td>								
								<td><img src="<?php echo base_url('asset/foto/'.$data->foto) ?>" height="75"></td>								
								<td><?php echo $data->stok ?></td>								
								<td>
					              <button type="button" class="btn btn-success btn-sm" onclick="edit_jm('<?php echo $data->id_produk ?>')"><span class="glyphicon glyphicon-edit"></span></button>
		    						<a href="<?php echo base_url('admin/produk/row/'.$data->id_produk) ?>" class="btn btn-primary btn-sm" title="Row of Material"><i class="fa fa-tasks"></i></a>
		    						<a href="<?php echo base_url('admin/produk/delete/'.$data->id_produk) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus Data ?')"><span class="glyphicon glyphicon-trash"></span></a>
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

<div class="modal fade" id="modal_form" role="dialog">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h3 class="modal-title">Add Data Produk</h3>
          </div>
          <div class="modal-body form">
            <?php echo form_open_multipart('admin/produk/save', array('id' => 'form','class' => 'form-horizontal')); ?>
                <div class="form-body">                  
                  <div class="form-group">
                      <label class="control-label col-md-3">Nama Produk</label>
                      <div class="col-md-9">
                        <input type="text" name="namaproduk" class="form-control" placeholder="Nama Produk">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-md-3">Harga</label>
                      <div class="col-md-9">
                        <input type="text" name="harga" class="form-control" placeholder="Harga">
                      </div>
                  </div>                             
                  <div class="form-group">
                      <label class="control-label col-md-3">Detail Produk</label>
                      <div class="col-md-9">
                        <textarea name="detail" class="form-control" placeholder="Detail Produk"></textarea>
                      </div>
                  </div>                             
                  <div class="form-group">
                      <label class="control-label col-md-3">Foto</label>
                      <div class="col-md-9">
                      	<input type="file" name="file">   
                      	<p class="help-block"></p>
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
	var save_method; 
    var table;
    var gid;
    
    function add_jm()
    {
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); // show bootstrap modal      
    }

    function edit_jm(id)
    {    
      $('#form')[0].reset(); // reset form on modals
	  //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('index.php/admin/produk/get')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            // $('#kabkot').trigger('change');  
            if (data.foto == '') {
            	var z = ''
            }else{
            	var z = data.foto
            }          	
          	$('#form').attr('action','<?php echo base_url("admin/produk/edit/") ?>'+data.id_produk);          	
          	$('[name="namaproduk"]').val(data.nama_produk);          	
          	$('[name="harga"]').val(data.harga);	
          	$('[name="detail"]').val(data.detail);	          	          
          	$('.help-block').text(z);	
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Data Perolehan Suara'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
      });

    }
</script>