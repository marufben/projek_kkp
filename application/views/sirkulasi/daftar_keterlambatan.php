<div class="row">
	<div class="col-md-12">

		<div class="panel panel-success panel-clean">
            <div class="panel-heading">
                Daftar Keterlambatan

                <div class="panel-options">
                    <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                    <!-- <a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a> -->
                    <a href="#" data-rel="close"><i class="fa fa-fw fa-times"></i></a>
                </div>
            </div>
            <div class="panel-body">
					<!-- a class="btn btn-primary" href="<?php echo base_url();?>aturan_peminjaman/add">
						<i class="icon-plus-sign"></i>
						Tambah Aturan Peminjaman
					</a>
					<hr -->
				<!-- </h6> -->
				<div class="controls col-sm-10" style='margin-bottom:5px;margin-top:5px;'>
					<form role="form" action="" method="post">
							<div>
								<label class="control-label col-sm-2" for="username">ID/Nama Anggota</label>
								<div class="controls col-sm-4">
								        <input type="text" name="kode" class="form-control" id="kode">
								</div>
								<div class="controls col-sm-3">
								        <input type="submit" class="btn btn-primary" value="Filter" name="filter">
								</div>
							</div>
					</form>
				</div>			
					<table id="master-rules" class="table table-striped table-bordered table-hover table-full-width">
						<thead>
							<tr>
								<th>
									ID Anggota
									</th>
									<th>
										Nama Anggota
									</th>
								<th>
									Kode Item
								</th>
								<th>
									Judul
								</th>
								<th>
									Tanggal Pinjam
								</th>
								<th>
									Tanggal Harus Kembali
								</th>
								<th>
									Keterlambatan
								</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 0;
							foreach ($daftar as $key => $value) {
								//Hitung hari 
							    $now = time(); 
							    $hrs_kembali = strtotime($value->tgl_hrs_kembali);
							    $datediff = $now - $hrs_kembali;
							    $jml_hari = floor($datediff/(60*60*24));

							    $tgl_kembali = $value->tgl_kembali;
								
								if($jml_hari > 0 && $tgl_kembali == "0000-00-00"){
							?>
							<tr>
								<td>
									<?php echo $value->id_anggota; ?>
								</td>
								<td>
									<?php echo $value->nama; ?>
								</td>
								<td>
									<?php echo $value->item_code; ?>
								</td>
								<td>
									<?php echo $value->title; ?>
								</td>
								<td>
									<?php echo $value->tgl_pinjam; ?>
								</td>
								<td>
									<?php echo $value->tgl_hrs_kembali; ?>
								</td>
								<td>
									<?php
											echo $jml_hari." <b>hari</b>";
									?>
								</td>
							</tr>
							<?php
								}
								$no++; } 
							?>
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
