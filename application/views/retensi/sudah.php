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
                                Dasar Hukum
                            </th>
                            <th>
                                Batas Retensi
                            </th>
                            <th>
                                Status
                            </th>
                            <th>
                                Aksi
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
                                <?php //echo $value->legal; ?>
                            </td>
                            <td>
                                <?php //echo $value->batas; ?>
                            </td>
                            <td>
                                <?php //echo ($value->status == 1)?"Aktif":"Tidak Aktif"; ?>
                            </td>
                            <td width="20%">
                                <!-- <a class="btn" href="<?php echo base_url()."setupretensi/edit/".$value->id;?>">
                                    <i class="icon-edit"></i>
                                    Edit
                                </a>
                                <button class="btn btn-danger" onclick="kirimId('<?php echo $value->id;?>','<?php echo $value->legal;?>')" data-target="#hapusModal" data-toggle="modal">
                                    <i class="icon-trash"></i>
                                    Hapus
                                </button> -->
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