<h3 class="page-header">Selamat Datang <?php  echo $current_user->username; ?></h3>
<row><div class="col-lg-2"></div>
<div class="col-lg-8">

<div class="well" style="text-align:center;">
<h4>Pilih Sub kategori posting!</h4>

<a href="<?php echo $urlkarir ?>" class="btn btn-default jumbotron">Karir</a>
<a href="<?php echo $urlberita ?>" class="btn btn-default jumbotron">Berita</a>
<a href="<?php echo $urltugas ?>" class="btn btn-default jumbotron">Tugas</a>
<a href="<?php echo $urlcurhat ?>" class="btn btn-default jumbotron">Curhat</a>

</div>
<style>

    div.well > a.btn:hover{
        font-size:120%;
    }

</style>
</div>
<div class="col-lg-2"></div>
</row>