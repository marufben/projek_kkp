<div class="span12">
	<div class="widget widget-nopad">
		<div class="widget-header"> <i class="icon-list-alt"></i>
			<h3> Data Master</h3>
		</div>
		<div class="widget-content">
		<div class="widget big-stats-container">
			<div class="widget-content">
					<a class="btn btn-primary" href="<?php echo base_url();?>group_c/add">
						<i class="icon-plus-sign"></i>
						Tambah
					</a>
					<hr>
				<!-- </h6> -->

					<table id="master-group" class="table table-striped table-bordered table-hover table-full-width">
						<thead>
							<tr>
								<th>
									No
								</th>
								<th>
									Nama
								</th>
								<th>
									Url
								</th>
								<th>
									Aksi
								</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 0;
							foreach ($group as $key => $value) {
							?>
							<tr>
								<td>
									<?php echo ($no+1); ?>
								</td>
								<td>
									<?php echo $value->nama; ?>
								</td>
								<td>
									<?php echo $value->keterangan; ?>
								</td>
								<td width="20%">
									<a class="btn" href="<?php echo base_url()."group_c/edit/".$value->id;?>">
										<i class="icon-edit"></i>
										Edit
									</a>
									<button class="btn btn-danger" onclick="kirimId('<?php echo $value->id;?>','<?php echo $value->nama;?>')" data-target="#hapusModal" role="button" data-toggle="modal">
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
  	$('#master-group').DataTable();
})

function kirimId(id, nama)
{
	var pesan = "Anda akan menghapus <strong>"+nama+"</strong> dari Tabel, klik Hapus untuk melanjutkan.";
	$('#hapusData').html(pesan);
	$("#hapus").attr("href","<?php echo base_url();?>group_c/delete/"+id);
}
</script>