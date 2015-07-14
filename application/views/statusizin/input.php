<div class="row">
	<div class="col-md-12">
				<?php 
					$config = array('class'=>'form-horizontal form-bordered', 'id'=>'formAddmenu'); 
					echo form_open('', $config);
				?>
	    <div class="panel panel-default">
	        <div class="panel-heading">
	            <h4 class="panel-title">Tambah Status Izin</h4>
	            
	            <div class="panel-options">
	                <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
	                <a href="#" data-rel="close"><i class="fa fa-fw fa-times"></i></a>
	            </div>
	        </div>
	        <div class="panel-body">
				<div class="form-group">
					<label for="inputEmail5" class="col-sm-2 control-label">Jenis Izin</label>
					<div class="col-sm-4">
						<input type="hidden" name='id' value="<?php echo $status->id; ?>">
						<select class="form-control" id="id_jenis" name='id_jenis'>
							<option value="0">--Pilih--</option>
							<?php
							foreach ($jenis as $key => $value) {
							$select = ($status->id_jenis == $value->id)?"selected":"";
							?>
							<option <?php echo $select;?> value="<?php echo $value->id;?>"><?php echo $value->singkatan;?></option>
							<?php
							}
							?>
						</select>

					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail5" class="col-sm-2 control-label">Kode No</label>
					<div class="col-sm-4">
						<input type="text" readonly class="form-control" id="kode_no" name='kode_no' value="<?php echo $status->kode_no; ?>" placeholder="kode no">
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail5" class="col-sm-2 control-label">Nama</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="nama" name='nama' value="<?php echo $status->nama; ?>" placeholder="nama status">
					</div>
				</div>
				<div class="form-group">
                    <label for="urutan" class="col-sm-2 control-label">Keterangan</label>
                    <div class="col-sm-4">
                    	<textarea class="form-control" id="keterangan" name='keterangan'><?php echo $status->keterangan; ?></textarea>
                    </div>
             	</div>
	        </div>
	        <div class="panel-footer">
	            <div class="form-group">
	                <div class="col-sm-offset-4 col-sm-8">
	                    <button type="submit" class="btn btn-primary">Save</button>
	                </div>
	            </div>
	        </div>
	    </div>
	</form>
	</div>
</div>

<script type="text/javascript">
$('#id_jenis').on('change', function(){
	var val = $(this);
	cek(val.val())
})

var cek = function(val){
	$.ajax({
		url: "<?php echo base_url();?>statusizin/cek",
		type: 'post',
		data: {
			id_jenis: val
		},
		success: function(res){
			$('#kode_no').val(res)
		}
	})
}
</script>