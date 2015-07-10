<?php $config = array('class'=>'form-horizontal form-bordered', 'id'=>'formAddmenu', 'enctype'=>'multipart/form-data' ); echo form_open('arsip/insert', $config);?>
    <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title">Form Arsip</h4>
                <div class="panel-options">
                    <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                    <a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a>
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
						  <option selected>Select Perusahaan</option>
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
							<select class="form-control" name='kapal' id='kapal_combobox'>
								  <option selected>Select Kapal</option>
							</select>
						</div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2">Kode Barcode</label>

                    <div class="controls col-sm-4">
                        <input class="form-control" name='barcode' type="text" placeholder="Enter kode barcode">
                        
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">No.Ijin</label>

                    <div class="controls col-sm-4">
                        <input class="form-control" name='no_ijin' type="text" placeholder="Enter no ijin">
                        
                    </div>
                </div>

                 <div class="form-group">
                    <label class="control-label col-sm-2">Jenis Ijin</label>
                    <div class="controls col-sm-4">
                        <select class="form-control" name='jenis_ijin'>
                            <option value='SU'>SIUP</option>
                            <option value='SP'>SIPI</option>
                            <option value='SK'>SIKPI</option>
                            <option value='RU'>RUMPON</option>
                        </select>
                    </div>
                </div>

                 <div class="form-group">
                    <label class="control-label col-sm-2">Status Ijin</label>

                    <div class="controls col-sm-4">
                        <label class="checkbox-inline">
                            <input type="radio" name='status_ijin' value="1">
                            Baru
                        </label>
                        <label class="checkbox-inline">
                            <input type="radio" name='status_ijin' value="2" >
                            Perubahan
                        </label>
                        <label class="checkbox-inline">
                            <input type="radio" name='status_ijin' value="3">
                            Perpanjangan
                        </label>
                    </div>
                </div>

                <div class="form-group">
                        <label class="control-label col-sm-2">Tanggal Terbit</label>
					   <div class="controls col-sm-2">
						   <div class="input-group date">
							 <input type="text" name='terbit' id='terbit' class="form-control" data-rel="datepicker"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
						   </div>
                       </div>
					   <label class="control-label col-sm-2">Tanggal Expired</label>
					   <div class="controls col-sm-2">
						   <div class="input-group date">
							 <input type="text"  name='expired' id='expired' class="form-control" data-rel="datepicker"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
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
			<div class='form-group'>
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
			</div>
		</div>
		<div class="panel-footer">
            <div class="text-right">
              <button type="submit" class="btn btn-default">Save Arsip</button>
           </div>
        </div>
	</div>
    </form>
	<script>
	$(document).ready(function(){
		$('#terbit').datepicker({  format: 'dd-mm-yyyy', });
		$('#expired').datepicker({ format: 'dd-mm-yyyy', });
		$('#tgl_pembukuan').datepicker({ format: 'dd-mm-yyyy', });
		$('#combobox').combobox();
		// $('#kapal_combobox').combobox();
	});
	$(document).on('change', '.btn-file :file', function() {
		  var input = $(this),
		  numFiles = input.get(0).files ? input.get(0).files.length : 1,
		  label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
		  // console.log();
	  input.trigger('fileselect', [numFiles, label]);
	});
	$( "#combobox" ).change(function() {
		var value = $(this).val();
		  $.ajax({
			url: '<?php echo base_url(); ?>arsip/kapal/'+value,
			async:true,
			success: function(data) {
				$('#kapal').html(data);				
				 }
		});
	});
	$(document).ready(function() {
		$('.btn-file :file').on('fileselect', function(event, numFiles, label) {
			// alert('ok');
			var input = $(this).parents('.input-group').find(':text'),
				log = numFiles > 1 ? numFiles + ' files selected' : label;
			// console.log(log);
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
		 var htmls = '<div class="form-group"><label class="control-label col-sm-1">Judul</label><div class="controls col-sm-4"><input name="judul_files" class="form-control" type="text" placeholder="Enter no Judul"></div><label class="control-label col-sm-1">Files</label><div class="controls col-sm-4"> <input name="file_lampiran" type="file" ></div><div class="controls col-sm-1"><a class="btn btn-danger" onClick=\"deleteThisVar(this);\"><i class="fa fa-times"></i></a></div></div>';
		$("#variablegroups").append($("<div class='input-group' id=\'"+ rnumber +"\'>"+ htmls +"</div>"));	
	}
	function deleteThisVar(obj){
		obj.parentNode.parentNode.parentNode.parentNode.removeChild(obj.parentNode.parentNode.parentNode);
	}
	</script>