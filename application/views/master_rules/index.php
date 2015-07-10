<div class="row">
	<div class="col-md-12">

		<div class="panel panel-success panel-clean">
            <div class="panel-heading">
                Data Master Hak Akses

                <div class="panel-options">
                    <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                    <!-- <a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a> -->
                    <a href="#" data-rel="close"><i class="fa fa-fw fa-times"></i></a>
                </div>
            </div>
            <div class="panel-body">
					<a class="btn btn-primary" href="<?php echo base_url();?>rules_c/add">
						<i class="icon-plus-sign"></i>
						Tambah
					</a>
					<hr>
				<!-- </h6> -->

					<table id="master-rules" class="table table-striped table-bordered table-hover table-full-width">
						<thead>
							<tr>
								<th>
									No
								</th>
								<th>
									Group
								</th>
								<th>
									Jml Akses Menu
								</th>
								<th>
									Aksi
								</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 0;
							foreach ($rules as $key => $value) {
							?>
							<tr>
								<td>
									<?php echo ($no+1); ?>
								</td>
								<td>
									<?php echo $value->nama; ?>
								</td>
								<td>
									<?php echo $value->jml_menu; ?>
								</td>
								<td width="20%">
									<a class="btn" href="<?php echo base_url()."rules_c/edit/".$value->group_id;?>">
										<i class="icon-edit"></i>
										Edit
									</a>
									<button class="btn btn-danger" onclick="kirimId('<?php echo $value->group_id;?>','<?php echo $value->nama;?>')" data-target="#hapusModal" role="button" data-toggle="modal">
										<i class="icon-trash"></i>
										Hapus
									</button>
								</td>
							</tr>
							<?php $no++; } ?>
						</tbody>
					</table>

			</div>
		</div>
		</div>
	</div>
	</div>
</div>

<div id="hapusModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-header">
    	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    	<h3 id="myModalLabel">
    		Hapus Data
    	</h3>
  	</div>
    <div id="hapusData" style="padding: 10px">
  	
    </div>
    <div class="modal-footer">
	    <button class="btn" data-dismiss="modal" aria-hidden="true">Batal</button>
	    <a class="btn btn-primary" href="#" id="hapus">Hapus</a>
	</div>
</div>

<script type="text/javascript">
$(document).ready(function(){
  	$('#master-rules').DataTable();
})

function kirimId(id, nama)
{
	var pesan = "Anda akan menghapus <strong>"+nama+"</strong> dari Tabel, klik Hapus untuk melanjutkan.";
	$('#hapusData').html(pesan);
	$("#hapus").attr("href","<?php echo base_url();?>rules_c/delete/"+id);
}
</script>