<div class="row">
	<div class="col-md-12">
		<?php $config = array('class'=>'form-horizontal form-bordered', 'id'=>'formAddmenu'); echo form_open('aturan_peminjaman/update', $config);?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title"><?php echo $title; ?></h4>

                <div class="panel-options">
                    <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                    <!-- <a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a> -->
                    <a href="#" data-rel="close"><i class="fa fa-fw fa-times"></i></a>
                </div>
            </div>
            <div class="panel-body">
							
                <div class="form-group">
                    <label for="inputPassword5" class="col-sm-2 control-label">Tipe Keanggotaan</label>
                    <div class="col-sm-4">
                    	<input type="hidden" class="form-control"  name="id" value="<?php echo $nilai['id']; ?>">
                        <select class='form-control' name="tipe_keanggotaan" id="tipe_keanggotaan">
						<?php
						foreach ($tipe_keanggotaan as $key => $value) {
							# code...
							echo "<option value='".$value->id."'>".$value->member_type_name."</option>";
						}
						?>
						</select>
                    </div>
                </div>
				<div class="form-group">
                    <label for="inputPassword5" class="col-sm-2 control-label">Tipe Koleksi</label>
                    <div class="col-sm-4">
                        <select class='form-control' name="tipe_koleksi" id="tipe_koleksi">
							<?php
								foreach ($tipe_koleksi as $key => $value) {
								# code...
									$selected = ($nilai['id_type_koleksi'] == $value->id)?"selected":"";		
									echo "<option value='".$value->id."' $selected>".$value->nama_tipe."</option>";
								}
							?>
						</select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputPassword5" class="col-sm-2 control-label">GMD</label>
                    <div class="col-sm-4">
                        <select class='form-control' name="gmd" id="gmd">
							<?php
								foreach ($gmd as $key => $value) {
									$selected = ($nilai['id_gmd'] == $value->id)?"selected":"";	
									echo "<option value='".$value->id."' $selected>".$value->gmd_name."</option>";
								}
							?>
						</select>
                    </div>
                </div>

                <div class="form-group">
					<label for="inputEmail5" class="col-sm-2 control-label">Jumlah Pinjaman</label>
					<div class="col-sm-1">
						<input type="text" class="form-control" id="jumlah_pinjaman" name='jumlah_pinjaman' value="<?php echo $nilai['jumlah_pinjaman'];?>" placeholder="">
					</div>
				</div>

				<div class="form-group">
					<label for="inputEmail5" class="col-sm-2 control-label">Periode Peminjaman</label>
					<div class="col-sm-1">
						<input type="text" class="form-control" id="periode_peminjaman" name='periode_peminjaman' value="<?php echo $nilai['periode_peminjaman'];?>" placeholder="">
					</div>
				</div>

				<div class="form-group">
					<label for="inputEmail5" class="col-sm-2 control-label">Kali Perpanjangan</label>
					<div class="col-sm-1">
						<input type="text" class="form-control" id="kali_perpanjangan" name='kali_perpanjangan' value="<?php echo $nilai['kali_perpanjangan'];?>" value="0" placeholder="">
					</div>
				</div>

				<div class="form-group">
					<label for="inputEmail5" class="col-sm-2 control-label">Denda Harian</label>
					<div class="col-sm-2">
						<input type="text" class="form-control" id="denda_harian" name='denda_harian' value="<?php echo $nilai['denda_harian'];?>" >
					</div>
				</div>

				<div class="form-group">
					<label for="inputEmail5" class="col-sm-2 control-label">Toleransi Keterlambatan</label>
					<div class="col-sm-2">
						<input type="text" class="form-control" id="keterlambatan" name='keterlambatan' value="<?php echo $nilai['toleransi_keterlambatan'];?>" placeholder="">
					</div>
				</div>

				<div class="form-group">
                    <div class="col-sm-offset-4 col-sm-8">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="<?php echo site_url('aturan_peminjaman');?>" class="btn btn-default">Cancel</a>
                    </div>
                </div>
				
			</div>
            </form>
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

var menu = '<?php echo json_encode($menu); ?>',
	jMenu = JSON.parse(menu),
	cmbmenu = $('#menu_id');

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
			'<td><input type="hidden" name="update[]" value="'+obj.update+'"/><input type="checkbox" onclick="click_checkbox(this,5)" '+obj.update_check+'/></td>'+
			'<td><input type="hidden" name="hapus[]" value="'+obj.hapus+'"/><input type="checkbox" onclick="click_checkbox(this,6)" '+obj.hapus_check+'/></td>'+
			'<td><a style="cursor:pointer;" class="btn btn-danger hapusRowRules" title="Hapus" onclick="deleteRules(this, '+obj.modul_kode+')"><i class="icon-trash"></i> Hapus</a></td></tr>'
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
}; 
</script>