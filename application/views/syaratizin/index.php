<div class="row">
	<div class="col-md-12">

		<div class="panel panel-success panel-clean">
            <div class="panel-heading">
                Data Master Status Izin

                <div class="panel-options">
                    <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                    <!-- <a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a> -->
                    <a href="#" data-rel="close"><i class="fa fa-fw fa-times"></i></a>
                </div>
            </div>
            <div class="panel-body">
						<a class="btn btn-primary" href="<?php echo base_url();?>persyaratanizin/create">
							<i class="icon-plus-sign"></i>
							Tambah
						</a>
						<hr>
					<!-- </h6> -->
						<?php
						// echo "<pre>";
						// var_dump($status);
						// echo "</pre>";
						?>
						<table id="master-statusizin" class="table table-striped dataTable">
							<thead>
								<tr>
									<th>
										No
									</th>
									<th>
										Nama
									</th>
									<th>
										Keterangan
									</th>
									<th>
										Aksi
									</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 0;
								foreach ($model as $key => $value) {
								?>
								<tr>
									<td>
										<?php echo ($no+1); ?>
									</td>
									<td>
										<?php echo strtoupper($value->nama_syarat); ?>
									</td>
									<td>
										<?php echo $value->keterangan; ?>
									</td>
									<td width="20%">
										<a class="btn" href="<?php echo base_url()."persyaratanizin/edit/".$value->id;?>">
											<i class="icon-edit"></i>
											Edit
										</a>
										<button class="btn btn-danger" onclick="kirimId('<?php echo $value->id;?>','<?php echo $value->nama_syarat;?>')" data-target="#hapusModal" data-toggle="modal">
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

<div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Hapus Data</h4>
      </div>
      <div class="modal-body">
        <div id="hapusData" style="padding: 10px;">
  	
    	</div>
      </div>
      <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Batal</button>
	    <a class="btn btn-primary" href="#" id="hapus">Hapus</a>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
$(document).ready(function(){
  	$('#master-statusizin').DataTable();
})

function kirimId(id, nama)
{
	var pesan = "Anda akan menghapus <strong>"+nama+"</strong> dari Tabel, klik Hapus untuk melanjutkan.";
	$('#hapusData').html(pesan);
	$("#hapus").attr("href","<?php echo base_url();?>persyaratanizin/delete/"+id);
}
</script>