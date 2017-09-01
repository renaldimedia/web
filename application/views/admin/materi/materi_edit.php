<?php echo $error;?>
<a class="btn btn-xs btn-warning" href="<?php echo $back ?>">Back</a>

<h3>Edit Berkas Materi</h3>

<?php echo form_open_multipart('admin/upload/form_edit_file/'.$data->id_file);?>
    <!-- EDIT NAMA FILE, JIKA BUTUH
    <div class="form-group">
        <label for="namaFile">Nama File</label>
        <input type="text" name="namaFile" class="form-control" id="namaFile" value="<?php //echo $data->nama_file; ?>">
    </div>
-->
<hr>
<div class="form-group">
        <label>Nama File : <?php echo $data->nama_file ?></label>
       
    </div>
    <div id="file-materi">
       
        <div class="form-group">
            <label for="kategori">Mata Kuliah</label>
        
            <select name="kategori" class="form-control" required>
            <?php 
                echo $kategori;
            ?>
            </select>
            
            <p class="help-block">Pilih kategori yang sesuai dengan berkas, supaya dapat tampil di halaman yang sesuai!</p>
        </div>
    </div>


    <div class="form-group">
        <label for="deskripsi">Deskripsi Berkas</label>
        <input type="text" class="form-control" name="deskripsi" placeholder="Masukan Deskripsi File" value="<?php echo $data->deskripsi_file; ?>">
    </div>
    
    <div class="form-group">
        <input class="btn btn-danger" type="submit" value="Edit" />
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

