</div>
   

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
                jQuery(document).ready(function() {
                    $( '#sidenav li[class="active"]' ).removeClass();
                    $( '#sidenav .side-nav > li > a[href="<?php echo base_url(); ?>admin/' + location.pathname.split("/")[3] + '"]' ).parent().addClass("active");

                    $("#sidenav > ul > li > a.dropdown-toggle ").click(function() {
                        $('#demo').removeClass("in");
                    });
                    
                    
                });  
            </script>
            <?php echo $before_body;?>
            </body>
            </html>        