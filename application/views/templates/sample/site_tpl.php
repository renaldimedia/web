<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>assets/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url(); ?>assets/css/plugins/morris.css" rel="stylesheet">
    
    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <!-- Custom Fonts -->
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
</head>


<body>

    <div id="wrapper">

        <!-- Navigation -->
       
            <!-- Top Menu Items -->
            <?php echo $this->load->view($header); ?>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php echo $this->load->view($left_content); ?>
            <script>
                $(document).ready(function() {
                    $( '#sidenav li[class="active"]' ).parents().removeClass();
                    $( '#sidenav li > a[href="<?php echo base_url(); ?>' + location.pathname.split("/")[2] + '"]' ).parents().addClass("active");
                });  
            </script>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">
				<?php echo $this->load->view($content); ?>
                <!-- Page Heading -->
               
                <!-- /.row -->

               
                <!-- /.row -->

               

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/morris/raphael.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/morris/morris.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/morris/morris-data.js"></script>
    
</body>

</html>
