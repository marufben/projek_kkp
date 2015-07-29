<div class="row">
	<div class="col-md-12">
		<?php 
			$config = array('class'=>'form-horizontal form-bordered', 'id'=>'formAddmenu'); 
			echo form_open('', $config);
		?>
	    <div class="panel panel-default">
	        <div class="panel-heading">
	            <h4 class="panel-title">Tambah Data Box</h4>
	            
	            <div class="panel-options">
	                <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
	                <a href="#" data-rel="close"><i class="fa fa-fw fa-times"></i></a>
	            </div>
	        </div>
	        <div class="panel-body">
				<div class="form-group">
					<label for="inputEmail5" class="col-sm-2 control-label">No Lemari</label>
					<div class="col-sm-4">
						<input type="hidden" name='id' value="<?php echo $box->id; ?>">
						<select class="form-control" id="id_lemari" name='id_lemari'>
							<option>--Pilih--</option>
							<?php
							foreach ($lemari as $key => $value) {
								$selected = ($value->id == $box->id_lemari)?"selected":"";
							?>
							<option <?php echo $selected;?> value="<?php echo $value->id;?>"><?php echo $value->no;?></option>
							<?php
							}
							?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail5" class="col-sm-2 control-label">Urutan Rak</label>
					<div class="col-sm-4">
						<select class="form-control" id="id_rak" name='id_rak'>
							<option>--Pilih--</option>
							<?php
							foreach ($rak as $key => $val) {
								$selected = ($val->id == $box->id_rak)?"selected":"";
							?>
							<option <?php echo $selected;?> value="<?php echo $val->id;?>"><?php echo $val->urutan;?></option>
							<?php
							}
							?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail5" class="col-sm-2 control-label">No Box</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="no" name='no' value="<?php echo $box->no; ?>" placeholder="no box">
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
var link = '<?php echo base_url();?>box/cekrak';

$('#id_lemari').on('change', function(){
	var val = $(this).val();
	cekRak(val)
})

var cekRak = function(v){
	$.ajax({
		url: link,
		type: 'post',
		data: {
			id_lemari: v
		},
		success: function(res){
			$('#id_rak').html(res)
			console.log(res);
		}
	})
}
</script>