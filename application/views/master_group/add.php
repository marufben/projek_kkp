<div class="row">
	<div class="col-md-12">
				<?php 
					$config = array('class'=>'form-horizontal form-bordered', 'id'=>'formAddmenu'); 
					echo form_open('menu_c/create', $config);
				?>
	    <div class="panel panel-default">
	        <div class="panel-heading">
	            <h4 class="panel-title">Tambah Group</h4>

	            <div class="panel-options">
	                <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
	                <!-- <a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a> -->
	                <a href="#" data-rel="close"><i class="fa fa-fw fa-times"></i></a>
	            </div>
	        </div>
	        <div class="panel-body">

				<div class="form-group">
					<label for="inputEmail5" class="col-sm-2 control-label">Nama</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="nama" name='nama' placeholder="nama">
					</div>
				</div>
                <div class="form-group">
                    <label for="keterangan" class="col-sm-2 control-label">Keterangan</label>
                    <div class="col-sm-4">
						<textarea name="keterangan" class="form-control" rows="5"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <!-- <label for="keterangan" class="col-sm-2 control-label">Keterangan</label> -->
                    <div class="col-sm-4">
						<button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
	        </div>
	    </div>
	</form>
	</div>
</div>