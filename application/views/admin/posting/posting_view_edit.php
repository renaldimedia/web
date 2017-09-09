<!--ISI WEBSITE-->


<!-- Theme included stylesheets -->
<link href="https://cdn.quilljs.com/1.3.2/quill.bubble.css" rel="stylesheet">
<link href="https://cdn.quilljs.com/1.3.2/quill.snow.css" rel="stylesheet">
<style>
    #deskripsi{
        min-height:300px;
    }
</style>
<div class="col-lg-12" style="background-color:white;">
    <!--page header-->
        <a class="btn btn-xs btn-warning" href="<?php echo $back; ?>">Back</a>
        <h2 class="page-header" style="color:#000;margin-top:15px;">Edit Post <?php echo $page_title; ?></h2>


    <!--daftar materi-->
    <div style="background-color:white;">
        <?php echo form_open_multipart('admin/posting/edit_post/'.$id);?>
    
        <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" class="form-control" name="judul" id="judul" value="<?php echo $judul; ?>">
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <div id="deskripsi">
                <?php echo $teks; ?>
            </div>
            
        </div>
      
        <div class="form-group">
        <input name="teks" id="teks" type="hidden" value="<?php echo $teks; ?>">     
            <button class="btn btn-primary" type="submit">Tambah Post</button>
        </div>         
       
</form>
        <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.3.0/highlight.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/KaTeX/0.6.0/katex.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.15.0/lodash.min.js"></script>

       <!-- Main Quill library -->
        <script src="https://cdn.quilljs.com/1.3.2/quill.min.js"></script>
        <script>
           
        </script>
        <script>
            var toolbarOptions = [
                ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
                ['blockquote', 'code-block'],
              
                [{ 'header': 1 }, { 'header': 2 }],               // custom button values
                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
                [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
                [{ 'direction': 'rtl' }],                         // text direction
              
                [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
                [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
              
                [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
                [{ 'font': [] }],
                [{ 'align': [] }],
              
                ['clean']                                         // remove formatting button
              ];
                var quill = new Quill('#deskripsi', {
                  modules: {
                      toolbar: toolbarOptions
                  },  
                  theme: 'snow'
                });
              quill.on('selection-change', function(range, oldRange, source) {
                if (range) {
                  if (range.length == 0) {
                    //console.log('User cursor is on', range.index);
                  } else {
                    var text = quill.getText(range.index, range.length);
                    //console.log('User has highlighted', text);
                  }
                } else {
                  //console.log('Cursor not in the editor');
                }
              });
              window.unsavedChanges = false;
              
              window.addEventListener("beforeunload", function (e) {
                if (window.unsavedChanges) {
                  e.returnValue = 'Unsaved Changes!';
                  return 'Unsaved Changes!';
                };
                return;
              });
              
              var syncHtml = _.debounce(function() {
                var contents = $(".ql-editor").html();
                $('#teks').val(contents);
                console.log(contents)
                window.unsavedChanges = false;
              }, 500);
              
              quill.on('text-change', function() {
                window.unsavedChanges = true;
                syncHtml();
              });
                       
        </script>
    </div>
 
    </div>