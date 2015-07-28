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
					<label for="inputEmail5" class="col-sm-2 control-label">No Lemari</label>
					<div class="col-sm-4">
						<input type="hidden" name='id' value="<?php echo $lemari->id; ?>">
						<input type="text" class="form-control" id="no" name='no' value="<?php echo $lemari->no; ?>" placeholder="kode no lemari">
					</div>
				</div>
				<div class="form-group">
                    <label for="urutan" class="col-sm-2 control-label">Keterangan</label>
                    <div class="col-sm-4">
                    	<textarea class="form-control" id="ket" name='ket'><?php echo $lemari->ket; ?></textarea>
                    </div>
             	</div>
				<div class="form-group">
					<label for="inputEmail5" class="col-sm-2 control-label">Jumlah Rak</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="jml_rak" name='jml_rak' value="<?php echo $lemari->jml_rak; ?>" placeholder="jumlah rak">
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

</script>