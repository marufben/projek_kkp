<div class="row">
    <div class="col-md-12">

        <div class="panel panel-success panel-clean">
            <div class="panel-heading">
                <h4 class="panel-title"><?php echo $title;?></h4>
                <div class="panel-options">
                    <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                    <a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a>
                    <a href="#" data-rel="close"><i class="fa fa-fw fa-times"></i></a>
                </div>
            </div>
            <div class="panel-body">
            	<div class="form-horizontal form-bordered">

	            	<div class="form-group">
						<label for="inputEmail5" class="col-sm-2 control-label">Dasar Hukum</label>
						<div class="col-sm-4">
							<label for="inputEmail5" class="col-sm-4 control-label"><?php echo $list->legal;?></label>
						</div>
					</div>
	            	<div class="form-group">
						<label for="inputEmail5" class="col-sm-2 control-label">Batas Tahun Retensi</label>
						<div class="col-sm-4">
							<label for="inputEmail5" class="col-sm-4 control-label"><?php echo $list->batas;?> Tahun&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
						</div>
					</div>

	            	<div class="form-group">
						<label for="inputEmail5" class="col-sm-2 control-label">Tahun</label>
						<div class="col-sm-4">
							<select class="form-control" id="tahun" name='tahun'>
								<option>--Pilih--</option>
								<?php
								$time = strtotime("-50 year", time());
	  							$date = date("Y", $time);
								$thn = date('Y');
								for ($i=$date; $thn > $i ; $thn--) { 
									echo "<option>".$thn."</option>";
								}
								?>
							</select>
						</div>
					</div>
            	</div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">

        <div class="panel panel-success panel-clean">
            <div class="panel-heading">
                <h4 class="panel-title">Hasil</h4>
            </div>
            <div class="panel-body">
            	<div id="hasil">
				</div>
            </div>
        </div>	
    </div>		
</div>			

<script type="text/javascript">
var link  = '<?php echo base_url();?>setupretensi/cari';

$('#tahun').on('change', function(){
	cari(link, $(this).val())
})

var cari = function(a, v){
	$.ajax({
		url: a,
		type: 'post',
		data: {
			tahun: v
		},
		success: function(res){
			var val = JSON.parse(res);
			$('#hasil').html(val.html)
		}
	})
}
</script>