<style>
            .well{
                position: relative; top:82px;border: 0px transparent;border-radius: 0;
                background-color:transparent;
                padding:0 0 20px 0;

                            }
            #sidebar > .panel{
                position: relative;border: 0px transparent;border-radius: 0;
                
                background-color: transparent;
                border-left: 3px solid #274260;
                border-radius: 0;

            }                
            #sidebar{
                padding: 13px auto 3px auto !important; 
            }
            #sidebar > .panel >  ul.nav-stacked > li > a{
                background-color: transparent;
                color: #274260;
                border-radius: 0;
            }
            #sidebar > .panel >  ul.nav-stacked > li:hover > a{
                background-color: #274260;
                color: white;
            }
            .well{
            }
            .dl{
                position: absolute;
                opacity: 0.25;
                top:42%;
                left:40%;
            }
            .glyphicon{
                font-size: 5vw; 
                color: whitesmoke;
            }
            .pdf{
                position:relative;
                margin:auto;
                
            }
            .pdf:hover img{
                opacity: 0.1;
            }
            .pdf:hover .dl{
                display: block;
                z-index: 100;
                opacity: 1;
                color: black;
            }
            #page-num{
                position: relative;
                margin: auto;
                
            }
            
        </style>
     
        <div class="container-fluid" style="background-color: white;padding-bottom:4vw;">
            <row style="background-color: white;">
                <div class="col-lg-10 col-md-12" style="background-color: white;text-align:center;">
                    <h2 class="page-header">Download Jurnal Penelitian <?php echo $tahun; //echo $cUrl; ?></h2>
                    <p class="text-info"><?php echo $msg; ?></p>
                    <?php echo ($pagination); ?>
                    <!-- Penampakan jurnal penelitian -->
                    <?php 
                        foreach ($data as $key => $val) : 
                    ?>
                    <row>
                        <row>
                                <div class="col-lg-2 col-md-2"></div>
                                <div class="pdf col-lg-8 col-md-8 col-sm-12 col-xs-12" style="text-align:center;">
                                <h3 class="page-header"></h3>
                                    <a class="" href="<?php echo base_url().'uploads/'.$val['id_file'] ?>" style="text-align:center;">
                                        <img src="<?php echo base_url(); ?>uploads/thumbs/<?php echo $val['thumbnail'] ?>" style="border:1px solid black;width:80%;" alt="<?php echo base_url().'uploads/'.$val['id_file'] ?>"></img>
                                        <span class="dl glyphicon glyphicon-download-alt" style="text-align:center;"><br/>Unduh</span>
                                    </a> 
                                </div>
                                
                        </row>
                        <row>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align:center;margin-top:10px;"><a class="btn btn-default" style="margin:auto;">Download Berkas PDF</a></div>
                        </row>
                    </row>
                        <?php endforeach;
                           
                        ?>
                        <!-- paginasi
                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                                <li>
                                <a href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                                </li>
                                <li><a href="#" name="">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li>
                                <a href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                                </li>
                            </ul>
                        </nav> -->
                    <!-- Penampakan jurnal penelitian ahir -->
                    <div class="col-lg-12 col-md-12"><?php echo ($pagination); ?></div>
                    
                </div>
                <div id="sidebar" class="well col-lg-2 col-md-2 col-sm-12 col-xs-12">
              
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <h4 style="padding-top:15px;">Tahun</h4></div>
                            <ul class="nav nav-pills nav-stacked">

                            <?php
                                // //echo (21 % 2);
                                // //echo $result;
                                // echo $tot;
                                foreach ($list_tahun as $val) : 
                            ?>
                                <li role="presentation"><a href="<?php echo $url.'/tahun/'.$val->tahun_penelitian; ?>">
                                <?php echo $val->tahun_penelitian;?>
                                <?php endforeach; ?>
                    </div>
                </div>
            </row>

        </div>

        
    </div>
    <!-- KONTEN WEBSITE END -->

   