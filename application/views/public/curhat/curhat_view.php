<!--ISI WEBSITE-->

<div class="col-lg-12">
                <!--page header-->
                <div class="page-header">
                        <h2 style="color:#fff;">Curhat</h2>
                        <?php if (!$this->ion_auth->logged_in()) { 
                                echo $login_fb;
                            ?>
                        
                        <?php } else{    
                            echo '<div class="btn btn-success" style="color:#fff;"><a href="#" style="color:#fff;"><span class="glyphicon glyphicon-plus"></span> Curhat Baru   
                            </a></div>';
                            //echo $this->ion_auth->user()->row()->id;
                            
                        }
                       
                        ?> 
                        
                </div>
                    <!--daftar materi-->
                    <row>
                        
                        <div>
                        <ul class="list-group">
                            <a class="list-group-item" href="#">Apa yang menyebabkan kejombloan?
                                <p style="font-size: 10px">Diposting 21 Agustus 2017 oleh Ardi <span class="badge">5 Komentar</span></p>
                            </a>
                        </ul>
                        </div>
                    </row>
                    <!--paginasi/ halaman selanjutnya (jika banyak)
                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            <li>
                                <a href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li><a href="#">1</a></li>
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
                    </nav>
                    -->
                </div>
            