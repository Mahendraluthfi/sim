<h3>Profil</h3>
<hr>
<div class="row">
	<div class="col-sm-6 col-md-6 col-lg-6">
			<?php echo form_open('profil/save', array('class' => 'form-horizontal')); ?>		            
                <div class="form-body">                  
                  <div class="form-group">
                      <label class="control-label col-md-3">Username</label>
                      <div class="col-md-9">
                        <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $get->username ?>">
                      </div>
                  </div>                  
                  <div class="form-group">
                      <label class="control-label col-md-3">Nama</label>
                      <div class="col-md-9">
                        <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="<?php echo $get->nama_member ?>">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-md-3">Email</label>
                      <div class="col-md-9">
                        <input type="email" name="email" class="form-control" placeholder="Alamat Email" value="<?php echo $get->email ?>">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-md-3">Alamat</label>
                      <div class="col-md-9">
                        <textarea name="alamat" class="form-control" placeholder="Alamat Lengkap. Jalan/Kecamatan/Kota/Kodepos"><?php echo $get->alamat ?></textarea>
                      </div>
                  </div>                             
                  <div class="form-group">
                      <label class="control-label col-md-3">Telepon</label>
                      <div class="col-md-9">
                        <input type="text" name="telepon" class="form-control" placeholder="Nomor Telepon" value="<?php echo $get->telepon ?>">
                      </div>
                  </div>                                               
                  <div class="form-group">
                      <label class="control-label col-md-3"></label>
                      <div class="col-md-9">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                      </div>
                  </div>                                               
                </div>
            </form>
	</div>
</div>