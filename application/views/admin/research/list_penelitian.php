<link href="<?php echo base_url('assets/DataTables/datatables.min.css')?>" rel="stylesheet">

<div class="block-table table-sorting clearfix">
    
    <h1 class="page-heading" style="">File Penelitian</h1>

    
    <br />
    <a class="btn btn-xs btn-success" href="<?php echo base_url().'admin/research/add' ?>"><span class="glyphicon glyphicon-plus"></span> Upload File Baru</a>
    <hr>
    <table id="datatables" class="display table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th class="index-no">No</th>
                <th>id_penelitian</th>
                <th>Nama File</th>
                <th>Judul Penelitian</th>
                <th>Tahun</th>
                <th class="actions-column">Aksi</th>
            </tr>
        </thead>
       

        <tfoot>
            <tr> 
                <th class="index-no">No</th>
                <th>id_penelitian</th>
                <th>Nama File</th>
                <th>Judul Penelitian</th>
                <th>Tahun</th>
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
    function format ( d ) {
        // `d` is the original data object for the row
        return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
            '<tr>'+
                '<td>Full name:</td>'+
                '<td>'+d.name+'</td>'+
            '</tr>'+
            '<tr>'+ 
                '<td>Extension number:</td>'+
                '<td>'+d.extn+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td>Extra info:</td>'+
                '<td>And any further details here (images etc)...</td>'+
            '</tr>'+
        '</table>';
    }
        // Datatables
        var t = $('#datatables').DataTable({
            "ajax": "<?php echo base_url() ?>admin/Research/get_json_penelitian", // change this to suit.
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
                    "targets": 5,
                        "render": function(data, type, row, meta){
                        return '<a class="btn btn-xs btn-success" href="<?php echo base_url(); ?>penelitian/edit/' + row[1] + '"><span class="glyphicon glyphicon-pencil"></span> Edit </a><a class="btn btn-xs btn-danger" href="<?php echo base_url(); ?>penelitian/hapus/' + row[1] + '"><span class="glyphicon glyphicon-remove"></span> Hapus</a>';  
                        }
                },
            ],
            "order": [[ 4, 'asc' ]]
            
        });
        t.on( 'order.dt search.dt', function () {
            t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        } ).draw();
        $('#datatables tbody').on('click', 'td.index-no', function () {
        var tr = $(this).closest('tr');
        var row = table.row( tr );
 
        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child( format(row.data()) ).show();
            tr.addClass('shown');
        }
    } );
    });
</script>
<script>
        setTimeout(function() {
            $('.txt-info').fadeOut('fast');
        }, 3000);
    </script>


</div>