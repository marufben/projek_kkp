<select class="form-control" name='status_ijin' id='status_ijin'>
	<option value='' selected>Select Status</option>
	<?php foreach($status as $row){ ?>
		<option value="<?php echo $row->kode_no; ?>"><?php echo $row->nama; ?></option>
	<?php } ?>
</select>
<script>
	$(document).ready(function(){
		$('#status_ijin').combobox();
	});
</script>