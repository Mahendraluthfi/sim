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
										<button type="button" class="btn btn-primary btn-sm" onclick="detail('<?php echo $key->kode_penjualan ?>')" title="Detail"><i class="glyphicon glyphicon-zoom-in"></i></button>
										<?php if ($key->ongkir == '0') { ?>
										<button type="button" class="btn btn-warning btn-sm" onclick="ongkir('<?php echo $key->kode_penjualan ?>','<?php echo $key->id_member ?>')" title="Ongkos Kirim"><i class="fa fa-truck"></i></button>
										<?php } ?>
										<?php if ($key->sts == 'MENUNGGU PEMBAYARAN' || $key->sts == 'KONFIRMASI PEMBAYARAN') { ?>
										<button type="button" class="btn btn-warning btn-sm" title="Cek Pembayaran" onclick="bayar('<?php echo $key->kode_penjualan ?>')"><i class="fa fa-dollar"></i></button>
										<?php } ?>										
										<?php if ($key->sts !== 'DIKIRIM') { ?>
										<a href="<?php echo base_url('admin/penjualan/hapus/'.$key->kode_penjualan) ?>" class="btn btn-danger btn-sm" title="Hapus" onclick="return confirm('Hapus Pemesanan ?')"><i class="fa fa-trash"></i></a>
										<?php } ?>
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
            <h3 class="modal-title"></h3>
          </div>
          <div class="modal-body form">

          	<table class="table table-bordered table-hover" id="tb1">
          		<thead>
          			<tr class="info">
          				<th>No</th>
          				<th>Nama Produk</th>
          				<th>Harga</th>
          				<th>Jumlah</th>
          				<th>Total</th>
          			</tr>
          		</thead>
          		<tbody id="show_data">
          			
          		</tbody>
          	</table>          
          </div>
          <div class="modal-footer">            
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>

<div class="modal fade" id="modal_ongkir" role="dialog">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h3 class="modal-title">Input Ongkos Kirim</h3>
          </div>
          <div class="modal-body form">
          	 <form action="#" id="form" class="form-horizontal">
	                <div class="form-body">                            
	                  <div class="form-group">
	                      <label class="control-label col-md-3">Nama</label>
	                      <div class="col-md-9">
	                        <p class="form-control-static nama"></p>
	                      </div>
	                  </div>	                
	                  <div class="form-group">
	                      <label class="control-label col-md-3">Alamat</label>
	                      <div class="col-md-9">
	                        <p class="form-control-static alamat"></p>                        
	                      </div>
	                  </div>                             
	                  <div class="form-group">
	                      <label class="control-label col-md-3">Ongkir</label>
	                      <div class="col-md-9">
	                        <input type="number" name="ongkir" class="form-control" min="1">
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

<div class="modal fade" id="modal_bayar" role="dialog">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h3 class="modal-title"></h3>
          </div>
          <div class="modal-body form">
          	 <?php echo form_open('', array('class' => 'form-horizontal')); ?>
	                <div class="form-body">                            
	                  <div class="form-group">
	                      <label class="control-label col-md-3">Kode Penjualan</label>
	                      <div class="col-md-9">
	                        <p class="form-control-static kode"></p>
	                      </div>
	                  </div>	                
	                  <div class="form-group">
	                      <label class="control-label col-md-3">Tanggal</label>
	                      <div class="col-md-9">
	                        <p class="form-control-static tanggal"></p>                        
	                      </div>
	                  </div>                             
	                  <div class="form-group">
	                      <label class="control-label col-md-3">Total</label>
	                      <div class="col-md-9">
	                        <p class="form-control-static total"></p>
	                      </div>
	                  </div>                                               
	                  <div class="form-group">
	                      <label class="control-label col-md-3">Nomor Rekening</label>
	                      <div class="col-md-9">
	                        <p class="form-control-static norek"></p>	                        
	                      </div>
	                  </div>                                               
  	                  <div class="form-group">
	                      <label class="control-label col-md-3">Atas Nama</label>
	                      <div class="col-md-9">
	                        <p class="form-control-static atasnama"></p>	                                               
	                      </div>
	                  </div>                                               
  	                  <div class="form-group">
	                      <label class="control-label col-md-3">Nominal</label>
	                      <div class="col-md-9">
	                        <p class="form-control-static nominal"></p>	                        
	                      </div>
	                  </div>                                               
  	                  <div class="form-group">
	                      <label class="control-label col-md-3">Foto</label>
	                      <div class="col-md-9">
	                        <img src="" alt="" height="150" class="gambar">
	                      </div>
	                  </div>                                               
	                </div>
	            </form>        
          </div>
          <div class="modal-footer">            
            <a href="" class="btn btn-primary kirim" onclick="return confirm('Kirim Produk ?')">Kirim Produk</a>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>


<script>
	function detail(id) {
		var b = $('#tb1').DataTable();           
        b.clear().draw();
        b.destroy();
        $.ajax({
            url : "<?php echo site_url('index.php/admin/penjualan/get')?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data){
                var html1 = '';
            	var x;  
            	var no = 1;
                for(x=0; x<data.length; x++){
                    html1 += "<tr>"+                        
                        "<td>"+no+++"</td>"+
                        "<td>"+data[x].nama_produk+"</td>"+
                        "<td>"+data[x].harga+"</td>"+
                        "<td>"+data[x].jml+"</td>"+
                        "<td>"+data[x].sub+"</td>"+
                        "</tr>";
                    }
                $('.modal-title').text(id);
                $('#show_data').html(html1);
                $('#tb1').DataTable();                  
                $('#modal_detail').modal('show');
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error get data from ajax');
            }
        });
	}

	function ongkir(id,member) {
	  gid = id;
      $('#form')[0].reset(); // reset form on modals
        $.ajax({
        url : "<?php echo site_url('index.php/admin/penjualan/get1')?>/" + member,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            // $('#kabkot').trigger('change');  
            $('.nama').text(data.nama_member);
            $('.alamat').text(data.alamat);
            $('#modal_ongkir').modal('show'); // show bootstrap modal when complete loaded            

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
      });
	}

	function save(){
      var url;            
      url = "<?php echo site_url('index.php/admin/penjualan/save_ongkir/')?>" + gid;         
      
       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               //if success close modal and reload ajax table
               $('#modal_ongkir').modal('hide');
              location.reload();// for reload a page
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
      }    

      function bayar(id) {
	  	 gid = id;      	
      	 $.ajax({
            url : "<?php echo site_url('index.php/pemesanan/get1')?>/" + gid,
            type: "GET",
            dataType: "JSON",
            success: function(data){
	            $('.kode').text(gid);                		
	            $('.tanggal').text(data.date);                		
	            $('.total').text(data.total);                		
	            $('.norek').text(data.no_rekening);                		
	            $('.atasnama').text(data.atas_nama);                		
	            $('.nominal').text(data.nominal);                		
	            $('.gambar').attr('src','<?php echo base_url('asset/foto/') ?>'+data.foto);                		
	            $('.kirim').attr('href','<?php echo base_url('admin/penjualan/kirim/') ?>'+gid);                			
                $('.modal-title').text('Konfirmasi Pembayaran '+gid);                
    			$('#modal_bayar').modal('show'); // show bootstrap modal when complete loaded                    
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error get data from ajax');
            }
        });   
      }
      
</script>