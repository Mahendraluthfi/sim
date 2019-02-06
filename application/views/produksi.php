<section class="content-header">
  <h1>
    Produksi
    <small>Data Produksi</small>    
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>    
    <li class="active">Produksi</li>
  </ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="box box-danger">
				<div class="box-header">
					<a href="<?php echo base_url('admin/produksi/createsession') ?>" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Add</a>
				</div>
				<div class="box-body">
					<table class="table table-bordered table-hover" id="example">
						<thead>
							<tr class="active">
								<th width="1%">No</th>								
								<th>Kode Produksi</th>
								<th>Tanggal Produksi</th>
                <th>Total Produksi</th>               
								<th>Status</th>								
								<th>Aksi</th>								
							</tr>
						</thead>
						<tbody>
							<?php $no = 1;	
							foreach ($row as $data) { ?>
                			<tr>
        						    <td><?php echo $no++ ?></td>
                				<td><?php echo $data->kode_produksi ?></td>               
                				<td><?php echo $data->tanggal ?></td>               
                        <td><?php echo $data->ttl ?></td>                       
								        <td><?php echo ($data->status == '0' ? "PROSES" : "SELESAI") ?></td>												
								        <td>
			                    <button type="button" class="btn btn-primary btn-sm" onclick="view('<?php echo $data->kode_produksi ?>')"><span class="glyphicon glyphicon-zoom-in"></span> Detail</button>	
                          <?php if ($data->status == '0'): ?>
                          <a href="<?php echo base_url('admin/produksi/createsession/'.$data->kode_produksi) ?>" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span> Edit</a>
                          <a href="<?php echo base_url('admin/produksi/delete/'.$data->kode_produksi) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus Data ?')"><span class="glyphicon glyphicon-trash"></span> Hapus</a>
                          <button type="button" class="btn btn-warning btn-sm" onclick="validasi('<?php echo $data->kode_produksi ?>')"><span class="glyphicon glyphicon-tasks"></span> Validasi</button>  
                          <?php endif ?>
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

<div class="modal fade" id="modal_detail" role="dialog">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h3 class="modal-title">Detail Data Produksi</h3>
          </div>
          <div class="modal-body form">
          	<table class="table table-bordered table-hover" id="tb1">
          		<thead>
          			<tr class="info">
          				<th>No</th>
          				<th>Kode Produksi</th>
          				<th>Tanggal</th>
          				<th>Nama Produk</th>
          				<th>Jumlah Produksi</th>
          			</tr>
          		</thead>
          		<tbody id="show_data">
          			
          		</tbody>
          	</table>
          	<h4>Detail Kebutuhan Bahan Baku</h4>
          	<table class="table table-bordered table-hover" id="tb2">
          		<thead>
          			<tr class="info">
          				<th>No</th>          				
                  <th>Nama Bahan</th>
          				<th>Satuan</th>
          				<th>Total Kebutuhan</th>          				
          			</tr>
          		</thead>
          		<tbody id="show_data2">
          			
          		</tbody>
          	</table>
          </div>
          <div class="modal-footer">
            <a href="" class="btn btn-success" id="link" target="_blank"><i class="glyphicon glyphicon-print"></i> Print</a>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>

<div class="modal fade" id="modal_validasi" role="dialog">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h3 class="modal-title">Validasi Data Produksi</h3>
          </div>
          <div class="modal-body form">
            <?php echo form_open('admin/produksi/validasi'); ?>
            <table class="table table-bordered table-hover">
              <thead>
                <tr class="info">
                  <th>No</th>
                  <th>Kode Produksi</th>
                  <th>Tanggal</th>
                  <th>Nama Produk</th>
                  <th>Jumlah Produksi</th>
                </tr>
              </thead>
              <tbody id="show_data3">
                
              </tbody>
            </table>
          </div>
          <div class="modal-footer">            
            <button type="submit" class="btn btn-success">Validasi</button>
            <?php echo form_close(); ?>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>


<script>
	function view(id) {
        var b = $('#tb1').DataTable();           
        b.clear().draw();
        b.destroy();
        $.ajax({
            url : "<?php echo site_url('index.php/admin/produksi/get1')?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data){
                var html1 = '';
            	var x;  
            	var no = 1;
                for(x=0; x<data.length; x++){
                    html1 += "<tr>"+                        
                        "<td>"+no+++"</td>"+
                        "<td>"+data[x].kode_produksi+"</td>"+
                        "<td>"+data[x].tanggal+"</td>"+
                        "<td>"+data[x].nama_produk+"</td>"+
                        "<td>"+data[x].total_produksi+"</td>"+
                        "</tr>";
                    }
                $('#show_data').html(html1);
                $('#tb1').DataTable();                  

            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error get data from ajax');
            }
        });
        var a = $('#tb2').DataTable();           
        a.clear().draw();
        a.destroy();
         $.ajax({
            url : "<?php echo site_url('index.php/admin/produksi/get2')?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data){
                var html = '';
                var i;
            	var not = 1;                
                for(i=0; i<data.length; i++){
                    html += "<tr>"+                        
                        "<td>"+not+++"</td>"+                       
                        "<td>"+data[i].nama_bahan+"</td>"+
                        "<td>"+data[i].satuan+"</td>"+                        
                        "<td>"+data[i].total+"</td>"+                        
                        "</tr>";
                    }
                $('#show_data2').html(html);
                $('#tb2').DataTable();
                $('#link').attr('href','<?php echo base_url('admin/produksi/cetak/') ?>' + id);
                $('#modal_detail').modal('show'); // show bootstrap modal when complete loaded                        

            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error get data from ajax');
            }
        }); 
        // $('#modal_detail').modal('show'); // show bootstrap modal when complete loaded                        		
	}

  function validasi(id) {
     $.ajax({
            url : "<?php echo site_url('index.php/admin/produksi/get1')?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data){
                var html1 = '';
              var x;  
              var no = 1;
                for(x=0; x<data.length; x++){
                    html1 += "<tr>"+                        
                        "<td>"+no+++"</td>"+
                        "<td>"+data[x].kode_produksi+"</td>"+
                        "<td>"+data[x].tanggal+"</td>"+
                        "<td>"+data[x].nama_produk+"</td>"+
                        "<td><input type='number' name='id_produksi["+data[x].id+"]' value='"+data[x].total_produksi+"' min='0' max='"+data[x].total_produksi+"' class='form-control'></td>"+
                        "</tr>";
                    }
                $('#show_data3').html(html1);              
                $('#modal_validasi').modal('show'); // show bootstrap modal when complete loaded                        
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error get data from ajax');
            }
        });

  }
</script>