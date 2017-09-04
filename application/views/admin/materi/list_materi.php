<link href="<?php echo base_url('assets/DataTables/datatables.min.css')?>" rel="stylesheet">

<div class="block-table table-sorting clearfix">
    
    <h1 class="page-heading" style="">Materi Kuliah</h1>

    
    <br />
    <a class="btn btn-xs btn-success" href="<?php echo $urladd ?>"><span class="glyphicon glyphicon-plus"></span> Upload Materi Baru</a>
    <hr>
    <table id="datatables" class="display table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th class="index-no">No</th>
                <th>id_file</th>
                <th>Nama File</th>
                <th>Jurusan</th>
                <th>Mata Kuliah</th>
                <th>Waktu Unggah</th>
                <th>id_materi</th>
                <th class="actions-column">Aksi</th>
            </tr>
        </thead>
       

        <tfoot>
            <tr>
            <th class="index-no">No</th>
                <th>id_file</th>
                <th>Nama File</th>
                <th>Jurusan</th>
                <th>Mata Kuliah</th>
                <th>Waktu Unggah</th>
                <th>id_materi</th>
                <th class="actions-column">Aksi</th>
            </tr>
        </tfoot>
        <tbody>
        </tbody>
    </table>

    <p class="txt-info"><br/><?php echo $this->session->flashdata('msg'); ?></p>
    <script src="<?php echo base_url('assets/DataTables/datatables.min.js')?>"></script>
    
    <script type="text/javascript">
   $(document).ready(function () {
        // Datatables
        var t = jQuery('#datatables').DataTable({
            "ajax": "<?php echo base_url() ?>admin/upload/get_file", // change this to suit.
            "scrollY": 200,
            "scrollCollapse": true,
            "paging": true,
            "responsive": true,
            "columnDefs":[
                {
                    "className": "index-no",
                    "searchable": false,
                    "orderable": false
                },
                {
                    "targets":1,
                    "visible":false,
                    "searchable": false

                },
                {
                    "targets":6,
                    "visible":false,
                    "searchable": false

                },
                {
                    "targets": 7,
                        "render": function(data, type, row, meta){
                        return '<a class="btn btn-xs btn-success" href="<?php echo base_url(); ?>admin/upload/edit_file/' + row[1] + '"><span class="glyphicon glyphicon-pencil"></span> Edit </a><a class="btn btn-xs btn-danger" href="<?php echo base_url(); ?>admin/upload/hapus/' + row[6] + '"><span class="glyphicon glyphicon-remove"></span> Hapus</a>';  
                        }
                },
            ],
            "order": [[ 5, 'asc' ]]
            
        });
        t.on( 'order.dt search.dt', function () {
            t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        } ).draw();
    });
</script>
<script>
        setTimeout(function() {
            $('.txt-info').fadeOut('fast');
        }, 3000);
    </script>


</div>