<?php
// echo "<pre>";
// var_dump($dir);
// echo "</pre>";
?>

<div class="span9">
	<div class="widget widget-nopad">
		<div class="widget-header"> <i class="icon-list-alt"></i>
			<h3> Input Form</h3>
		</div>
		<div class="widget-content">
		<div class="widget big-stats-container">
			<div class="widget-content" style="padding: 0px">

			<form id="formAJax" name="form1" action="<?php echo base_url();?>home/frame" method="post" target="iframeku">
				<fieldset>
				<div class="span4">
					<div class="control-group">											
						<label class="control-label" for="nama">Perusahaan</label>
						<div class="controls">
							<input type="text" class="span4" id="pt" name="pt" placeholder="nanti dropdown / autocomplete">
						</div>			
					</div>
				</div>
				<div class="span4">
					<div class="control-group">											
						<label class="control-label" for="parent">Jenis Izin</label>
						<div class="controls">
							<input type="text" class="span4" id="jenis" name="jenis" placeholder="nanti dropdown">
						</div>											
					</div>
				</div>
				<div class="span4">
					<div class="control-group">											
						<label class="control-label" for="urutan">Nama Kapal</label>
						<div class="controls">
							<input type="text" class="span4" id="kapal" name="kapal" placeholder="nanti dropdown / autocomplete">
						</div>											
					</div>
				</div>
				<div class="span4">
					<div class="control-group">											
						<label class="control-label" for="urutan">Tahun</label>
						<div class="controls">
							<input type="text" class="span4" id="tahun" name="tahun" placeholder="nanti dropdown">
						</div>											
					</div>
				</div>
				<div class="span4">
					<div class="control-group">											
						<label class="control-label" for="urutan">File</label>
						<div class="controls">
							<input type="text" class="span4" id="file" name="file" placeholder="nanti dropdown">
						</div>											
					</div>
				</div>
				<div class="span4">
					<div class="control-group">											
						<label class="control-label" for="urutan">Lihat Dokumen</label>
						<div class="controls">
							<button id="send" class="btn">Lihat</button>
						</div>											
					</div>
				</div>
				</fieldset>


			</fom>

				<iframe src="<?php echo base_url();?>home/frame" style="display: none" name="iframeku" id="frame" class="iframeku" frameborder="0"></iframe>
			
			</div>
		</div>
		</div>
	</div>
</div>

<!--<div class="span6">
	<div class="widget">
		<div class="widget-header"> <i class="icon-bookmark"></i>
			<h3> Shortcuts Apps</h3>
		</div>
		<div class="widget-content">
		<div class="widget big-stats-container">
			<div class="widget-content">
				<iframe src="<?php echo base_url();?>home/frame" class="iframeku" frameborder="0"></iframe>
			</div>
		</div>
		</div>
	</div>
</div>-->

<script type="text/javascript">
$(function(){
	$('#send').on('click', function(e){
		$('#formAJax').submit();


		$('#frame').css('display', 'block');
		e.preventDefault();
	})
})
</script>