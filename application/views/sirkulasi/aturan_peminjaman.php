<div class="row">
	<div class="col-md-12">

		<div class="panel panel-success panel-clean">
            <div class="panel-heading">
                Aturan Peminjaman

                <div class="panel-options">
                    <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                    <!-- <a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a> -->
                    <a href="#" data-rel="close"><i class="fa fa-fw fa-times"></i></a>
                </div>
            </div>
            <div class="panel-body">
					<a class="btn btn-primary" href="<?php echo base_url();?>aturan_peminjaman/add">
						<i class="icon-plus-sign"></i>
						Tambah Aturan Peminjaman
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
									Tipe Keanggotaan
								</th>
								<th>
									Tipe Koleksi
								</th>
								<th>
									GMD
								</th>
								<th>
									Jumlah Pinjaman
								</th>
								<th>
									Periode Peminjaman
								</th>
								<th>
									Perubahan Terakhir
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
									<?php echo $value->member_type_name; ?>
								</td>
								<td>
									<?php echo $value->nama_tipe; ?>
								</td>
								<td>
									<?php echo $value->id_gmd; ?>
								</td>
								<td>
									<?php echo $value->jumlah_pinjaman; ?>
								</td>
								<td>
									<?php echo $value->periode_peminjaman; ?>
								</td>
								<td>
									<?php echo $value->last_update; ?>
								</td>
								<td width="20%">
									<a class="btn" href="<?php echo base_url()."aturan_peminjaman/edit/".$value->id;?>">
										<i class="icon-edit"></i>
										Edit
									</a>
									<a class="btn btn-danger" href="<?php echo base_url()."aturan_peminjaman/delete/".$value->id;?>">
										<i class="icon-trash"></i>
										Delete
									</a>
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