<div class="row">
	<div class="col-md-12">
				<?php 
					$config = array('class'=>'form-horizontal form-bordered', 'id'=>'formAddmenu'); 
					echo form_open('', $config);
				?>
	    <div class="panel panel-default">
	        <div class="panel-heading">
	            <h4 class="panel-title">Tambah Jenis Izin</h4>
	            
	            <div class="panel-options">
	                <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
	                <a href="#" data-rel="close"><i class="fa fa-fw fa-times"></i></a>
	            </div>
	        </div>
	        <div class="panel-body">
				<div class="form-group">
					<label for="inputEmail5" class="col-sm-2 control-label">Kode</label>
					<div class="col-sm-4">
						<input type="hidden" name='id' value="<?php echo $model->id; ?>">
						<input type="text" class="form-control" id="kode" name='kode' value="<?php echo $model->kode; ?>" placeholder="kode">
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail5" class="col-sm-2 control-label">Singkatan</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="singkatan" name='singkatan' value="<?php echo $model->singkatan; ?>" placeholder="singkatan">
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
(function(){

})();


</script>