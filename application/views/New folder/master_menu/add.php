
<!--<div class="span6">
	<div class="widget widget-nopad">
		<div class="widget-header"> <i class="icon-list-alt"></i>
			<h3> Tambah Data</h3>
		</div>
		<div class="widget-content">
			<div class="widget big-stats-container">
				<div class="widget-content">

				<?php $config = array('class'=>'form-vertical', 'id'=>'formAddmenu'); echo form_open('menu_c/create', $config);?>
				
				<fieldset>
				<div class="span5">
					<div class="control-group">											
						<label class="control-label" for="nama">Nama</label>
						<div class="controls">
							<input type="text" class="span4" id="nama" name="nama">
						</div>			
					</div>
				</div>
				<div class="span5">
					<div class="control-group">											
						<label class="control-label" for="parent">Parent</label>
						<div class="controls">
							<select class="span4" name="parent">
								<option value="0">Parent - Parent</option>
								<?php
								foreach ($menu as $key => $value) {
									# code...
									echo "<option value='".$value->id."'>Child To - ".$value->nama."</option>";
								}
								?>
							</select>
						</div>											
					</div>
				</div>
				<div class="span1">
					<div class="control-group">											
						<label class="control-label" for="urutan">Urutan</label>
						<div class="controls">
							<input type="text" class="span1" id="urutan" name="urutan">
						</div>											
					</div>
				</div>
				<div class="span2">
					<div class="control-group">											
						<label class="control-label" for="urutan">Icon Name</label>
						<div class="controls">
							<input type="text" class="span2" id="iconMenu" name="icon" readonly>
						</div>											
					</div>
				</div>
				<div class="span1" style="margin-top: -5px">
					<div class="control-group">											
						<label class="control-label" for="urutan">&nbsp;</label>
						<div class="controls">
							<button class="btn span1" style="float: right;" onclick="lihatIcon()" type="button">Lihat</button>
						</div>											
					</div>
				</div>
				<div class="span5">
					<div class="control-group">											
						<label class="control-label" for="url">Url</label>
						<div class="controls">
							<input type="text" class="span4" id="url" name="url">
						</div>			
					</div>
				</div>

				<div class="span5">
					<div class="control-group">											
						<label class="control-label" for="status">Status</label>
						<div class="controls">
							<select name="status" class="span4">
								<option value="1">Aktif</option>
								<option value="0">Tidak Aktif</option>
							</select>
						</div>											
					</div>

				</fieldset>
				</div>

				<div class="span5">
					<div class="control-group">											
						<div class="controls">
							<button class="btn" onclick="goBack()" type="button">Batal</button>
							<button class="btn btn-primary" type="submit">Simpan</button>
						</div>
					</div>
				</div>
				</form>

				</div>
			</div>
		</div>
	</div>

	<div class="span6" id="lihatIcon">

	</div>

</div>--> 

<script type="text/javascript">
function lihatIcon(){
	var url = "<?php echo base_url();?>menu_c/tampilIcon";
	$.ajax({
		url:url,
		success: function(res){
			$('#lihatIcon').html(res);
		}
	})
}
</script>

<div class="col-md-12">
			<?php $config = array('class'=>'form-horizontal form-bordered', 'id'=>'formAddmenu'); echo form_open('menu_c/create', $config);?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">Bordered Form with Legend</h4>

                        <p>Add <code>.form-bordered</code> to your horizontal form.</p>
                        <div class="panel-options">
                            <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                            <a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a>
                            <a href="#" data-rel="close"><i class="fa fa-fw fa-times"></i></a>
                        </div>
                    </div>
                    <div class="panel-body">
            
								<legend class="form-legend">
									<span>Form Menu</span>
								</legend>
							<div class="form-group">
								<label for="inputEmail5" class="col-sm-2 control-label">Nama</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" id="nama" name='nama' placeholder="nama">
								</div>
							</div>
                            <div class="form-group">
                                <label for="inputPassword5" class="col-sm-2 control-label">Password</label>
                                <div class="col-sm-4">
                                    <select name="parent" class='form-control'>
										<option value="0">Parent - Parent</option>
										<?php
										foreach ($menu as $key => $value) {
											# code...
											echo "<option value='".$value->id."'>Child To - ".$value->nama."</option>";
										}
										?>
									</select>
                                </div>
                            </div>
						<div class="form-group">
                                <label for="inputEmail5" class="col-sm-2 control-label">Urutan</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="urutan" name='urutan' placeholder="urutan">
                                </div>
                         </div>
						 <div class="form-group">
                                <label for="inputEmail5" class="col-sm-2 control-label">Icon-Menu</label>
                                <div class="col-sm-4">
									<div class="input-group">
										<input type="text" class="form-control" id="iconMenu" name='icon' placeholder="icon">
										<span class="input-group-btn">
											<button class="btn btn-primary" type="button" onclick="lihatIcon()">Lihat</button>
										</span>
									</div>
                                </div>
                         </div>
						 <div class="form-group">
                                <label for="inputEmail5" class="col-sm-2 control-label">Url</label>
                                <div class="col-sm-6">
                                    <input type="email" class="form-control" id="url" name='url' placeholder="icon">
                                </div>
                         </div>
						 <div class="form-group">
                                <label for="inputEmail5" class="col-sm-2 control-label">Status</label>
                                <div class="col-sm-2">
                                    <select name="status" class="form-control">
										<option value="1">Aktif</option>
										<option value="0">Tidak Aktif</option>
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
<div id="lihatIcon"></div>