<style>
    .namaAdd{
        display: none;
    }
</style>
<?php echo $error;?>
<a class="btn btn-xs btn-warning" href="<?php echo $back ?>">Back</a>

<h3>Upload Berkas Materi</h3>

<?php echo form_open_multipart('admin/upload/do_upload_multi');?>
    <div class="form-group">
    <!-- pilih file -->
    <input type="file" name="files[]" id="file" multiple onchange="updateList();"/>
        <br/>Selected files:
        <div id="fileList"></div>
    </div>


    <div id="file-materi">
       
        <div class="form-group">
            <label for="kategori">Mata Kuliah*</label>
        
            <select name="kategori" class="form-control" required>
            <?php 
                foreach ($kategori as $key => $data): 
            ?>
                <optgroup label="<?php echo $data->nama_jurusan; ?>">
                    <option value="<?php echo $data->id_matkul_semester ?>" id="matkul-<?php echo $data->nama_matkul; ?>"><?php echo $data->nama_matkul ?></option>    
                </optgroup>
                
        
                <?php endforeach; ?>
            </select>
            
            <p class="help-block">Pilih kategori yang sesuai dengan berkas, supaya dapat tampil di halaman yang sesuai!</p>
        </div>
    </div>


    <div class="form-group">
        <label for="deskripsi">Deskripsi Berkas</label>
        <input type="text" class="form-control" name="deskripsi" placeholder="Masukan Deskripsi File">
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
            
            <p class="help-block">Format nama akan diubah menjadi {kategori}_{no urut file}_{Jenjang}_{Semester}_{Matkul}_{nama tambahan}.{ekstensi file}</p>
            <p class="help-block">Contoh, Materi_1_S1_Genap_Bisnis_Bab1.pdf</p>
            </div>
            
    </div>
    <div class="form-group">
        <input class="btn btn-danger" type="submit" value="upload" />
    </div>
    <p class="bg-info"><?php echo $this->session->flashdata('msg'); ?></p>
    <script>
        setTimeout(function() {
            $('.bg-info').fadeOut('fast');
        }, 3000);
        
        $('#rename').click(function() {
            if( $(this).is(':checked')) {
                $(".namaAdd").show(1000);

            } else {
                $(" .namaAdd").hide(1000);
            }
        }); 
    </script>
    
<br /><br />


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

