
<a class="btn btn-xs btn-warning" href="<?php echo base_url().'admin/research/' ?>">Back</a>

<h3 class="page-heading">Edit Berkas Penelitian </h3>

<?php echo form_open_multipart('admin/research/form_edit_penelitian');?>
<div class="form-group">
    <label for="tahun">Tahun Penelitian</label>
    <input type="text" class="form-control" name="tahun" id="tahun" placeholder="Tahun Penelitian" onblur="yearValidation(this.value)" value="<?php echo $data->tahun_penelitian ?>">
</div>
<!--  DETAILS -->
<div class="optional" style="">

    <div class="form-group">
        <label for="judul">Judul Penelitian</label>
        <input type="text" name="judul" class="form-control" id="judul" placeholder="Masukan Judul Penelitian" value="<?php echo $data->judul_penelitian ?>">
    </div>

    <div class="form-group">
        <label for="peneliti">Nama Peneliti</label>
        <input type="text" name="peneliti" class="form-control" id="peneliti" placeholder="Masukan Nama Peneliti" value="<?php echo $data->nama_peneliti ?>">
    </div>
    <div class="form-group">
        <label for="issn">No ISSN</label>
        <input type="text" name="issn" class="form-control" id="issn" placeholder="Masukan No ISSN" value="<?php echo $data->no_issn ?>">
    </div>
    <div class="form-group">
        <label for="instansi">Instansi</label>
        <input type="text" name="instansi" class="form-control" id="instansi" placeholder="Masukan Nama Instansi" value="<?php echo $data->instansi ?>">
    </div>
    <div class="form-group">
        <label for="publisher">Penerbit</label>
        <input type="text" name="publisher" class="form-control" id="publisher" placeholder="Masukan Nama Penerbit" value="<?php echo $data->publisher ?>">
    </div>
    <div class="form-group">
        <label for="volume">Volume</label>
        <input type="text" name="volume" class="form-control" id="volume" placeholder="Volume terbitan" <?php echo $data->volume ?>>
    </div>
    <!-- rename after upload
    <div class="form-group">
        <input type="checkbox" name="rename" id="rename" value="rename">
        <label for="rename"> Ubah nama file setelah upload</label>

        <div class="form-group namaAdd">

            <label for="namaAdd">Nama File Tambahan</label>
            <input type="text" class="form-control" id="namaAdd" name="namaAdd" placeholder="Masukan nama tambahan">
            <p class="help-block">Nama tambahan bisa jadi Bab atau Sub-bab pada mata kuliah</p>
            <hr>
            <div class="rename-hint">

                <p class="help-block">Format nama akan diubah menjadi {kategori}_{no urut file}_{Jenjang}_{Semester}_{Matkul}_{nama tambahan}.{ekstensi
                    file}</p>
                <p class="help-block">Contoh, Materi_1_S1_Genap_Bisnis_Bab1.pdf</p>
            </div>
        </div>
    </div>
                -->
</div>

<p class="bg-info">
    <?php echo $this->session->flashdata('msg'); ?>
</p>
<script>
    function yearValidation(year) {
        var text = /^[0-9]+$/;
        if (year > 0) {
            if ((year != "") && (!text.test(year))) {

                alert("Please Enter Numeric Values Only");
                return false;
            }

            if (year.length < 4) {
                alert("Year is not proper. Please check");
                return false;
            }
            var current_year = new Date().getFullYear();
            if ((year < 1920) || (year > current_year)) {
                alert("Year should be in range 1920 to current year");
                return false;
            }
            return true;
        }
</script>
<script>
    setTimeout(function () {
        $('.bg-info').fadeOut('fast');
    }, 3000);

    $('#rename').click(function () {
        if ($(this).is(':checked')) {
            $(".namaAdd").show(1000);

        } else {
            $(" .namaAdd").hide(1000);
        }
    });
</script>

<br /><br />
<div class="form-group">
    <input class="btn btn-danger" type="submit" value="upload" />
</div>

</form>
<script>
    function updateList() {
        var input = document.getElementById('file');
        var output = document.getElementById('fileList');

        output.innerHTML = '<ul>';
        for (var i = 0; i < input.files.length; ++i) {
            output.innerHTML += '<li>' + input.files.item(i).name + '</li>';
        }
        output.innerHTML += '</ul>';
    }
</script>