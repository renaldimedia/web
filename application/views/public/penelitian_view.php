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
            
        </style>
     
        <div class="container-fluid" style="background-color: white;padding-bottom:4vw;">
            <row style="background-color: white;">
                <div class="col-lg-10" style="background-color: white;">
                    <h2 class="page-header">Download Jurnal Penelitian <?php echo $tahun; ?></h2>
                    <!-- Penampakan jurnal penelitian -->
                    <?php 
                        foreach ($data as $val) : 
                    ?>
                    <row>
                        <row>
                                <div class="col-lg-2 col-md-2"></div>
                                <div class="pdf col-lg-8 col-md-8 col-sm-12 col-xs-12" style="text-align:center;">
                                <h3 class="page-header"></h3>
                                    <a class="" href="<?php echo base_url().'uploads/'.$val->id_file ?>" style="text-align:center;">
                                        <img src="<?php echo base_url(); ?>uploads/thumbs/<?php echo $val->thumbnail ?>" style="border:1px solid black;" alt="<?php echo base_url().'uploads/'.$val->id_file ?>"></img>
                                        <span class="dl glyphicon glyphicon-download-alt" style="text-align:center;"><br/>Unduh</span>
                                    </a> 
                                </div>
                        </row>
                        <row>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align:center;margin-top:10px;"><a class="btn btn-default" style="margin:auto;">Download Berkas PDF</a></div>
                        </row>
                    </row>
                        <?php endforeach; ?>
                    <!-- Penampakan jurnal penelitian ahir -->
                </div>
                <div id="sidebar" class="well col-lg-2 col-md-2 col-sm-12 col-xs-12">
              
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <h4 style="padding-top:15px;">Tahun</h4></div>
                            <ul class="nav nav-pills nav-stacked">
                            <?php 
                                foreach ($list_tahun as $val) : 
                            ?>
                                <li role="presentation"><a href="<?php echo $url.'/'.$val->tahun_penelitian; ?>"><?php echo $val->tahun_penelitian; ?></a></li>
                                <?php endforeach; ?>
                    </div>
                </div>
            </row>

        </div>

        
    </div>
    <!-- KONTEN WEBSITE END -->

   