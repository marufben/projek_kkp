<div class="row">
	<div class="col-md-12">
				<?php 
					$config = array('class'=>'form-horizontal form-bordered', 'id'=>'formAddmenu'); 
					echo form_open('menu_c/create', $config);
				?>
	    <div class="panel panel-default">
	        <div class="panel-heading">
	            <h4 class="panel-title">Tambah Menu</h4>

	            <div class="panel-options">
	                <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
	                <a href="#" data-rel="close"><i class="fa fa-fw fa-times"></i></a>
	            </div>
	        </div>
	        <div class="panel-body">

					<div class="form-group">
						<label for="inputEmail5" class="col-sm-2 control-label">Nama</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" id="nama" name='nama' placeholder="nama">
						</div>
					</div>
	                <div class="form-group">
	                    <label for="inputPassword5" class="col-sm-2 control-label">Parent</label>
	                    <div class="col-sm-4">
	                        <select name="parent" class='form-control' id="parent">
								<option value="0">Parent - Parent</option>
								<?php
								foreach ($menu as $key => $value) {
									# code...
									echo "<option value='".$value->id."'>Child To - ".$value->nama."</option>";
								}
								?>
							</select>
	                    </div>
	                </div>
				<div class="form-group">
	                    <label for="urutan" class="col-sm-2 control-label">Urutan</label>
	                    <div class="col-sm-4">
	                        <input type="text" class="form-control" id="urutan" name='urutan' placeholder="urutan">
	                    </div>
	             </div>
				 <div class="form-group">
	                    <label for="icon" class="col-sm-2 control-label">Icon-Menu</label>
	                    <div class="col-sm-4">
							<div class="input-group">
								<input type="text" class="form-control" readonly id="iconMenu" name='icon' placeholder="icon">
								<span class="input-group-btn">
									<button class="btn btn-primary" type="button" onclick="lihatIcon()">Lihat</button>
								</span>
							</div>
	                    </div>
	             </div>
				 <div class="form-group">
	                    <label for="url" class="col-sm-2 control-label">Url</label>
	                    <div class="col-sm-6">
	                        <input type="text" class="form-control" id="url" name='url' placeholder="url">
	                    </div>
	             </div>
				 <div class="form-group">
	                    <label for="status" class="col-sm-2 control-label">Status</label>
	                    <div class="col-sm-2">
	                        <select name="status" class="form-control">
								<option value="1">Aktif</option>
								<option value="0">Tidak Aktif</option>
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
	</div>
</div>

<div id="lihatIcon"></div>

<script type="text/javascript">
(function(){
	// var parent = $('#parent'),
	// 	url = $('#url');

	// if(parent.val() == 0){
	// 	url.val('#')
	// 	url.attr('readonly', true)
	// }else{
		
	// 	url.attr('readonly', false)
	// }
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

// $('#parent').on('change', function(){
// 	var isi = $(this).val();
// 	if(isi == 0){
// 		$('#url').val('#')
// 		$('#url').attr('readonly', true)
// 	}else{
// 		$('#url').val('')
// 		$('#url').attr('readonly', false)
// 	}
// })

</script>