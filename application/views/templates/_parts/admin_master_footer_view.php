</div>
   <!-- jQuery -->
   <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
                $(document).ready(function() {
                    $( '#sidenav li[class="active"]' ).parents().removeClass();
                    $( '#sidenav li > a[href="<?php echo base_url(); ?>' + location.pathname.split("/")[2] + '"]' ).parents().addClass("active");
                });  
            </script>
            <?php echo $before_body;?>
            </body>
            </html>        