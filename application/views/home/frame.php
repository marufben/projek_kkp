<div class="row">
    <div class="col-md-12">
        <div class="panel panel-success panel-clean">
            <div class="panel-heading">
                Lihat Data

                <div class="panel-options">
                    <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                    <!-- <a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a> -->
                    <a href="#" data-rel="close"><i class="fa fa-fw fa-times"></i></a>
                </div>
            </div>
            <div class="panel-body" id="panel1">
            	<form id="formAJax" name="form1" action="<?php echo base_url();?>home/frame" method="post" target="iframeku">
	                <div class="row">
	                    <div class="col-sm-6">
	                        <div class="form-group">
	                            <label class="control-label" for="exampleInputName6">Perusahaan</label>
	                            <select id="pt" name="pt" class="form-control pt">
	                            	<option value="0">--Pilih--</option>
	                            	<?php foreach ($dir as $key => $value) { ?>
	                            	<option value="<?php echo $value;?>"><?php echo $value;?></option>
	                            	<?php } ?>
	                            </select>

	                        </div>
	                    </div>
	                    <div class="col-sm-6">
	                        <div class="form-group">
	                            <label class="control-label" for="exampleInputCompany6">Jenis Izin</label>
	                            <select id="jenis" name="jenis" class="form-control jenis" disabled>
	                            	
	                            </select>
	                        </div>
	                    </div>
	                </div>
	                <div class="row">
	                    <div class="col-sm-6">
	                        <div class="form-group">
	                            <label class="control-label" for="exampleInputEmail6">Nama Kapal</label>
	                            <select id="kapal" name="kapal" class="form-control kapal" disabled>
	                            	
	                            </select>
	                        </div>
	                    </div>
	                    <div class="col-sm-6">
	                        <div class="form-group">
	                            <label class="control-label" for="exampleInputWebsite6">Tahun</label>
	                            <select id="tahun" name="tahun" class="form-control tahun" disabled>
	                            	
	                            </select>
	                        </div>
	                    </div>
	                </div>
	                <div class="row">
	                    <div class="col-sm-6">
	                        <div class="form-group">
	                            <label class="control-label" for="exampleInputEmail6">File</label>
	                            <select id="file" name="file" class="form-control file" disabled>
	                            	
	                            </select>
	                        </div>
	                    </div>
	                </div>
	                <div class="form-group text-right">
                        <button type="button" id="unduh1" link="kampret" class="btn btn-warning">Download</button>
                        <button type="button" id="send" class="btn btn-primary">Lihat</button>
                    </div>
            	</form>
            </div>
        </div>
    </div>
</div>

<div class="row" id="res-frame" style="display: none">
    <div class="col-md-12">
        <div class="panel panel-success panel-clean">
            <div class="panel-heading">
                Hasil Pencarian

                <div class="panel-options">
                    <!-- <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a> -->
                    <!-- <a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a> -->
                    <!-- <a href="#" data-rel="close"><i class="fa fa-fw fa-times"></i></a> -->
                </div>
            </div>
            <div class="panel-body">
            	<div class="form-group text-right">
				    <button type="button" id="comp" class="btn btn-warning" value="open">Bandingkan</button>
				</div>
	            <iframe src="<?php echo base_url();?>home/frame" style="display: none" name="iframeku" id="frame" class="iframeku col-sm-6" frameborder="0"></iframe>
            </div>
        </div>
    </div>
</div>
<!-- template baru -->
<!-- bandingkan file -->
<div class="row" id="compare-row" style="display: none">
    <div class="col-md-12">
        <div class="panel panel-success panel-clean">
            <div class="panel-heading">
                Bandingkan File

                <div class="panel-options">
                    <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                    <!-- <a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a> -->
                    <a href="#" data-rel="close"><i class="fa fa-fw fa-times"></i></a>
                </div>
            </div>
            <div class="panel-body" id="panel2">
            	<form id="formAJax2" name="form1" action="<?php echo base_url();?>home/frame" method="post" target="iframeku2">
	                <div class="row">
	                    <div class="col-sm-6">
	                        <div class="form-group">
	                            <label class="control-label" for="exampleInputName6">Perusahaan</label>
	                            <select id="pt" name="pt" class="form-control pt">
	                            	<option value="0">--Pilih--</option>
	                            	<?php foreach ($dir as $key => $value) { ?>
	                            	<option value="<?php echo $value;?>"><?php echo $value;?></option>
	                            	<?php } ?>
	                            </select>

	                        </div>
	                    </div>
	                    <div class="col-sm-6">
	                        <div class="form-group">
	                            <label class="control-label" for="exampleInputCompany6">Jenis Izin</label>
	                            <select id="jenis" name="jenis" class="form-control jenis" disabled>
	                            	
	                            </select>
	                        </div>
	                    </div>
	                </div>
	                <div class="row">
	                    <div class="col-sm-6">
	                        <div class="form-group">
	                            <label class="control-label" for="exampleInputEmail6">Nama Kapal</label>
	                            <select id="kapal" name="kapal" class="form-control kapal" disabled>
	                            	
	                            </select>
	                        </div>
	                    </div>
	                    <div class="col-sm-6">
	                        <div class="form-group">
	                            <label class="control-label" for="exampleInputWebsite6">Tahun</label>
	                            <select id="tahun" name="tahun" class="form-control tahun" disabled>
	                            	
	                            </select>
	                        </div>
	                    </div>
	                </div>
	                <div class="row">
	                    <div class="col-sm-6">
	                        <div class="form-group">
	                            <label class="control-label" for="exampleInputEmail6">File</label>
	                            <select id="file" name="file" class="form-control file" disabled>
	                            	
	                            </select>
	                        </div>
	                    </div>
	                </div>
	                <div class="form-group text-right">
                        <button type="button" id="unduh2" class="btn btn-warning">Download</button>
                        <button type="button" id="kirim" class="btn btn-primary">Lihat</button>
                    </div>
            	</form>
            </div>
        </div>
    </div>
