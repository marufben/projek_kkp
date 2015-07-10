<div class="row">
	<div class="col-md-12">
				<?php 
				foreach ($menu as $key => $value) {
					$config = array('class'=>'form-horizontal form-bordered', 'id'=>'formEditMenu'); 
					echo form_open('menu_c/update', $config);
				?>
	    <div class="panel panel-default">
	        <div class="panel-heading">
	            <h4 class="panel-title">Edit Menu</h4>

	            <div class="panel-options">
	                <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
	                <a href="#" data-rel="close"><i class="fa fa-fw fa-times"></i></a>
	            </div>
	        </div>
	        <div class="panel-body">

					<div class="form-group">
						<label for="nama" class="col-sm-2 control-label">Nama</label>
						<div class="col-sm-4">
							<input type="hidden" id="id" name="id" value="<?php echo $value->id; ?>">
							<input type="text" class="form-control" id="nama" name='nama' value="<?php echo $value->nama; ?>">
						</div>
					</div>
	                <div class="form-group">
	                    <label for="inputPassword5" class="col-sm-2 control-label">Parent</label>
	                    <div class="col-sm-4">
	                        <select name="parent" class='form-control' id="parent">
								<option value="0">Parent - Parent</option>
								<?php
								foreach ($menuall as $key => $values) {
									# code...
									$selected = ($value->parent == $values->id)?"selected":"";
									echo "<option value='".$values->id."' $selected>Child To - ".$values->nama."</option>";
								}
								?>
							</select>
	                    </div>
	                </div>
				<div class="form-group">
	                    <label for="urutan" class="col-sm-2 control-label">Urutan</label>
	                    <div class="col-sm-4">
	                        <input type="text" class="form-control" id="urutan" name='urutan' value="<?php echo $value->urutan; ?>">
	                    </div>
	             </div>
				 <div class="form-group">
	                    <label for="icon" class="col-sm-2 control-label">Icon-Menu</label>
	                    <div class="col-sm-4">
							<div class="input-group">
								<input type="text" class="form-control" readonly id="iconMenu" name='icon' value="<?php echo $value->icon; ?>">
								<span class="input-group-btn">
									<button class="btn btn-primary" type="button" onclick="lihatIcon()">Lihat</button>
								</span>
							</div>
	                    </div>
	             </div>
				 <div class="form-group">
	                    <label for="url" class="col-sm-2 control-label">Url</label>
	                    <div class="col-sm-6">
	                        <input type="text" class="form-control" id="url" name='url' value="<?php echo $value->url; ?>">
	                    </div>
	             </div>
				 <div class="form-group">
	                    <label for="status" class="col-sm-2 control-label">Status</label>
	                    <div class="col-sm-2">
	                        <select name="status" class="form-control">
								<?php 
								$selected1 = ($value->status == 0)?"selected":"";							
								$selected2 = ($value->status == 1)?"selected":"";							
								?>
								<option value="1" <?php echo $selected1;?>>Aktif</option>
								<option value="0" <?php echo $selected1;?>>Tidak Aktif</option>
							</select>
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
	<?php } ?>
	</div>
</div>

<div id="lihatIcon"></div>

<script type="text/javascript">
(function(){
	var parent = $('#parent'),
		url = $('#url');

	if(parent.val() == 0){
		url.val('#')
		url.attr('readonly', true)
	}else{
		
		url.attr('readonly', false)
	}
})();

function lihatIcon(){
	var url = "<?php echo base_url();?>menu_c/tampilIcon";
	$.ajax({
		url:url,
		success: function(res){
			$('#lihatIcon').html(res);
		}
	})
}

$('#parent').on('change', function(){
	var isi = $(this).val();
	if(isi == 0){
		$('#url').val('#')
		$('#url').attr('readonly', true)
	}else{
		$('#url').val('')
		$('#url').attr('readonly', false)
	}
})

</script>