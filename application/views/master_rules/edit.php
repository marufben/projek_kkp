<div class="row">
	<div class="col-md-12">
		<?php $config = array('class'=>'form-horizontal', 'id'=>'formUbahRules'); echo form_open('rules_c/update', $config);?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">Ubah Hak Akses</h4>

                <div class="panel-options">
                    <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                    <!-- <a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a> -->
                    <a href="#" data-rel="close"><i class="fa fa-fw fa-times"></i></a>
                </div>
            </div>
            <div class="panel-body">


			
				<div class="form-group">											
					<label class="col-sm-2 control-label" for="group_id">Group Pengguna</label>
					<div class="col-sm-4">
						<!-- <select class="span6" name="group_id" id="group_id"  onchange="cekValue(this)"> -->

							<?php
							foreach ($group as $key => $value) {
								$selected = ($group_id == $value->id)?"selected":"";
								// echo "<option value='".$value->id."' ".$selected.">".$value->nama."</option>";
								$input = '<input type="hidden" name="group_id" value="'.$value->id.'">';
								$input .= '<input type="text" class="form-control" readonly value="'.$value->nama.'">';
								if($group_id == $value->id){
									echo $input;
								}
							}
							?>
						<!-- </select> -->
					</div>											
				</div>
				
				<div class="form-group">											
					<label class="col-sm-2 control-label" for="group_id">Menu</label>
					<div class="col-sm-4">
						<select class="form-control" name="menu_id" id="menu_id">

							<?php
							$dis = array();
							foreach ($menu as $key => $value) {
								foreach ($rules as $keys => $val) {
									if($value->id == $val->menu_id){
										$dis[$value->id] = 'disabled'; 
									}else{
										$dis[] = ''; 
									}
								}
								echo "<option value='".$value->id."' ".$dis[$value->id].">".$value->nama."</option>";
							}
							?>
						</select>
						<?php //echo"<pre>";var_dump($dis);echo "</pre>";?>
					</div>											
				</div>

				<div class="form-group">										
					<div class="col-sm-4">
						<button class="btn" onclick="addRules()" type="button"><i class="icon-plus-sign"></i>Tambah</button>
					</div>
				</div>

				<div class="form-group">											
					<div class="col-sm-8">
						<table id="rules-table" class="table table-striped table-bordered table-hover table-full-width">
							<thead>
								<th>
									Id
								</th>
								<th>
									Nama
								</th>
								<th>
									Pribadi
								</th>
								<th>
									Tampil
								</th>
								<th>
									Tambah
								</th>
								<th>
									Update
								</th>
								<th>
									Hapus
								</th>
								<th>
									Aksi
								</th>
							</thead>
							<tbody>
							
							<?php
							foreach ($rules as $key => $val) {
								$loads = ($val->loads == '1') ? "checked":"";
								$creates = ($val->creates == '1') ? "checked":"";
								$updates = ($val->updates == '1') ? "checked":"";
								$deletes = ($val->deletes == '1') ? "checked":"";
								$private = ($val->private == '1') ? "checked":"";
							?>
								<tr>
									<td>
										<?php echo $val->menu_id;?>
										<input type="hidden" name="id[]" value="<?php echo $val->id;?>"/>
										<input type="hidden" name="menu_id_e[]" value="<?php echo $val->menu_id;?>"/>
									</td>
									<td>
										<?php echo $val->nama;?>
									</td>
									<td>
										<input type="hidden" name="pribadi_e[]" value="<?php echo $val->private;?>"/>
										<input type="checkbox" onclick="click_checkbox(this,2)" <?=$private?>/>
									</td>
									<td>
										<input type="hidden" name="tampil_e[]" value="<?php echo $val->loads;?>"/>
										<input type="checkbox" onclick="click_checkbox(this,3)" <?=$loads?>/>
									</td>
									<td>
										<input type="hidden" name="tambah_e[]" value="<?php echo $val->creates;?>"/>
										<input type="checkbox" onclick="click_checkbox(this,4)" <?=$creates?>/>
									</td>
									<td>
										<input type="hidden" name="updates_e[]" value="<?php echo $val->updates;?>"/>
										<input type="checkbox" onclick="click_checkbox(this,5)" <?=$updates?>/>
									</td>
									<td>
										<input type="hidden" name="hapus_e[]" value="<?php echo $val->deletes;?>"/>
										<input type="checkbox" onclick="click_checkbox(this,6)" <?=$deletes?>/>
									</td>
									<td>
										<a style="cursor:pointer;" class="btn btn-danger" title="Hapus" id="hapusRowRules" onclick="deleteRules(this, <?php echo $val->menu_id;?>)">
											<i class="icon-trash"></i> 
											Hapus
										</a>
									</td>
								</tr>
							<?php
							}
							?>
							
							</tbody>
						</table>
					</div>
				</div>

			</div>

				<div class="form-group">
                    <div class="col-sm-offset-4 col-sm-8">
						<button class="btn" onclick="goBack()" type="button">Batal</button>
						<button class="btn btn-primary" type="submit">Simpan</button>
					</div>
				</div>

			</form>

			<!-- </div> -->
		</div>
		</div>
	</div>
