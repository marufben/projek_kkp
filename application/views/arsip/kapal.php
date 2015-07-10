<input type='hidden' value='<?php echo $nama_perusahaan;?>' id='nama_perusahaan'>

<select class="form-control" name='kapal' id='kapal_combobox'>
	<option selected>Select Kapal</option>
	<?php foreach($kapal as $row){ ?>
		<option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
	<?php } ?>
</select>
<script>
	$(document).ready(function(){
		$('#kapal_combobox').combobox();
	});
</script>