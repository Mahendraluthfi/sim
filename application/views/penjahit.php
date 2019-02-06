<section class="content-header">
  <h1>
    Penjahit
    <small>Data Pekerja Penjahit</small>    
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>    
    <li class="active">Penjahit</li>
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
								<th>Nama Penjahit</th>
                <th>Alamat</th>
                <th>Telepon</th>
								<th>Upah</th>
								<th>Aksi</th>								
							</tr>
						</thead>
						<tbody>
							<?php $no = 1;	
							foreach ($row as $data) { ?>
                			<tr>
								<td><?php echo $no++ ?></td>
                <td><?php echo $data->nama_penjahit ?></td>               
                <td><?php echo $data->alamat ?></td>               
								<td><?php echo $data->telepon ?></td>								
								<td><?php echo "Rp. ".number_format($data->upah) ?></td>								
								<td>
					              <button type="button" class="btn btn-success btn-sm" onclick="edit_jm('<?php echo $data->id_penjahit ?>')"><span class="glyphicon glyphicon-edit"></span></button>
		    						<a href="<?php echo base_url('admin/penjahit/delete/'.$data->id_penjahit) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus Data ?')"><span class="glyphicon glyphicon-trash"></span></a>					              
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
            <h3 class="modal-title">Add Data Penjahit</h3>
          </div>
          <div class="modal-body form">
            <form action="#" id="form" class="form-horizontal">
                <div class="form-body">                  
                  <div class="form-group">
                      <label class="control-label col-md-3">Nama Penjahit</label>
                      <div class="col-md-9">
                        <input type="text" name="namapenjahit" class="form-control" placeholder="Nama Penjahit">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-md-3">Alamat</label>
                      <div class="col-md-9">
                        <textarea name="alamat" class="form-control" placeholder="Alamat"></textarea>
                      </div>
                  </div>                             
                  <div class="form-group">
                      <label class="control-label col-md-3">Telepon</label>
                      <div class="col-md-9">
                        <input type="text" name="telepon" class="form-control" placeholder="Nomor Telepon">                      
                      </div>
                  </div>                             
                  <div class="form-group">
                      <label class="control-label col-md-3">Upah</label>
                      <div class="col-md-9">
                        <input type="text" name="upah" class="form-control" placeholder="Besaran Upah">                      
                      </div>
                  </div>                             
                </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
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
      save_method = 'update';
      gid = id;
      $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('index.php/admin/penjahit/get')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            // $('#kabkot').trigger('change');  
            $('[name="namapenjahit"]').val(data.nama_penjahit);            
            $('[name="alamat"]').val(data.alamat);            
            $('[name="telepon"]').val(data.telepon);            
            $('[name="upah"]').val(data.upah);            
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Data Penjahit'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
      });
    }

    function save(){
      var url;      
      if(save_method == 'add'){
          url = "<?php echo site_url('index.php/admin/penjahit/save')?>";          
      }else{          
          url = "<?php echo site_url('index.php/admin/penjahit/edit/')?>" + gid;         
      }    
       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               //if success close modal and reload ajax table
               $('#modal_form').modal('hide');
              location.reload();// for reload a page
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
      }    
</script>