<?php defined('BASEPATH') or exit('No direct script access allowed');?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>
        <?php echo $page_title;?>
    </title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/sb-admin.css" rel="stylesheet">
    
    <!-- Custom Fonts -->
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url(); ?>assets/css/plugins/morris.css" rel="stylesheet">


    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <?php echo $before_head;?>
</head>

<body>
    <?php
    if ($this->ion_auth->logged_in() and $this->ion_auth->in_group(1, $this->ion_auth->get_user_id())) {
        ?>
<style>



</style>

        <div id="wrapper">
            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#side-navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar" style="background-color: #fff"></span>
                    <span class="icon-bar" style="background-color: #fff"></span>
                    <span class="icon-bar" style="background-color: #fff"></span>
                </button>
                    <a class="navbar-brand" href="<?php echo site_url('admin');?>"><?php echo $this->config->item('cms_title');?></a>
                </div>
                <!-- Top Menu Items -->
                <ul class="nav navbar-right top-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                        <ul class="dropdown-menu message-dropdown">
                            <li class="message-preview">
                                <a href="#">
                                    <div class="media">
                                        <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                        <div class="media-body">
                                            <h5 class="media-heading"><strong></strong>
                                            </h5>
                                            <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                            <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="message-preview">
                                <a href="#">
                                    <div class="media">
                                        <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                        <div class="media-body">
                                            <h5 class="media-heading"><strong>John Smith</strong>
                                            </h5>
                                            <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                            <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="message-preview">
                                <a href="#">
                                    <div class="media">
                                        <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                        <div class="media-body">
                                            <h5 class="media-heading"><strong>John Smith</strong>
                                            </h5>
                                            <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                            <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="message-footer">
                                <a href="#">Read All New Messages</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                        <ul class="dropdown-menu alert-dropdown">
                            <li>
                                <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                            </li>
                            <li>
                                <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                            </li>
                            <li>
                                <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                            </li>
                            <li>
                                <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                            </li>
                            <li>
                                <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                            </li>
                            <li>
                                <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">View All</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $current_user->username ?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="<?php echo site_url('admin/user/logout');?>"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <style>
                    
                    /*-------------------------------*/
                    /*           Wrappers            */
                    /*-------------------------------*/


                    

                    #sidebar-wrapper {
                        z-index: 1000;
                        left: 220px;
                        width: 0;
                        height: 100%;
                        margin-left: -220px;
                        overflow-y: auto;
                        overflow-x: hidden;
                        background: #1a1a1a;
                        -webkit-transition: all 0.5s ease;
                        -moz-transition: all 0.5s ease;
                        -o-transition: all 0.5s ease;
                        transition: all 0.5s ease;
                    }

                    #sidebar-wrapper::-webkit-scrollbar {
                        display: none;
                    }

                    #wrapper.toggled #sidebar-wrapper {
                        width: 220px;
                    }
                    /*-------------------------------*/
                    /*     Sidebar nav styles        */
                    /*-------------------------------*/

                    .sidebar-nav {
                        position: relative;
                        top: 0;
                        left: 0;
                        width: 220px;
                        margin: 0;
                        padding: 0;
                        list-style: none;
                        border-color: transparent;
                    }

                    @media (max-width:1078px){
                        .sidebar-nav{
                            width: 100%;
                            z-index: 10000;
                        }
                        #page-wrapper{
                            margin-top:100px;
                            
                        }

                    }

                   
                    

                    .sidebar-nav li {
                        position: relative;
                        line-height: 20px;
                        display: inline-block;
                        width: 100%;
                    }

                    .sidebar-nav li:before {
                        content: '';
                        position: absolute;
                        top: 0;
                        left: 0;
                        z-index: -1;
                        height: 100%;
                        width: 3px;
                        background-color: #1c1c1c;
                        -webkit-transition: width .2s ease-in;
                        -moz-transition: width .2s ease-in;
                        -ms-transition: width .2s ease-in;
                        transition: width .2s ease-in;
                    }

                    .sidebar-nav li:first-child a {
                        color: #fff;
                        background-color: #1a1a1a;
                    }

                    .sidebar-nav li:nth-child(2):before {
                        background-color: #ec1b5a;
                    }

                    .sidebar-nav li:nth-child(3):before {
                        background-color: #79aefe;
                    }

                    .sidebar-nav li:nth-child(4):before {
                        background-color: #314190;
                    }

                    .sidebar-nav li:nth-child(5):before {
                        background-color: #279636;
                    }

                    .sidebar-nav li:nth-child(6):before {
                        background-color: #7d5d81;
                    }

                    .sidebar-nav li:nth-child(7):before {
                        background-color: #ead24c;
                    }

                    .sidebar-nav li:nth-child(8):before {
                        background-color: #2d2366;
                    }

                    .sidebar-nav li:nth-child(9):before {
                        background-color: #35acdf;
                    }

                    .sidebar-nav li:hover:before,
                    .sidebar-nav li.open:hover:before {
                        width: 100%;
                        -webkit-transition: width .2s ease-in;
                        -moz-transition: width .2s ease-in;
                        -ms-transition: width .2s ease-in;
                        transition: width .2s ease-in;
                    }

                    .sidebar-nav li a {
                        display: block;
                        color: #ddd;
                        text-decoration: none;
                        padding: 10px 15px 10px 30px;
                    }

                    .sidebar-nav li a:hover,
                    .sidebar-nav li a:active,
                    .sidebar-nav li a:focus,
                    .sidebar-nav li.open a:hover,
                    .sidebar-nav li.open a:active,
                    .sidebar-nav li.open a:focus {
                        color: #fff;
                        text-decoration: none;
                        background-color: transparent;
                    }

                    .sidebar-nav>.sidebar-brand {
                        height: 65px;
                        font-size: 20px;
                        line-height: 44px;
                    }

                    .sidebar-nav .dropdown-menu {
                        position: relative;
                        width: 100%;
                        padding: 0;
                        margin: 0;
                        border-radius: 0;
                        border: none;
                        background-color: #222;
                        box-shadow: none;
                    }

                    #page-wrapper {
                        position: relative;
                        
                        min-height: 550px;
                    }
                    @media (min-width:1079px){
                        #page-wrapper {
                            z-index:10000;
                        }
                    }
                </style>
                <!-- Navigasi pinggir -->
                <div class="navbar-collapse collapse" id="side-navbar">
                    <ul class="nav sidebar-nav">
                        <?php echo $menu; ?>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>


            <?php }?>

            <?php
            if ($this->session->flashdata('message')) {
                        ?>
                        <div class="container" style="padding-top:40px;">
                            <div class="alert alert-info alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                                <?php echo $this->session->flashdata('message');?>
                </div>
            </div>
            <?php } ?>