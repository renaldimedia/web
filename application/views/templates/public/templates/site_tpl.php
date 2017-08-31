<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="Renaldi Media">

    <title>Template Front</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans|Work+Sans" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css">
    <!-- Custom styles for this template -->

    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/komponen.css">
    <link href="<?php echo base_url(); ?>assets/css/footer.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/slider.css" rel="stylesheet">
    <style>

    </style>
    <!-- script library -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
    <script>
        window.jQuery || document.write('<script src="<?php echo base_url(); ?>assets/js/jquery.js"><\/script>')
    </script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <!-- script library end-->
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    
   
   <?php echo $this->load->view($header); ?>
    <div class="container-fluid" style="width:100%;padding:auto auto auto auto;">
        <div class="konten">
                
            <?php echo $this->load->view($content); ?>
            
            
        </div>

    </div>
    <!-- KONTEN WEBSITE END -->

    <!-- footer -->
    <footer id="myFooter">
        <div class="container">
            <p class="footer-copyright">Website © 2017 Renaldi Media</p>
            <!-- Keterangan login sebagai user/admin -->
            <!-- Jika login maka akan tampil ini! -->
            <!--
            <p class="login-as">Login as Admin <a href="#" class="btn btn-danger btn-xs" style="font-size: 14px;color: white">Logout</a> ?</p> 
            -->
            <!-- Jika tidak login akan tampil ini! -->
            <!--
            <p class="login-as"><a href="#" class="btn btn-xs" style="font-size: 14px;color: white">Login Admin</a> ?</p>
            -->
        </div>
        <div class="footer-social">
            <a href="#" class="social-icons"><i class="fa fa-facebook"></i></a>
            <a href="#" class="social-icons"><i class="fa fa-google-plus"></i></a>
            <a href="#" class="social-icons"><i class="fa fa-twitter"></i></a>
        </div>
    </footer>
    <!-- footer end -->
    <script>
                $(document).ready(function() {
                    $( '#navbar li[class="active"]' ).parents().removeClass();
                    $( '#navbar li > a[href="<?php echo base_url(); ?>' + location.pathname.split("/")[2] + '"]' ).parents().addClass("active");
                });  
            </script>
</body>

</html>
