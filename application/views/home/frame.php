<div class="row">
    <div class="col-md-12">
        <div class="panel panel-success panel-clean">
            <div class="panel-heading">
                Lihat Data

                <div class="panel-options">
                    <!-- <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a> -->
                    <!-- <a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a> -->
                    <!-- <a href="#" data-rel="close"><i class="fa fa-fw fa-times"></i></a> -->
                </div>
            </div>
            <div class="panel-body" id="panel1">
            	<form id="formAJax" name="form1" action="<?php echo base_url();?>home/frame" method="post" target="iframeku">
	                <div class="row">
	                    <div class="col-sm-6">
	                        <div class="form-group">
	                            <label class="control-label" for="exampleInputName6">Perusahaan</label>
	                            <select id="pt" name="pt" class="form-control">
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
	                            <select id="jenis" name="jenis" class="form-control" disabled>
	                            	
	                            </select>
	                        </div>
	                    </div>
	                </div>
	                <div class="row">
	                    <div class="col-sm-6">
	                        <div class="form-group">
	                            <label class="control-label" for="exampleInputEmail6">Nama Kapal</label>
	                            <select id="kapal" name="kapal" class="form-control" disabled>
	                            	
	                            </select>
	                        </div>
	                    </div>
	                    <div class="col-sm-6">
	                        <div class="form-group">
	                            <label class="control-label" for="exampleInputWebsite6">Tahun</label>
	                            <select id="tahun" name="tahun" class="form-control" disabled>
	                            	
	                            </select>
	                        </div>
	                    </div>
	                </div>
	                <div class="row">
	                    <div class="col-sm-6">
	                        <div class="form-group">
	                            <label class="control-label" for="exampleInputEmail6">File</label>
	                            <select id="file" name="file" class="form-control" disabled>
	                            	
	                            </select>
	                        </div>
	                    </div>
	                </div>
	                <div class="form-group text-right">
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
				    <button type="button" id="comp" class="btn btn-warning">Bandingkan</button>
				</div>
	            <iframe src="<?php echo base_url();?>home/frame" style="display: none" name="iframeku" id="frame" class="iframeku col-sm-6" frameborder="0"></iframe>
            </div>
        </div>
    </div>
</div>
<!-- template baru -->

<script type="text/javascript">
$(function(){
	$('#send').on('click', function(e){
		$('#formAJax').submit();


		$('#res-frame').css('display', 'block');
		$('#frame').css('display', 'block');
		e.preventDefault();
	})

	// Bandingkan File
	$('#comp').on('click', function(){
		$('#panel1').slideToggle();
	})

	// Ubah Nama Perusahaan
	$('#pt').on('change', function(){
		var n = $(this);
		listDir(n.val(), $('#jenis'))
	})

	// Ubah Jenis Izin
	$('#jenis').on('change', function(){
		var n = $(this);
		listDir(n.val(), $('#kapal'))
	})

	// Ubah Kapal
	$('#kapal').on('change', function(){
		var n = $(this);
		listDir(n.val(), $('#tahun'))
	})

	// Ubah Tahun
	$('#tahun').on('change', function(){
		var n = $(this);
		listDir(n.val(), $('#file'))
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

	// AutoComplete
	// var s = "<?php echo base_url();?>home/dirFiles";
	// $("#pt").autocomplete({
	// 	source: function(req, res){
	// 	      $.ajax({
	// 	        url: s,
	// 	        dataType: "json",
	// 	        async: true,
	// 	        data: {term: req.term},
	// 	        success: function(data){
	// 	          if(data){
	// 	            var found = $.map(data, function(item){
	// 	                    return {
	// 	                      label:item.label,
	// 	                      value: item.value,
	// 	                      desc: item.desc
	// 	                    };
	// 	                  });
	// 	            res(found);           
	// 	          }else{
	// 	            // var d = $("#izinPPKH").val() + " belum terdaftar";
	// 	            // $('#erPPKH').html(d)
	// 	          }
	// 	        },
	// 	        error: function(){
	// 	          res([]);
	// 	        }
	// 	      });
	// 	},
	// 	minLength: 1,
	// 	focus: function(event, ui){
	// 		$('#pt').val(ui.item.label);
	// 		return false;
	// 	},
	// 	select: function(event, ui){
	// 		$('#pt').val(ui.item.value);
	// 		// $('#alamat').val(ui.item.desc);
	// 		// return false;
	// 	}
	// });
})
</script>