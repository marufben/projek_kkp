<style>

/*.dataTables_paginate .ui-button {    margin-right: -0.1em !important;}
.paging_full_numbers .ui-button {    color: #333333 !important;    cursor: pointer;    margin: 0;    padding: 2px 6px;}
.dataTables_info {    float: left;    width: 50%;}
.dataTables_info {    padding-top: 3px;}
.dataTables_paginate {    float: right;    text-align: right;}
.dataTables_paginate {    width: auto;}
.paging_full_numbers {    width: 350px !important;}*/

</style>
<div class="row">
    <div class="col-md-12">

        <div class="panel panel-success panel-clean">
            <div class="panel-heading">
                <h4 class="panel-title"><?php echo $title;?></h4>
                <div class="panel-options">
                            <!-- <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                            <a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a> -->
                            <a href="#" data-rel="close"><i class="fa fa-fw fa-times"></i></a>
                </div>
            </div>
            <div class="panel-body">

                <table id="serverside" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No Arsip</th>
                            <th>Tanggal Terbit</th>
                            <th>Tanggal Expired</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
	</div>
</div>

<script type="text/javascript" language="javascript" >
    $(document).ready(function() {
        var dataTable = $('#serverside').DataTable( {
            "processing": true,
            "serverSide": true,
            "ajax":{
                url :"<?php echo base_url(); ?>setupretensi/datatable", // json datasource
                type: "post",  // method  , by default get
                error: function(){  // error handling
                    $(".serverside-error").html("");
                    $("#serverside").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                    $("#serverside_processing").css("display","none");
                    
                }
            }
        } );
    } );
</script>

