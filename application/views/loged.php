    <div class="btn-group">
      <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
        <?php echo $this->session->userdata('nama'); ?> <span class="caret"></span>
      </button>
      <ul class="dropdown-menu" role="menu">
        <li><a href="<?php echo base_url('profil') ?>"><i class="glyphicon glyphicon-user"></i> Profil</a></li>
        <li><a href="<?php echo base_url('shoppingcart') ?>"><i class="glyphicon glyphicon-shopping-cart"></i> Shopping Cart <span class="badge"><?php echo $this->session->userdata('count'); ?></span></a></li>
        <li><a href="<?php echo base_url('pemesanan') ?>"><i class="glyphicon glyphicon-saved"></i>Pemesanan</a></li>
        <li class="divider"></li>
        <li><a href="register/logout"><i class="glyphicon glyphicon-log-out"></i> Logout</a></li>
      </ul>
    </div>  