</div>
<div class="row" id="res-frame2" style="display: none">
    <div class="col-md-12">
        <div class="panel panel-success panel-clean">
            <div class="panel-heading">
                Hasil Pencarian

                <div class="panel-options">
                    <!-- <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a> -->
                    <!-- <a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a> -->
                    <!-- <a href="#" data-rel="close"><i class="fa fa-fw fa-times"></i></a> -->
                </div>
            </div>
            <div class="panel-body">
	            <iframe src="<?php echo base_url();?>home/frame" style="display: none" name="iframeku2" id="frame2" class="iframeku col-sm-6" frameborder="0"></iframe>
            </div>
        </div>
    </div>
</div>
<!-- bandingkan file -->
<script type="text/javascript">
$(function(){

	// tampil dokumen
	$('#send').on('click', function(e){
		$('#formAJax').submit();


		$('#res-frame').css('display', 'block');
		$('#frame').css('display', 'block');
		e.preventDefault();
	})

	$('#kirim').on('click', function(e){
		$('#formAJax2').submit();


		$('#res-frame2').css('display', 'block');
		$('#frame2').css('display', 'block');
		e.preventDefault();
	})

	// Unduh
	$('#unduh1').on('click', function(){
		var file = $('.file option:selected');
		if(file.val() == '' || file.val() == 0){
			alert('File belum dipilih')
		}else{
			window.location = '<?php echo base_url();?>public/FILES/'+file.val();
		}
	})
	$('#unduh2').on('click', function(){
		var file = $('.file option:selected');
		if(file.val() == '' || file.val() == 0){
			alert('File belum dipilih')
		}else{
			window.location = '<?php echo base_url();?>public/FILES/'+file.val();
		}
	})

	// Bandingkan File
	$('#comp').on('click', function(){
		var val = $(this).val();
		if(val == 'open'){		
			$('#panel1').hide(1000, function(){
				$('#compare-row').css('display','block')
			})		
			$(this).val('close')
			$(this).html('Kembali')
		}else{			
			$('#panel1').show(1000, function(){
				$('#compare-row').css('display','none')
			})
			$(this).val('open')
			$(this).html('Bandingkan')
		}
	})

	// Ubah Nama Perusahaan
	$('.pt').on('change', function(){
		var n = $(this);
		listDir(n.val(), $('.jenis'))
	})

	// Ubah Jenis Izin
	$('.jenis').on('change', function(){
		var n = $(this);
		listDir(n.val(), $('.kapal'))
	})

	// Ubah Kapal
	$('.kapal').on('change', function(){
		var n = $(this);
		listDir(n.val(), $('.tahun'))
	})

	// Ubah Tahun
	$('.tahun').on('change', function(){
		var n = $(this);
		listDir(n.val(), $('.file'))
	})

	var url = "<?php echo base_url();?>home/dirFiles";
	var listDir = function(par, id){
		$.ajax({
			url: url,
			type: 'post',
			data:{
				par: par
			},
			success: function(res){
				var obj = JSON.parse(res),
					html = '<option value="0">--Pilih--</option>',
					len;

				len = Object.keys(obj).length;
				if(len > 0){

					$.each(obj, function(i, val) {
				    	html += '<option value="'+par+'/'+val+'">'+val+'</option>'; 
				    });
				    id.html(html)
				    id.attr('disabled', false)
				}else{
					alert('Belum ada folder')
					$('#formAJax')[0].reset()
				}
			    
				console.log();
			}
		})
	}
})
</script>