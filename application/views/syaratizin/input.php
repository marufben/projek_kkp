<div class="row">
	<div class="col-md-12">
				<?php 
					$config = array('class'=>'form-horizontal form-bordered', 'id'=>'formAddmenu'); 
					echo form_open('', $config);
				?>
	    <div class="panel panel-default">
	        <div class="panel-heading">
	            <h4 class="panel-title">Tambah Persayaratan Izin</h4>
	            
	            <div class="panel-options">
	                <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
	                <a href="#" data-rel="close"><i class="fa fa-fw fa-times"></i></a>
	            </div>
	        </div>
	        <div class="panel-body">
				<div class="form-group">
					<label for="inputEmail5" class="col-sm-2 control-label">Jenis Izin</label>
					<div class="col-sm-4">
						<input type="hidden" name='id' value="<?php echo $model->id; ?>">
						<select class="form-control" id="id_jenis" onchange="jenis(this)" name='id_jenis'>
							<option value="0">--Pilih--</option>
							<?php
							foreach ($jenis as $key => $val) {
							$selected = ($val->id == $model->id_jenis)?"selected":"";
							?>
							<option <?php echo $selected;?> value="<?php echo $val->id;?>"><?php echo $val->singkatan;?></option>
							<?php
							}
							?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail5" class="col-sm-2 control-label">Status Izin</label>
					<div class="col-sm-4">
						<select class="form-control" id="id_status" onchange="status(this)" name='id_status'>
							<option value="0">--Pilih--</option>
							<?php
							foreach ($status as $key => $valu) {
							$selected = ($valu->id == $model->id_status)?"selected":"";
							?>
							<option <?php echo $selected;?> value="<?php echo $valu->id;?>"><?php echo $valu->nama;?></option>
							<?php
							}
							?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail5" class="col-sm-2 control-label">Kode Syarat</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="kode_syarat" name='kode_syarat' value="<?php echo $model->kode_syarat; ?>" readonly>
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail5" class="col-sm-2 control-label">Nama</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="nama_syarat" name='nama_syarat' value="<?php echo $model->nama_syarat; ?>" placeholder="nama syarat">
					</div>
				</div>
				<div class="form-group">
                    <label for="urutan" class="col-sm-2 control-label">Keterangan</label>
                    <div class="col-sm-4">
                    	<textarea class="form-control" id="keterangan" name='keterangan'><?php echo $model->keterangan; ?></textarea>
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
var s,
	j,
	ss,
	jj,
	url="<?php echo base_url();?>persyaratanizin/cek",
	kode="<?php echo $model->kode_syarat;?>",
	input="<?php echo $model->id_status;?>";

function jenis(obj){
	s = $('#id_status'),
	j = $(obj);
	// if(j.val()==0 || s.val()==0){
	// 	alert('Silahkan Pilih Jenis')
	// }else{
	// 	cek(s.val(), j.val())
	// }

	getStatus(j.val())
}

function status(obj){
	ss = $(obj),
	jj = $('#id_jenis');
	if(ss.val()==0 || jj.val()==0){
		alert('Silahkan Pilih Status')
	}else{
		if(input != ss.val()){
			cek(ss.val(), jj.val())
		}else{
			$('#kode_syarat').val(kode)
		}

		// console.log(input+' - '+ss.val());
	}
}

var getStatus = function(val){
	$.ajax({
		url: "<?php echo base_url();?>persyaratanizin/getStatus",
		type: 'post',
		data: {
			id_jenis: val,
		},
		success: function(res){
			// alert(res)
			$('#id_status').html(res)
		}
	})
}

var cek = function(one, two){
	$.ajax({
		url: url,
		type: 'post',
		data:{
			id_status: one,
			id_jenis: two
		},
		success: function(res){
			$('#kode_syarat').val(res)
		}
	})
}
</script>