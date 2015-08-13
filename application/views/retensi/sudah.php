<div class="row">
    <div class="col-md-12">

        <div class="panel panel-success panel-clean">
            <div class="panel-heading">
                        <h4 class="panel-title"><?php echo $title;?></h4>
                <div class="panel-options">
                            <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                            <a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a>
                            <a href="#" data-rel="close"><i class="fa fa-fw fa-times"></i></a>
                </div>
            </div>
            <div class="panel-body">
                <!-- <a class="btn btn-primary" href="<?php echo base_url();?>setupretensi/create">
                    <i class="icon-plus-sign"></i>
                    Tambah
                </a> -->
                <hr>

                <table id="sudah-retensi" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>
                                No
                            </th>
                            <th>
                                Kode Arsip
                            </th>
                            <th>
                                Dasar Hukum
                            </th>
                            <th>
                                Expired
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        foreach ($sudah as $key => $value) {
                        ?>
                        <tr>
                            <td>
                                <?php echo ($no+1); ?>
                            </td>
                            <td>
                                <?php echo $value->kode_arsip; ?>
                            </td>
                            <td>
                                <?php echo $value->no_bap; ?>
                            </td>
                            <td>
                                <?php echo date("d-m-Y", strtotime($value->tgl_expired)); ?>
                            </td>
                        </tr>
                        <?php $no++; } ?>
                    </tbody>
                </table>
            </div>
        </div>

	</div>
</div>

<script type="text/javascript">
$(document).ready(function(){
    $('#sudah-retensi').DataTable();
})

</script>