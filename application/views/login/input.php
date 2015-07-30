<div class="row">
	<div class="col-md-12">
		<?php 
			$config = array('class'=>'form-horizontal form-bordered', 'id'=>'formAddmenu'); 
			echo form_open_multipart('', $config);
		?>
	    <div class="panel panel-default">
	        <div class="panel-heading">
	            <h4 class="panel-title">Tambah Pengguna</h4>
	            
	            <div class="panel-options">
	                <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
	                <a href="#" data-rel="close"><i class="fa fa-fw fa-times"></i></a>
	            </div>
	        </div>
	        <div class="panel-body">
				<div class="form-group">
					<label for="inputEmail5" class="col-sm-2 control-label">Group User</label>
					<div class="col-sm-4">
						<input type="hidden" name='id' value="<?php echo $user->id; ?>">
						<select class="form-control" id="id_lemari" name='id_lemari'>
							<option value="0">--Pilih--</option>
							<?php
								foreach ($group as $key => $value) {
								$selected = ($value->id == $rak->id_group)?"selected":"";
							?>
							<option <?php echo $selected;?> value="<?php echo $value->id;?>"><?php echo $value->nama;?></option>
							<?php
								}
							?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail5" class="col-sm-2 control-label">Username</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="username" name='username' value="<?php echo $user->username; ?>" placeholder="username">
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail5" class="col-sm-2 control-label">Password</label>
					<div class="col-sm-4">
						<input type="password" class="form-control" id="password" name='password' value="<?php echo $user->password; ?>" placeholder="password">
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail5" class="col-sm-2 control-label">Photo</label>
					<div class="col-sm-4">
						<input type="file" class="form-control" id="poto" name='poto'>
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
var link = '<?php //echo base_url();?>users/cekrak',
	urut = $('#urutan').val();

$('#id_lemari').on('change', function(){
	var isi = $(this).val();
	cekRak(link, isi)
})

var cekRak = function(a, v){

	$.ajax({
		url: a,
		type: 'post',
		data: {
			id_lemari: v
		},
		success: function(res){

		}
	})

}

</script>