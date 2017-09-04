
<a class="btn btn-xs btn-warning" href="<?php echo base_url().'admin/research/' ?>">Back</a>

<h3>Upload Berkas Penelitian</h3>

<?php echo form_open_multipart('admin/Research/do_upload_multi_penelitian');?>
<div class="form-group">
    <!-- pilih file -->
    <input type="file" name="files[]" id="file" multiple onchange="updateList();" />
    <p class="help-block">Hanya bisa menerima file PDF</p>
    <br/>Selected files:
    <div id="fileList"></div>
</div>
<!-- jika dibutuhkan, pakai bagian ini
<div class="optional" style="display:none;">

    <div class="form-group">
        <label for="judul">Judul Penelitian</label>
        <input type="text" name="judul" id="judul" placeholder="Masukan Judul Penelitian">
    </div>

    <div class="form-group">
        <label for="peneliti">Nama Peneliti</label>
        <input type="text" name="peneliti" id="peneliti" placeholder="Masukan Nama Peneliti">
    </div>
    <div class="form-group">
        <label for="issn">No ISSN</label>
        <input type="text" name="issn" id="issn" placeholder="Masukan No ISSN">
    </div>
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
</div>
                -->

<div class="form-group">
    <label for="tahun">Tahun Penelitian*</label>
    <input type="text" class="form-control" name="tahun" id="tahun" placeholder="Tahun Penelitian" onblur="yearValidation(this.value)"
        required>
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