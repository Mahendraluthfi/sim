<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistem Informasi Manajemen</title>
  <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url() ?>asset/favicon.ico">     
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url() ?>asset/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>asset/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>asset/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>asset/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>asset/select2/dist/css/select2.min.css">      
  <link rel="stylesheet" href="<?php echo base_url() ?>asset/datatables.net-bs/css/dataTables.bootstrap.min.css">  
  <link rel="stylesheet" href="<?php echo base_url() ?>asset/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <script src="<?php echo base_url() ?>asset/jquery/dist/jquery.min.js"></script>
   <style type="text/css">
    #notifications {
      cursor: pointer;
      position: fixed;
      right: 0px;
      z-index: 9999;
      bottom: 0px;
      margin-bottom: 22px;
      margin-right: 15px;
      min-width: 300px; 
      max-width: 800px;   
    }
  </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url() ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini" style="font-size: 14px; font-family: verdana;">SIM</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg" style="font-size: 11px; font-weight: bold;"><img src="<?php echo base_url() ?>asset/favicon.ico" height="35"> Sistem Informasi Manajemen</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              <img src="<?php echo base_url() ?>asset/dist/img/avatar5.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo "Administrator"; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url() ?>asset/dist/img/avatar5.png" class="img-circle" alt="User Image">
                <p>
                  <?php echo "Administrator"; ?>   
                  <small>Sistem Informasi Manajemen</small>               
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">    
              <div class="pull-left">
                  <a href="#" class="btn btn-default btn-sm btn-flat"><span class="glyphicon glyphicon-cog"></span> Setting</a>
                </div>            
                <div class="pull-right">
                  <a href="<?php echo base_url('admin/login/logout') ?>" class="btn btn-default btn-sm btn-flat"><span class="glyphicon glyphicon-log-out"></span> Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url() ?>asset/dist/img/avatar5.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo "Adminstrator"; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li <?php if ($this->uri->segment(2) == "") {echo "class='active'";} ?>>
          <a href="<?php echo base_url('admin') ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>            
          </a>          
        </li>        
        <li <?php if ($this->uri->segment(2) == "bahanbaku") {echo "class='active'";} ?>>        
          <a href="<?php echo base_url('admin/bahanbaku') ?>">
            <i class="fa fa-cubes"></i> <span>Material</span>            
          </a>
        </li>        
        <li <?php if ($this->uri->segment(2) == "produk") {echo "class='active'";} ?>>
          <a href="<?php echo base_url('admin/produk') ?>">
            <i class="fa fa-briefcase"></i> <span>Produk</span>            
          </a>
        </li>    
        <li <?php if ($this->uri->segment(2) == "produksi") {echo "class='active'";} ?>>
          <a href="<?php echo base_url('admin/produksi') ?>">
            <i class="fa fa-hourglass-half"></i> <span>Produksi</span>            
          </a>
        </li>
        <li <?php if ($this->uri->segment(2) == "penjualan") {echo "class='active'";} ?>>
          <a href="<?php echo base_url('admin/penjualan') ?>">
            <i class="fa fa-shopping-cart"></i> <span>Penjualan</span>            
          </a>
        </li>
         <li <?php if ($this->uri->segment(2) == "member") {echo "class='active'";} ?>>
          <a href="<?php echo base_url('admin/member') ?>">
            <i class="fa fa-users"></i> <span>Member</span>            
          </a>
        </li>
        <li <?php if ($this->uri->segment(2) == "penjahit") {echo "class='active'";} ?>>
          <a href="<?php echo base_url('admin/penjahit') ?>">
            <i class="fa fa-user"></i> <span>Penjahit</span>            
          </a>
        </li>        
        <li <?php if ($this->uri->segment(2) == "upah") {echo "class='active'";} ?>>
          <a href="<?php echo base_url('admin/upah') ?>">
            <i class="fa fa-dollar"></i> <span>Payroll</span>            
          </a>
        </li>                
        <li <?php if ($this->uri->segment(2) == "laporan") {echo "class='active'";} ?>>
          <a href="<?php echo base_url('admin/laporan') ?>">
            <i class="fa fa-file"></i> <span>Laporan</span>            
          </a>
        </li>                
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content -->
    <?php $this->load->view($content); ?>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; #anothernakaproject 2019
  </footer>
  <div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>  

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url() ?>asset/jquery-ui/jquery-ui.min.js"></script>
<script src="<?php echo base_url() ?>asset/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>asset/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="<?php echo base_url() ?>asset/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo base_url() ?>asset/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url() ?>asset/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>asset/dist/js/adminlte.min.js"></script>
<script>
  $('#notifications').slideDown('slow').delay(3000).slideUp('slow');            
  $('#example').DataTable();  
  $('#datepicker').datepicker({
      autoclose: true,
      format : 'yyyy-mm-dd',      
    })  
  $('#datepicker1').datepicker({
      autoclose: true,
      format : 'yyyy-mm-dd',      
    })  
  $('#datepicker2').datepicker({
      autoclose: true,
      format : 'yyyy-mm-dd',      
    })  
  $('#datepicker3').datepicker({
      autoclose: true,
      format : 'yyyy-mm-dd',      
    })  
  // $('select').select2();     

</script>

</body>
</html>
