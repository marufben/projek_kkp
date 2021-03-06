<?php $config = array('class'=>'form-horizontal form-bordered', 'id'=>'formAddmenu', 'enctype'=>'multipart/form-data' ); echo form_open('arsip/insert', $config);
$json_jenis=json_encode($jenis);
?>
    <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">Form Arsip</h4>
                <div class="panel-options">
                    <!-- <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                    <a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a> -->
                    <a href="#" data-rel="close"><i class="fa fa-fw fa-times"></i></a>
                </div>
            </div>
            <div class="panel-body">
				<div class='row'>
                <div class="form-group">
                    <label class="control-label col-sm-2">Judul</label>

                    <div class="controls col-sm-6">
                        <input type="text" class="form-control" name='judul' placeholder="Enter Judul">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Perusahaan</label>
                    <div class="controls col-sm-4">
                        <select class="form-control" name='perusahaan' id='combobox'>
						  <option value='' selected>Select Perusahaan</option>
						  <?php foreach($perusahaan as $row){ ?>
							<option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
						  <?php } ?>
						</select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Kapal</label>
                    <div class="controls col-sm-4">
						<div id='kapal'>
							<select class="form-control" name='kapal' id='kapal_combobox1'>
								  <option value='' selected>Select Kapal</option>
							</select>
						</div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Jenis Ijin</label>
                    <div class="controls col-sm-4">
                        <select class="form-control" name='jenis_ijin' id='jenis_ijin'>
                            <option value='' selected>Select Jenis</option>
						  <?php foreach($jenis as $row){ ?>
							<option value="<?php echo $row->id."|".$row->singkatan; ?>"><?php echo $row->kode; ?></option>
						  <?php } ?>
                        </select>
                    </div>
                    <label class="control-label col-sm-2">Status Ijin</label>
					<div class="controls col-sm-3">
						<div id='statusijin'>
							<select class="form-control" name='status_ijin' id='status_ijin' required>
								<option value='' selected>Select Status</option>
							</select>
						</div>
					</div>
                </div>
				<div class="form-group">
                    <label class="control-label col-sm-2">No.Ijin</label>

                    <div class="controls col-sm-4">
                        <input class="form-control" name='no_ijin' id='no_ijin' type="text" placeholder="Enter no ijin">
                        
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Kode Barcode</label>
                    <div class="controls col-sm-4">
                        <input class="form-control" name='barcode' type="text" placeholder="Enter kode barcode">
                    </div>
					<label class="control-label col-sm-2">Kode Arsip</label>
                    <div class="controls col-sm-3">
						<div class="input-group">
							<input readonly class="form-control" name='kode_arsip' id='kode_arsip' type="text" placeholder="Enter kode barcode"><span id='ok' class="input-group-addon"><i class="glyphicon gi-new-window"></i></span>
						</div>
                    </div>
                </div>
                <div class="form-group">
                       <label class="control-label col-sm-2">Tanggal Terbit</label>
					   <div class="controls col-sm-2">
						   <div class="input-group date">
							 <input type="text" id='terbit' class="form-control" data-rel="datepicker"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
							 <input name='terbit' type="hidden" id="terbit_send"> 
						   </div>
                       </div>
					   <label class="control-label col-sm-2">Tanggal Expired</label>
					   <div class="controls col-sm-2">
						   <div class="input-group date">
							 <input type="text" id='expired' class="form-control" data-rel="datepicker"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
							 <input name='expired' type="hidden" id="expired_send"> 
						   </div>
                       </div>
                </div>
				<div class="form-group">
                    <label class="control-label col-sm-2">No.Pembukuan</label>

                    <div class="controls col-sm-4">
                        <input name='no_pembukuan' class="form-control" type="text" placeholder="Enter no pembukuan">
                        
                    </div>
					<label class="control-label col-sm-2">Tanggal Pembukuan</label>
					   <div class="controls col-sm-2">
						   <div class="input-group date">
							 <input type="text" id='tgl_pembukuan' class="form-control" data-rel="datepicker"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
							 <input name='tgl_pembukuan' type="hidden" id="tgl_pembukuan_send"> 
						   </div>
                       </div>
                </div>
            </div>

		<style>
			.btn-file {
				position: relative;
				overflow: hidden;
			}
			.btn-file input[type=file] {
				position: absolute;
				top: 0;
				right: 0;
				min-width: 100%;
				min-height: 100%;
				font-size: 100px;
				text-align: right;
				filter: alpha(opacity=0);
				opacity: 0;
				outline: none;
				background: white;
				cursor: inherit;
				display: block;
			}
		</style>
			<!-- <div class='form-group'>
				<div class="col-md-12">
					<div class="panel panel-danger">
						<div class="panel-heading">
							Upload Lampiran Arsip
							<div class="panel-options">
								<a class='btn' onClick="addVariables();"><i class="fa fa-fw fa-plus"></i></a>
							</div>
						</div>
						<div class="panel-body panel-body-warning">
							<div id='variablegroups'></div>
						</div>
						<div class="panel-footer">
						</div>
					</div>
				</div>
			</div> -->

			<div class='form-group'>
				<table class="table">
		       		<thead>
						<tr>
							<th colspan="3">Upload Lampiran Arsip</th>
						</tr>
						<tr>
							<td>Judul</td>
							<td>Files</td>
							<td>&nbsp;</td>
						</tr>
		       		</thead>
		       		<tbody id="variablegroups">
		       			<tr>
		       				<td width="40%">
								<input name="judul_files[]" class="form-control" type="text" placeholder="Enter no Judul">
		       				</td>
		       				<td width="40%">
								<input name="file_lampiran[]" type="file" >
		       				</td>
		       				<td width="10%"><button type="button" class='btn btn-success' onClick="addVariables();"><i class="fa fa-fw fa-plus"></i>Tambah</button></td>
		       			</tr>
		       		</tbody>
				</table>
			</div>
			<div class="form-group">
				<table class="table">
					<thead>
						<tr>
							<th>Penempatan Arsip</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
							<div class="form-group">
							<label for="inputEmail5" class="col-sm-2 control-label">No Lemari</label>
							<div class="col-sm-4">
									<select class="form-control" id="id_lemari" name='id_lemari'>
										<option>--Pilih--</option>
										<?php
										foreach ($lemari as $key => $value) {
											 $selected = ($value->id == $box->id_lemari)?"selected":"";
										?>
										<option <?php echo $selected;?> value="<?php echo $value->id;?>"><?php echo $value->no;?></option>
										<?php
										}
										?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail5" class="col-sm-2 control-label">Urutan Rak</label>
								<div class="col-sm-4">
									<select class="form-control" id="id_rak" name='id_rak'>
										<option>--Pilih--</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail5" class="col-sm-2 control-label">No Box</label>
								<div class="col-sm-4">
									<select class="form-control" id="id_box" name='id_box'>
										<option>--Pilih--</option>
									</select>
								</div>
							</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>

		<div class="panel-footer">
            <div class="text-right">
              <button type="submit" class="btn btn-primary">Save Arsip</button>
           </div>
        </div>
	</div>
    </form>
	<script>
	$(document).ready(function(){
		// $('#terbit').datepicker({  format: 'dd-mm-yyyy', });
		// $('#expired').datepicker({ format: 'dd-mm-yyyy', });
		// $('#tgl_pembukuan').datepicker({ format: 'dd-mm-yyyy', });

		// $('#terbit').datepicker({
		//     format: 'dd-mm-yyyy',
		//     onSelect: function(value, date) { 
		// 	      var day = $(this).datepicker('getDate').getDate();  
		// 	      var month = $(this).datepicker('getDate').getMonth();  
		// 	      var year = $(this).datepicker('getDate').getFullYear(); 
		// 	      alert(value)
		// 	      // $('#terbit_send').val(year+"-"+(month+1)+"-"+day);
		//     }
		// });
		$('#terbit').datepicker({
			format: 'dd-mm-yyyy',
		}).on('changeDate', function(){

			var date = $(this).val(),
		    values = date.split("-"),
		    day = parseInt(values[0], 10),
		    month = parseInt(values[1], 10), // Month is zero based, so subtract 1
		    year = parseInt(values[2], 10);

		    // alert(year+"-"+month+"-"+day)
			$('#terbit_send').val(year+"-"+month+"-"+day)
		})
		
		$('#expired').datepicker({
		    format: 'dd-mm-yy'
		}).on('changeDate', function(){

			var date = $(this).val(),
		    values = date.split("-"),
		    day = parseInt(values[0], 10),
		    month = parseInt(values[1], 10), // Month is zero based, so subtract 1
		    year = parseInt(values[2], 10);
			
		    // alert(year+"-"+month+"-"+day)
			$('#expired_send').val(year+"-"+month+"-"+day)
		});

		$('#tgl_pembukuan').datepicker({
		    format: 'dd-mm-yy'
		}).on('changeDate', function(){

			var date = $(this).val(),
		    values = date.split("-"),
		    day = parseInt(values[0], 10),
		    month = parseInt(values[1], 10), // Month is zero based, so subtract 1
		    year = parseInt(values[2], 10);
			
		    // alert(year+"-"+month+"-"+day)
			$('#tgl_pembukuan_send').val(year+"-"+month+"-"+day)
		});

		$('#combobox').combobox();
		$('#kapal_combobox1').combobox();
		$('#jenis_ijin').combobox();
	});

	var url = "<?php echo base_url();?>arsip/getId";

	$('#id_lemari').on('change', function(){
		var isi = $(this).val();
		getId(isi, 'rak', $('#id_rak'))
	})

	$('#id_rak').on('change', function(){
		var isi = $(this).val();
		getId(isi, 'box', $('#id_box'))
	})

	var getId = function(val, obj, target){
		$.ajax({
			url: url,
			type: 'post',
			data: {
				val: val,
				obj: obj
			},
			success: function(res){
				var r = JSON.parse(res)
				target.html(r.query)
			}
		})
	}

	$(document).on('change', '.btn-file :file', function() {
		  var input = $(this),
		  numFiles = input.get(0).files ? input.get(0).files.length : 1,
		  label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
		  // console.log();
	  input.trigger('fileselect', [numFiles, label]);
	});
	$("#combobox").change(function() {
		var value = $(this).val();
		  $.ajax({
			url: '<?php echo base_url(); ?>arsip/kapal/'+value,
			async:true,
			success: function(data) {
				$('#kapal').html(data);				
				 }
		});
	});
	
	$("#ok").click(function() {
		var jenis='<?php echo $json_jenis; ?>';
		var valjenis=$('#jenis_ijin').val();
		var var_jenis=valjenis.split('|');
		var valstatus=$('#status_ijin').val();
		var noijin=$('#no_ijin').val();
		jenis =JSON.parse(jenis);
		if(valjenis!='' && valstatus!='' && noijin !='' ){
			$.each(jenis,function(key,val){
				if(var_jenis[0]==val.id){
					var kode_arsip=val.kode+'.'+valstatus+'.'+noijin;
					$('#kode_arsip').val(kode_arsip);
				}
			});
		}else if(noijin ==''){
			alert('no ijin masih kosong!!!');
		}else if(valjenis ==''){
			alert('jenis ijin masih kosong!!!');
		}else{
			alert('status ijin masih kosong!!!');
		}
	});
	$( "#jenis_ijin" ).change(function() {
		var value = $(this).val().split('|');
		  $.ajax({
			url: '<?php echo base_url(); ?>arsip/status_ijin/'+value[0],
			async:true,
			success: function(data) {
				$('#statusijin').html(data);				
				 }
		});
	});
	$(document).ready(function() {
		$('.btn-file :file').on('fileselect', function(event, numFiles, label) {
			// alert('ok');
			var input = $(this).parents('.input-group').find(':text'),
				log = numFiles > 1 ? numFiles + ' files selected' : label;
			if( input.length ) {
				input.val(log);
			} else {
				if( log ) alert(log);
			}
			
		});
	});
	function addVariables(){
		var varGroups = document.getElementById("variablegroups");
		var rnumber=Math.random();
		 // var htmls = '<div class="form-group"><label class="control-label col-sm-1">Judul</label><div class="controls col-sm-4"><input name="judul_files[]" class="form-control" type="text" placeholder="Enter no Judul"></div><label class="control-label col-sm-1">Files</label><div class="controls col-sm-4"> <input name="file_lampiran[]" type="file" ></div><div class="controls col-sm-1"><a class="btn btn-danger" onClick=\"deleteThisVar(this);\"><i class="fa fa-times"></i></a></div></div>';
		 var htmls = ''+
				'<tr>'+
					'<td>'+
						'<input name="judul_files[]" class="form-control" type="text" placeholder="Enter no Judul">'+
					'</div>'+
					'</td>'+
					'<td>'+
					    '<input name="file_lampiran[]" type="file" >'+
					'</div>'+
					'</td>'+
					'<td><a class="btn btn-danger" onClick=\"deleteRules(this);\"><i class="fa fa-times"></i> Hapus</a></td>'+
				'</tr>';

		$("#variablegroups").append(htmls);	
		// $("#variablegroups").append($("<div class='input-group' id=\'"+ rnumber +"\'>"+ htmls +"</div>"));	
	}
	function deleteThisVar(obj){
		obj.parentNode.parentNode.parentNode.parentNode.removeChild(obj.parentNode.parentNode.parentNode);
	}

	function deleteRules(val){

		var par = $(val).closest('tr'); //tr
		if(confirm('Anda yakin?'))
		{
			par.remove();
		}
		return false;
	}; 
	</script>