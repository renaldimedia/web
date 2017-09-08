<!--ISI WEBSITE-->

<div class="col-lg-12">
                <!--page header-->
                <div class="page-header">
                        <h2 style="color:#fff;">Curhat</h2>
                        <?php echo $button ?> 
                        
                </div>
                    <!--daftar materi-->
                    <row>
                        
                        <div>
                        <ul class="list-group">
                            <?php foreach ($data as $val): ?>
                            <a class="list-group-item" href="<?php echo base_url().'public/curhat/detail/'.$val->id_post; ?>"><?php echo $val->judul_post ?>
                                <p style="font-size: 10px">Diposting 21 Agustus 2017 oleh Ardi <span class="badge"><?php echo $count_komentar[$val->id_post]; ?> Komentar</span></p>
                            </a>
                            <?php endforeach; ?>
                        </ul>
                        </div>
                        <?php echo $pagination; ?>
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
            