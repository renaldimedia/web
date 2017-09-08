<!--ISI WEBSITE-->


<!-- Theme included stylesheets -->
<link href="https://cdn.quilljs.com/1.3.2/quill.bubble.css" rel="stylesheet">
<link href="https://cdn.quilljs.com/1.3.2/quill.snow.css" rel="stylesheet">
<style>
    #deskripsi {
        min-height: 300px;
    }
</style>
<div class="col-lg-12" style="background-color:white;">
    <!--daftar materi-->
    <div id="posting" style="background-color:white;padding-bottom:30px;">
        <div class="page-header">
            <h1>
                <?php echo $data->judul_post; ?> </h1>
            <p class="help-block">Di posting
                <?php echo date("j F Y", strtotime($data->waktu_post)); ?> oleh
                <?php echo $data->username; ?>
            </p>
        </div>

        <div id="deskripsi" class="container" style="margin-bottom:10px;">
        
            <?php echo $data->konten_post; ?>    
       
            
        </div>

        <div id="attachment" class="well" style="">
            <div class="attach">
                <p>Attachment :</p>
                <ul>
                    <?php
                        $count = count($attach);
                    if ($count == 0 or $count ==null) {
                        echo "no attachment";
                    } else {
                        foreach ($attach as $val) {
                            echo '<li><a href="'.base_url().'public/curhat/download_attachment/'.$val->id_file.'">'.$val->nama_file.'</a></li>';
                        }
                    }
                        //var_dump($attach);
                     
                    ?>
                </ul>
            </div>
        </div>
    </div>  
    <hr>    
    <!--box komentar-->
    <row>
    <div id="box-komentar" class="col-lg-6 col-md-6">
       
        <div class="well" style="background-color:#ffffff;padding-bottom:60px">
             <h4>Komentar</h4>
             <?php echo form_open_multipart('public/Curhat/add_komentar/'.$data->id_post);?>
             <div class="form-group">
                <div id="teksKomentar" style="min-height:200px;">
                </div>
                <input name="komentar" id="komentar" type="hidden">     
             </div>
             
             <?php if (!$this->ion_auth->logged_in()) {
                    echo $login_fb;
                } else { ?>
             <button type="submit" class="btn btn-primary pull-right" style="">Komentar!</button>
             <?php } ?>
                 
                </form>
        </div>
                   
    </div>
    </row>
    <!-- komentar -->
    <div class="komen">

        <div class="row">

            <div class="col-lg-12 col-md-12">

                <div class="blog-comment col-lg-12 col-md-12 col-xs-12">
                    <h3 class="text-success">Komentar</h3>
                    <hr/>
                    <ul class="comments">
                        <?php 
                        if (count($komentar) == null OR count($komentar) == 0)
                        {
                            echo "<p class='help-block'>Belum ada komentar</p>";
                        }else{
                        foreach ($komentar as $val): ?>
                         <!--komentar-->
                        <li class="clearfix">
                            <img src="https://bootdey.com/img/Content/user_1.jpg" class="avatar" alt="">
                            <div class="post-comments">
                                <p class="meta"><?php echo date("j F Y", strtotime($val->waktu_komentar)); ?><a href="#"><?php echo $val->username; ?></a> : </p>
                                <p>
                                    <?php echo $val->konten_komentar; ?>
                                </p>
                            </div>
                        </li>
                <?php endforeach;} ?>
                         <!--komentar end-->
                          <!--komentar dengan sub komentar>
                        <li class="clearfix">
                            <img src="https://bootdey.com/img/Content/user_2.jpg" class="avatar" alt="">
                            <div class="post-comments">
                                <p class="meta">Dec 19, 2014 <a href="#">JohnDoe</a> says : <i class="pull-right"><a href="#"><small>Reply</small></a></i></p>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam a sapien odio, sit amet
                                </p>
                            </div>
                            <!--sub komentar>
                            <ul class="comments">
                                <li class="clearfix">
                                    <img src="https://bootdey.com/img/Content/user_3.jpg" class="avatar" alt="">
                                    <div class="post-comments">
                                        <p class="meta">Dec 20, 2014 <a href="#">JohnDoe</a> says : <i class="pull-right"><a href="#"><small>Reply</small></a></i></p>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam a sapien odio, sit amet
                                        </p>
                                    </div>
                                </li>
                            </ul>
                             <!--sub komentar end>
                        </li>
                        <!--komentar dengan sub komentar end-->
                    </ul>
                    <hr/>
                </div>
            </div>
        </div>
    </div>
    <style>
                    .komen {
                        width: 100%;
                    }
                    
                    .post {
                        background-color: whitesmoke;
                        margin-bottom: 10px
                    }
                    
                    hr {
                        margin-top: 20px;
                        margin-bottom: 20px;
                        border: 0;
                        border-top: 1px solid #eee;
                    }

                    #deskripsi .ql-editor{
                        border: 1px solid transparent;
                    }
                    
                    a {
                        color: royalblue;
                        text-decoration: none;
                    }
                    
                    .blog-comment::before,
                    .blog-comment::after,
                    .blog-comment-form::before,
                    .blog-comment-form::after {
                        content: "";
                        display: table;
                        clear: both;
                    }
                    
                    .blog-comment {
                        padding-left: 15%;
                        padding-right: 15%;
                    }
                    
                    .blog-comment ul {
                        list-style-type: none;
                        padding: 0;
                    }
                    
                    .blog-comment img {
                        opacity: 1;
                        filter: Alpha(opacity=100);
                        -webkit-border-radius: 4px;
                        -moz-border-radius: 4px;
                        -o-border-radius: 4px;
                        border-radius: 4px;
                    }
                    
                    .blog-comment img.avatar {
                        position: relative;
                        float: left;
                        margin-left: 0;
                        margin-top: 0;
                        width: 65px;
                        height: 65px;
                    }
                    
                    .blog-comment .post-comments {
                        border: 1px solid #eee;
                        margin-bottom: 20px;
                        margin-left: 85px;
                        margin-right: 0px;
                        padding: 10px 20px;
                        position: relative;
                        -webkit-border-radius: 4px;
                        -moz-border-radius: 4px;
                        -o-border-radius: 4px;
                        border-radius: 4px;
                        background: #fff;
                        color: #6b6e80;
                        position: relative;
                    }
                    
                    .blog-comment .meta {
                        font-size: 13px;
                        color: #aaaaaa;
                        padding-bottom: 8px;
                        margin-bottom: 10px !important;
                        border-bottom: 1px solid #eee;
                    }
                    
                    .blog-comment ul.comments ul {
                        list-style-type: none;
                        padding: 0;
                        margin-left: 85px;
                    }
                    
                    .blog-comment-form {
                        padding-left: 15%;
                        padding-right: 15%;
                        padding-top: 40px;
                    }
                    
                    .blog-comment h3,
                    .blog-comment-form h3 {
                        margin-bottom: 40px;
                        font-size: 26px;
                        line-height: 30px;
                        font-weight: 800;
                    }

    </style>
                <!-- komentar end -->
            </div>
            <hr/>
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.3.0/highlight.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/KaTeX/0.6.0/katex.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.15.0/lodash.min.js"></script>

    <!-- Main Quill library -->
    <script src="https://cdn.quilljs.com/1.3.2/quill.min.js"></script>
    <script>
        $("#file").change(function () {
            if ($("#file").get(0).files.length > 0) {
                $('#fileSelected').show();
                updateList();
            }
        });

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
    <script>
        var quillKomentar = new Quill('#teksKomentar', {
            theme: 'snow'
        });
        // var quill = new Quill('#deskripsi', {
        //     "modules": {
        //         "toolbar": false
        //     },
        //     theme: 'snow'
        // });
        // quill.editor.disable();
        // quill.on('selection-change', function(range, oldRange, source) {
        //     if (range) {
        //       if (range.length == 0) {
        //         //console.log('User cursor is on', range.index);
        //       } else {
        //         var text = quill.getText(range.index, range.length);
        //         //console.log('User has highlighted', text);
        //       }
        //     } else {
        //       //console.log('Cursor not in the editor');
        //     }
        //   });
        //   window.addEventListener("beforeunload", function (e) {
        //     if (window.unsavedChanges) {
        //       e.returnValue = 'Unsaved Changes!';
        //       return 'Unsaved Changes!';
        //     };
        //     return;
        //   });
          
          window.addEventListener("beforeunload", function (e) {
            if (window.unsavedChanges) {
              e.returnValue = 'Unsaved Changes!';
              return 'Unsaved Changes!';
            };
            return;
          });
          
          var syncHtml = _.debounce(function() {
            var contents = $(".ql-editor").html();
            $('#komentar').val(contents);
            console.log(contents);
            window.unsavedChanges = false;
          }, 500);
          
          quillKomentar.on('text-change', function() {
            window.unsavedChanges = true;
            syncHtml();
          });
    </script>


</div>