
<div class="span12">
	<div class="widget widget-nopad">
		<div class="widget-header"> <i class="icon-list-alt"></i>
			<h3> Edit Data</h3>
		</div>
		<div class="widget-content">
		<div class="widget big-stats-container">
			<div class="widget-content">

			<?php 
			foreach ($menu as $key => $value) {
			$config = array('class'=>'form-horizontal', 'id'=>'formAddmenu'); echo form_open('menu_c/update', $config);?>
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
					<label class="control-label" for="parent">Parent</label>
					<div class="controls">
						<select class="span6" name="parent">
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
			</div>
			<div class="span6">
				<div class="control-group">											
					<label class="control-label" for="url">Url</label>
					<div class="controls">
						<input type="text" class="span6" id="url" name="url" value="<?php echo $value->url; ?>">
					</div>			
				</div>
			</div>
			<div class="span6">
				<div class="control-group">											
					<label class="control-label" for="urutan">Urutan</label>
					<div class="controls">
						<input type="text" class="span6" id="urutan" name="urutan" value="<?php echo $value->urutan; ?>">
					</div>											
				</div>
			</div>

			<div class="span6">
				<div class="control-group">											
					<label class="control-label" for="status">Status</label>
					<div class="controls">
						<select name="status" class="span6">
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