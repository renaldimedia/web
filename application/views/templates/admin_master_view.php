<?php defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('templates/_parts/admin_master_header_view');?>
    <div id="page-wrapper">
    
                <div class="container-fluid">
                
            <?php echo $the_view_content;?>
            
            
        </div>

    </div>
    <?php $this->load->view('templates/_parts/admin_master_footer_view');?>