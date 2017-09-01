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
     <?php echo $before_body;?>
</body>

</html>