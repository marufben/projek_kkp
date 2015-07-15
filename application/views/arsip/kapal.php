<input type='hidden' value='<?php echo $nama_perusahaan;?>' id='nama_perusahaan' name='nama_perusahaan'>

<select class="form-control" name='kapal' id='kapal_combobox'>
	<option  value='' selected>Select Kapal</option>
	<?php foreach($kapal as $row){ ?>
		<option value="<?php echo $row->id."|".$row->nama; ?>"><?php echo $row->nama; ?></option>
	<?php } ?>
</select>
<script>
	$(document).ready(function(){
		$('#kapal_combobox').combobox();
	});
</script>