</div>

<script type="text/javascript">
function addRules()
{
	var obj = {
		id:'',
		modul_kode : $('#menu_id').val(),
		name : $('#menu_id').find('option:selected').text(),
		tampil : '1',
		tampil_check : 'checked',
		tambah : '1',
		tambah_check : 'checked',
		pribadi : '1',
		pribadi_check : 'checked',
		update : '1',
		update_check : 'checked',
		hapus : '1',
		hapus_check : 'checked'
		};
	add_row_rules(obj);
}

var i =0;
// var menu = '<?php //echo json_encode($menu); ?>',
// 	jMenu = JSON.parse(menu);
var cmbmenu = $('#menu_id');

function add_row_rules(obj)
{	
	var attR = cmbmenu.find('option[value="'+obj.modul_kode+'"]');

	if(attR.attr('disabled') === 'disabled'){
		alert('Tidak bisa memilih '+obj.name+' lagi.')
	}else{
		$('#rules-table').append(
			'<tr>' +
			'<td><input type="hidden" name="menu_id[]" value="'+obj.modul_kode+'"/>'+obj.modul_kode+'</td>'+
			'<td><input type="hidden" name="id[]" value="'+obj.id+'"/>'+obj.name+'</td>'+
			'<td><input type="hidden" name="pribadi[]" value="'+obj.pribadi+'"/><input type="checkbox" onclick="click_checkbox(this,2)" '+obj.pribadi_check+'/></td>'+
			'<td><input type="hidden" name="tampil[]" value="'+obj.tampil+'"/><input type="checkbox" onclick="click_checkbox(this,3)" '+obj.tampil_check+'/></td>'+
			'<td><input type="hidden" name="tambah[]" value="'+obj.tambah+'"/><input type="checkbox" onclick="click_checkbox(this,4)" '+obj.tambah_check+'/></td>'+
			'<td><input type="hidden" name="updates[]" value="'+obj.update+'"/><input type="checkbox" onclick="click_checkbox(this,5)" '+obj.update_check+'/></td>'+
			'<td><input type="hidden" name="hapus[]" value="'+obj.hapus+'"/><input type="checkbox" onclick="click_checkbox(this,6)" '+obj.hapus_check+'/></td>'+
			'<td><a style="cursor:pointer;" class="btn btn-danger" title="Hapus" id="hapusRowRules" onclick="deleteRules(this, '+obj.modul_kode+')"><i class="icon-trash"></i> Hapus</a></td></tr>'
		);
		cmbmenu.find('option[value="'+obj.modul_kode+'"]').attr('disabled',true);
	}
}

function click_checkbox(tr, index)
{
	if($(tr).is(':checked'))
	{
		$(tr).parents('tr').find('td:eq('+index+') input').val('1');
	}
	else
	{
		$(tr).parents('tr').find('td:eq('+index+') input').val('0');
	}
}

function deleteRules(val, id){

	var par = $(val).closest('tr'); //tr
	if(confirm('Anda yakin?'))
	{
		par.remove();
		cmbmenu.find('option[value="'+id+'"]').attr('disabled',false);
	}
	return false;
} 
</script>