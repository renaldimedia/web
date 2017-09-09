<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
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
    <link href="<?php echo base_url(); ?>assets/css/navbar-public.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/komponen.css">
    <link href="<?php echo base_url(); ?>assets/css/footer.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/slider.css" rel="stylesheet">
    <style>

    </style>
    <!-- script library -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <!-- script library end-->
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php echo $before_head;?>
</head>

<body>
   <!-- NAVBAR Static navbar -->
    
   <nav class="navbar navbar-defaut navbar-static-top">
   <div class="container">
       <!--nav header-->
       <div class="navbar-header">
           <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
       <span class="sr-only">Toggle navigation</span>
       <span class="icon-bar" style="background-color: #fff"></span>
       <span class="icon-bar" style="background-color: #fff"></span>
       <span class="icon-bar" style="background-color: #fff"></span>
     </button>
           <a class="navbar-brand" href="#">LOGO WEB</a>
       </div>
       <!--link navigasi-->
       <div id="navbar" class="navbar-collapse collapse">
           <ul class="nav navbar-nav navbar-default">
               <?php
                       echo $menu;
                       ?>
           </ul>
           <!--link dengan dropdown selesai-->

           <!-- Nav untuk admin (optional) -->
           <?php
           $userId = $this->ion_auth->get_user_id();
           if ($this->ion_auth->logged_in()){
    //echo $this->session->userdata('user_id');
?>
           <ul class="nav navbar-nav navbar-default navbar-right">
               <li class="dropdown multi-level">
                   <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $this->session->userdata( 'username' ); ?> <span class="glyphicon glyphicon-user"></span><span class="caret"></span></a>
                   <ul class="dropdown-menu dropdown-menu-right" role="menu" aria-labelledby="dropdownMenu">
                       <li>
                           <a href="<?php echo base_url(); ?>admin/user/logout">Logout</a>
                       </li>
                       <?php if ($this->ion_auth->in_group(1,$userId)){ ?>
                       <li class="divider"></li>
                       <li><a href="<?php echo base_url(); ?>public/admin/">Password</a>
                       </li>
                       <?php  } ?>
                   </ul>
               </li>
           </ul>
            <?php  } ?>
           <!-- Nav untuk admin end -->

       </div>
       <!--/.nav-collapse -->
   </div>
</nav>
<!-- NAVBAR Static navbar end -->


            <?php
if($this->session->flashdata('message'))
{
?>
            <div class="container" style="padding-top:40px;">
                <div class="alert alert-info alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
aria-hidden="true">&times;</span></button>
                    <?php echo $this->session->flashdata('message');?>
                </div>
            </div>
            <?php
}
?>