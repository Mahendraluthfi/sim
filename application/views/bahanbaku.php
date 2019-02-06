<section class="content-header">
  <h1>
    Material
    <small>Bahan Baku</small>    
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>    
    <li class="active">Material</li>
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
								<th>Nama Bahan</th>
								<th>Satuan</th>
								<th>Aksi</th>								
							</tr>
						</thead>
						<tbody>
							<?php $no = 1;	
							foreach ($row as $data) { ?>
                			<tr>
								<td><?php echo $no++ ?></td>
								<td><?php echo $data->nama_bahan ?></td>								
								<td><?php echo $data->satuan ?></td>								
								<td>
					              <button type="button" class="btn btn-success btn-sm" onclick="edit_jm('<?php echo $data->id_bahan ?>')"><span class="glyphicon glyphicon-edit"></span></button>
		    						<a href="<?php echo base_url('admin/bahanbaku/delete/'.$data->id_bahan) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus Data ?')"><span class="glyphicon glyphicon-trash"></span></a>					              
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
            <h3 class="modal-title">Add Data Material</h3>
          </div>
          <div class="modal-body form">
            <form action="#" id="form" class="form-horizontal">
                <div class="form-body">                  
                  <div class="form-group">
                      <label class="control-label col-md-3">Nama Bahan Baku</label>
                      <div class="col-md-9">
                        <input type="text" name="namabahan" class="form-control" placeholder="Nama Bahan">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-md-3">Satuan</label>
                      <div class="col-md-9">
                        <input type="text" name="satuan" class="form-control" placeholder="Satuan">                      
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
        url : "<?php echo site_url('index.php/admin/bahanbaku/get')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            // $('#kabkot').trigger('change');  
            $('[name="namabahan"]').val(data.nama_bahan);            
            $('[name="satuan"]').val(data.satuan);            
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Data Bahan Baku'); // Set title to Bootstrap modal title

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
          url = "<?php echo site_url('index.php/admin/bahanbaku/save')?>";          
      }else{          
          url = "<?php echo site_url('index.php/admin/bahanbaku/edit/')?>" + gid;         
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