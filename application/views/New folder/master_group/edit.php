<div class="span12">
	<div class="widget widget-nopad">
		<div class="widget-header"> <i class="icon-list-alt"></i>
			<h3> Edit Data</h3>
		</div>
		<div class="widget-content">
		<div class="widget big-stats-container">
			<div class="widget-content">

			<?php 
			foreach ($group as $key => $value) {
			$config = array('class'=>'form-horizontal', 'id'=>'formEditGroup'); echo form_open('group_c/update', $config);?>
			<div class="modal-body">
			<fieldset>
			<div class="span6">
				<div class="control-group">											
					<label class="control-label" for="nama">Nama</label>
					<div class="controls">
						<input type="hidden" id="id" name="id" value="<?php echo $value->id; ?>">
						<input type="text" class="span6" id="nama" name="nama" value="<?php echo $value->nama; ?>">
					</div>			
				</div>
			</div>
			<div class="span6">
				<div class="control-group">											
					<label class="control-label" for="keterangan">Keterangan</label>
					<div class="controls">
						<textarea name="keterangan" class="span6" rows="5" ><?php echo $value->keterangan; ?></textarea>
					</div>											
				</div>
			</div>
			</fieldset>
			</div>

			<div class="span6">
				<div class="control-group">											
					<div class="controls">
						<button class="btn" onclick="goBack()" type="button">Batal</button>
						<button class="btn btn-primary" type="submit">Simpan</button>
					</div>
				</div>
			</div>
			</form>
			<?php } ?>
			</div>
		</div>
		</div>
	</div>
</div>