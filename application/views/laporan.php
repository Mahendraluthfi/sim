<section class="content-header">
  <h1>
    Laporan
    <small>Rekap Laporan</small>    
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>    
    <li class="active">Laporan</li>
  </ol>
</section>

<section class="content">
		<div class="row">
        <div class="col-md-12">         
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Laporan Produksi</a></li>
              <li><a href="#tab_2" data-toggle="tab">Laporan Penjualan</a></li>			              			              
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
              	<?php echo form_open('admin/laporan/produksi', array('class' => 'form-horizontal')); ?>            			
          			<div class="form-group">
          				<label class="control-label col-md-2">Tanggal Awal</label>
          				<div class="col-md-4">
          					<input type="text" name="ta" class="form-control" placeholder="Tanggal Awal" id="datepicker">
          				</div>
          			</div>
          			<div class="form-group">
          				<label class="control-label col-md-2">Tanggal Akhir</label>
          				<div class="col-md-4">
          					<input type="text" name="tb" class="form-control" placeholder="Tanggal Akhir" id="datepicker1">
          				</div>
          			</div>
          			<div class="form-group">
          				<div class="col-sm-10 col-sm-offset-2">
          					<button type="submit" class="btn btn-primary">Tampilkan</button>
          				</div>
          			</div>
              	</form>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">              	
              	<?php echo form_open('admin/laporan/penjualan', array('class' => 'form-horizontal')); ?>            			
          			<div class="form-group">
          				<label class="control-label col-md-2">Tanggal Awal</label>
          				<div class="col-md-4">
          					<input type="text" name="ta" class="form-control" placeholder="Tanggal Awal" id="datepicker2">
          				</div>
          			</div>
          			<div class="form-group">
          				<label class="control-label col-md-2">Tanggal Akhir</label>
          				<div class="col-md-4">
          					<input type="text" name="tb" class="form-control" placeholder="Tanggal Akhir" id="datepicker3">
          				</div>
          			</div>
          			<div class="form-group">
          				<div class="col-sm-10 col-sm-offset-2">
          					<button type="submit" class="btn btn-primary">Tampilkan</button>
          				</div>
          			</div>
              	</form>              
              </div>
              <!-- /.tab-pane -->			              			              
            </div>
            
          </div>
          
        </div>			        
      </div>				
</section>