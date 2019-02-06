<section class="content-header">
  <h1>
    Payroll
    <small>Data Upah Penjahit</small>    
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>        
    <li class="active">Upah</li>
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
								<th>Tanggal</th>
								<th>Penjahit</th>
								<th>Jml Item</th>
								<th>Total Upah</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1;
							foreach ($show as $data) { ?>
							<tr>
								<td><?php echo $no++; ?></td>
								<td><?php echo $data->date ?></td>
								<td><?php echo $data->nama_penjahit ?></td>
								<td><?php echo $data->jml_item ?></td>
								<td><?php echo number_format($data->total_upah); ?></td>
								<td>
							      <button type="button" class="btn btn-success btn-sm" onclick="edit_jm('<?php echo $data->id_payroll ?>')"><span class="glyphicon glyphicon-edit"></span></button>
                    <a href="<?php echo base_url('admin/upah/delete/'.$data->id_payroll) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus Data ?')"><span class="glyphicon glyphicon-trash"></span></a>
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
            <form action="#" id="form" class="form-horizontal">            
                <div class="form-body">                  
                  <div class="form-group">
                      <label class="control-label col-md-3">Nama Penjahit</label>
                      <div class="col-md-9">
                        <select name="penjahit" class="form-control" style="width: 100%;">
                        	<?php foreach ($penjahit as $key) { ?>
                        		<option value="<?php echo $key->id_penjahit ?>"><?php echo $key->nama_penjahit ?></option>
                        	<?php } ?>
                        </select>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-md-3">Tanggal</label>
                      <div class="col-md-9">
                        <input type="text" name="date" class="form-control" placeholder="Tanggal" id="datepicker">
                      </div>
                  </div>                             
                  <div class="form-group">
                      <label class="control-label col-md-3">Jumlah Item</label>
                      <div class="col-md-9">
                        <input type="number" name="jml" min="1" class="form-control" placeholder="Jumlah Item borongan">
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
        url : "<?php echo site_url('index.php/admin/upah/get')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            // $('#kabkot').trigger('change');  
            $('[name="penjahit"]').val(data.id_penjahit);            
            $('[name="date"]').val(data.date);            
            $('[name="jml"]').val(data.jml_item);            
            $('[name="penjahit"]').trigger('change');            
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
          url = "<?php echo site_url('index.php/admin/upah/save')?>";          
      }else{          
          url = "<?php echo site_url('index.php/admin/upah/edit/')?>" + gid;         
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