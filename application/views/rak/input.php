<div class="row">
	<div class="col-md-12">
		<?php 
			$config = array('class'=>'form-horizontal form-bordered', 'id'=>'formAddmenu'); 
			echo form_open('', $config);
		?>
	    <div class="panel panel-default">
	        <div class="panel-heading">
	            <h4 class="panel-title">Tambah Master Rak</h4>
	            
	            <div class="panel-options">
	                <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
	                <a href="#" data-rel="close"><i class="fa fa-fw fa-times"></i></a>
	            </div>
	        </div>
	        <div class="panel-body">
				<div class="form-group">
					<label for="inputEmail5" class="col-sm-2 control-label">No Lemari</label>
					<div class="col-sm-4">
						<input type="hidden" name='id' value="<?php echo $rak->id; ?>">
						<select class="form-control" id="id_lemari" name='id_lemari'>
							<option value="0">--Pilih--</option>
							<?php
								foreach ($lemari as $key => $value) {
								$selected = ($value->id == $rak->id_lemari)?"selected":"";
							?>
							<option <?php echo $selected;?> value="<?php echo $value->id;?>"><?php echo $value->no;?></option>
							<?php
								}
							?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail5" class="col-sm-2 control-label">Urutan Rak Ke - </label>
					<div class="col-sm-4">
						<input type="text" readonly class="form-control" id="urutan" name='urutan' value="<?php echo $rak->urutan; ?>" placeholder="urutan rak">
					</div>
				</div>
				<div class="form-group" id="resRak">
					
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
var link = '<?php echo base_url();?>rak/cekrak',
	urut = $('#urutan').val();
$('#id_lemari').on('change', function(){
	var isi = $(this).val();
	cekRak(link, isi)
})

var cekRak = function(a, v){

	$.ajax({
		url: a,
		type: 'post',
		data: {
			id_lemari: v,
			urutan: urut
		},
		success: function(res){
			var r = JSON.parse(res),
				lRak = r.av.length,
				i = 0,
				html;

			html = '<label for="inputEmail5" class="col-sm-2 control-label">Urutan Rak yang sudah terdaftar</label>'+
					'<div class="col-sm-4">';
			for(i;i<lRak;i++){
				html += '<label for="rak'+i+'" class="col-sm-2 control-label">'+r.av[i].urut+'</label>';
			}
			html += '</div>';

			if(r.full == 'true'){
				alert('Maaf Rak Sudah Penuh')
				location.reload();
			}else{			
				$('#urutan').val(r.rak)
				$('#resRak').html(html)
			}
			console.log(r.full);
		}
	})

}

</script>