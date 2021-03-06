<div class="row">
	<div class="col-md-12">

		<div class="panel panel-success panel-clean">
            <div class="panel-heading">
                Data Master Lemari

                <div class="panel-options">
                    <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                    <!-- <a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a> -->
                    <a href="#" data-rel="close"><i class="fa fa-fw fa-times"></i></a>
                </div>
            </div>
            <div class="panel-body">
						<a class="btn btn-primary" href="<?php echo base_url();?>box/create">
							<i class="icon-plus-sign"></i>
							Tambah
						</a>
						<hr>
					<!-- </h6> -->
					
						<table id="master-lemari" class="table table-striped dataTable">
							<thead>
								<tr>
									<th>
										No
									</th>
									<th>
										No Lemari
									</th>
									<th>
										No. Box
									</th>
									<th>
										Urutan Rak
									</th>
									<th>
										Aksi
									</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 0;
								foreach ($box as $key => $value) {
								?>
								<tr>
									<td>
										<?php echo ($no+1); ?>
									</td>
									<td>
										<?php echo $value->no; ?>
									</td>
									<td>
										<?php echo $value->nobox; ?>
									</td>
									<td>
										<?php echo $value->urutan; ?>
									</td>
									<td width="20%">
										<a class="btn" href="<?php echo base_url()."box/edit/".$value->idbox;?>">
											<i class="icon-edit"></i>
											Edit
										</a>
										<button class="btn btn-danger" onclick="kirimId('<?php echo $value->idbox;?>','<?php echo $value->no." Box No : [ ".$value->nobox." ] Di Rak No : [ ".$value->urutan." ]";?>')" data-target="#hapusModal" data-toggle="modal">
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
  	$('#master-lemari').DataTable();
})

function kirimId(id, nama)
{
	var pesan = "Anda akan menghapus <strong>"+nama+"</strong> dari Tabel, klik Hapus untuk melanjutkan.";
	$('#hapusData').html(pesan);
	$("#hapus").attr("href","<?php echo base_url();?>box/delete/"+id);
}
</script>