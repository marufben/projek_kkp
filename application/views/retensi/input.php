<div class="row">
	<div class="col-md-12">
		<?php 
			$config = array('class'=>'form-horizontal form-bordered', 'id'=>'formAddmenu'); 
			echo form_open('', $config);
		?>
	    <div class="panel panel-default">
	        <div class="panel-heading">
	            <h4 class="panel-title"><?php echo $title;?></h4>
	            
	            <div class="panel-options">
	                <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
	                <a href="#" data-rel="close"><i class="fa fa-fw fa-times"></i></a>
	            </div>
	        </div>
	        <div class="panel-body">
				<div class="form-group">
					<label for="inputEmail5" class="col-sm-2 control-label">Dasar Hukum</label>
					<div class="col-sm-4">
						<input type="hidden" name='id' value="<?php echo $setup->id; ?>">
						<input type="text" class="form-control" id="legal" name='legal' value="<?php echo $setup->legal; ?>" placeholder="dasar hukum">
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail5" class="col-sm-2 control-label">Batas Retensi</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="batas" name='batas' value="<?php echo $setup->batas; ?>" placeholder="batas">
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail5" class="col-sm-2 control-label">Status</label>
					<div class="col-sm-4">
						<select class="form-control" id="status" name='status'>
							<option value="0">--Pilih--</option>
							<?php
								$aktif = ($setup->status == '1')?"selected":"";
								$tidak = ($setup->status == '2')?"selected":"";
							?>
							<option <?php echo $aktif;?> value="1">Aktif</option>
							<option <?php echo $tidak;?> value="2">Tidak Aktif</option>
							
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

<script type="text/javascript">

</script>