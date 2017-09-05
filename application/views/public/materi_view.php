<!--ISI WEBSITE-->
<style>
    .dataTables_scroll
{
    overflow-y:scroll;
}
</style>

<div class="container-fluid" style="padding: auto 5px auto 5px">
    <row>
<div class="col-lg-12">
    <!--page header-->
    
        <row>
            <h2 style="color:#fff;font-size:2em;">Download</h2>
<?php 
     //echo "<pre>";
     //print_r($this->session->all_userdata());
     //echo $this->ion_auth->logged_in();
     //echo $this->ion_auth->in_group('adminis');
    // echo "</pre>";
     
     //echo $this->ion_auth->in_group(2);
?>
            <hr>
        </row>
        <!--daftar materi-->
        <link href="<?php echo base_url('assets/DataTables/datatables.min.css')?>" rel="stylesheet">

        <div class="block-table table-sorting clearfix" style="background-color:white;width:100%;max-height:500px;overflow-y:scroll;">
            <br/>
            <table id="datatables" class="display responsive nowrap table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="index-no">No</th>
                        <th>id_file</th>
                        <th>Nama File</th>
                        <th>Jurusan</th>
                        <th>Semester</th>
                        <th>Mata Kuliah</th>
                        <th>Waktu Unggah</th>
                        <th class="actions-column">Aksi</th>
                    </tr>
                </thead>


                <tfoot>
                    <hr>
                </tfoot>
                <tbody>
                </tbody>
            </table>

            <p class="txt-info"><br/>
                <?php echo $this->session->flashdata('msg'); ?>
            </p>
            
            <script src="<?php echo base_url('assets/DataTables/datatables.min.js')?>"></script>

            <script type="text/javascript">
                $(document).ready(function () {
                    function cek_param(section){
                        if (location.pathname.split("/")[section] !== null){
                            return location.pathname.split("/")[section];
                        }else{
                            return "";
                        }
                    }
                    var jurusan = cek_param(3);
                    var semester = cek_param(4);
                    var matkul = cek_param(5);
                    jQuery('.dataTable').wrap('<div class="dataTables_scroll" />');
                    // Datatables
                    var t = jQuery('#datatables').DataTable({
                        "ajax": "<?php echo base_url() ?>public/materi/get_file", // change this to suit.
                        //"scrollY": 200,
                        "scrollCollapse": true,
                        "paging": true,
                        "responsive": true,
                        "columns": [
                            { responsivePriority: 2 },
                            { responsivePriority: 6 },
                            { responsivePriority: 1 },
                            { responsivePriority: 4 },
                            { responsivePriority: 3 },
                            { responsivePriority: 5 },
                            { responsivePriority: 7 },
                            { responsivePriority: 1 }
                        ],  
                        "columnDefs": [{
                                "className": "index-no",
                                "searchable": false,
                                "orderable": false
                            },
                            {
                                "targets": 1,
                                "visible": false,
                                "searchable": false

                            },
                            {
                                "targets": 1,
                                "visible": false,
                                "searchable": false

                            },
                            {
                                "targets": 7,
                                "render": function (data, type, row, meta) {
                                    return '<a class="btn btn-xs btn-success" href="<?php echo base_url(); ?>materi/download_file/' +
                                        row[2] +
                                        '"><span class="glyphicon glyphicon-pencil"></span> Download </a>';
                                }
                            },
                        ],
                        
                        "searchCols": [
                            null,
                            null,
                            null,
                            { "search": cek_param(3) },
                            { "search": cek_param(4) },
                            { "search": cek_param(5) },
                            null,
                            null
                        ],
                        "order": [
                            [6, 'asc']
                        ],
                        

                    });
                    t.on('order.dt search.dt', function () {
                        t.column(0, {
                            search: 'applied',
                            order: 'applied'
                        }).nodes().each(function (cell, i) {
                            cell.innerHTML = i + 1;
                        });
                    }).draw();
                });
            </script>

        </div>
        <!--paginasi/ halaman selanjutnya (jika banyak)-->

    </div>
</div>
</row>
</div>
