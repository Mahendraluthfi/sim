<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url() ?>asset/favicon.ico">     
    <title>Faiz Collection</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>asset/bootstrap/dist/css/bootstrap.min.css">
    <link href="<?php echo base_url() ?>asset/css/carousel.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url() ?>asset/datatables.net-bs/css/dataTables.bootstrap.min.css">       
  </head>
<!-- NAVBAR
================================================== -->
  <body>
    <div class="navbar-wrapper">
      <div class="container">

        <div class="navbar navbar-inverse navbar-static-top" role="navigation">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">Faiz Collection</a>
            </div>
            <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li><a href="<?php echo base_url() ?>">Home</a></li>
                <li><a href="<?php echo base_url('produk') ?>">Produk</a></li>
                <li><a href="<?php echo base_url('tentang') ?>">Tentang</a></li>
                <li><a href="<?php echo base_url('kontak') ?>">Kontak</a></li>                
              </ul>
              <form class="navbar-form navbar-right" role="form" action="<?php echo base_url('register/login') ?>" method="POST">
                <?php if (empty($this->session->userdata('member'))) {
                    $this->load->view('signup');
                }else{
                    $this->load->view('loged');
                } ?>
              
              </form>
            </div>
          </div>
        </div>

      </div>
    </div>


    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="item active">
          <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Example headline.</h1>
              <p>Note: If you're viewing this page via a <code>file://</code> URL, the "next" and "previous" Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="data:image/gif;base64,R0lGODlhAQABAIAAAGZmZgAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Another example headline.</h1>
              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="data:image/gif;base64,R0lGODlhAQABAIAAAFVVVQAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>One more for good measure.</h1>
              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div><!-- /.carousel -->



    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">    
      <?php echo $this->session->flashdata('msg'); ?>      
      <?php $this->load->view($content); ?>

      <!-- FOOTER -->
      <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; 2014 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
      </footer>

    </div><!-- /.container -->
    <div class="modal fade" id="modal_form" role="dialog">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h3 class="modal-title">Register Member</h3>
          </div>
          <div class="modal-body form">
            <form action="#" id="form" class="form-horizontal">
                <div class="form-body">                  
                  <div class="form-group">
                      <label class="control-label col-md-3">Username</label>
                      <div class="col-md-9">
                        <input type="text" name="username" class="form-control" placeholder="Username">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-md-3">Password</label>
                      <div class="col-md-9">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-md-3">Nama</label>
                      <div class="col-md-9">
                        <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-md-3">Email</label>
                      <div class="col-md-9">
                        <input type="email" name="email" class="form-control" placeholder="Alamat Email">
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
                </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Daftar</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  <script src="<?php echo base_url() ?>asset/jquery/dist/jquery.min.js"></script>    
  <script src="<?php echo base_url() ?>asset/bootstrap/dist/js/bootstrap.min.js"></script>  
  <script src="<?php echo base_url() ?>asset/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url() ?>asset/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script>
    $('#example').DataTable();      
    function daftar()
    {      
      $('#form')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); // show bootstrap modal      
    }

     function save(){
      var url;            
      url = "<?php echo site_url('index.php/register/daftar')?>";                    
      var x = document.forms["form"]["username"].value;
      var y = document.forms["form"]["password"].value;
      if (x == "") {
        alert("Username Harus Diisi");
        return false;
      }else if(y == ""){
        alert("Password Harus Diisi");
        return false;
      }
      else{      
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
    } 

  </script>
  <!-- <script src="../../assets/js/docs.min.js"></script> -->
  </body>
</html>
