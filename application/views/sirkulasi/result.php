<div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title">Data Keanggotaan</h3>
        </div>
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td>
                        <ul class="list-group margin-lg">
                            <li class="list-group-item">
                                Nama Anggota
								<ul class="list-group margin-lg">
									<li class="list-group-item">
										Ita
									</li>
								</ul>
                            </li>
                            <li class="list-group-item">
                                Email Anggota
								<ul class="list-group margin-lg">
									<li class="list-group-item">
										ita@ymail.com
									</li>
								</ul>
                            </li>
                            <li class="list-group-item">
                                Tanggal Registrasi
								<ul class="list-group margin-lg">
									<li class="list-group-item">
										Selasa, 20 Juni 2015
									</li>
								</ul>
                            </li>
                        </ul>
                    </td>
                    <td>
                        <ul class="list-group margin-lg">
                            <li class="list-group-item">
                                ID Anggota
								<ul class="list-group margin-lg">
									<li class="list-group-item">
										Ita
									</li>
								</ul>
                            </li>
                            <li class="list-group-item">
                                Tipe Anggota
								<ul class="list-group margin-lg">
									<li class="list-group-item">
										Standard
									</li>
								</ul>
                            </li>
                            <li class="list-group-item">
                                Berlaku Hingga
								<ul class="list-group margin-lg">
									<li class="list-group-item">
										Selasa, 20 Juni 2015
									</li>
								</ul>
                            </li>
                        </ul>
                    </td>
                </tr>
                <tr>
				<style>
					.wizard-container li {
						border:1px solid black;
					}
					.panel-info>.panel-heading, .panel-info>form>.panel-heading {
					 background-color: #471982;
					  border-color: #432B82;
					}
				</style>
                    <td colspan="2">
                        <div class="col-lg-12">
							<div class="wizard-container" id="wizard-1">
								<ul class="nav nav-tabs nav-justified" >
									<li class="active nowrap" ><a data-toggle="tab" href="#wizard1-1">Peminjaman</a></li>
									<li><a data-toggle="tab" href="#wizard1-2">Pinjaman Saat Ini</a></li>
									<li><a data-toggle="tab" href="#wizard1-3">Denda</a></li>
									<li><a data-toggle="tab" href="#wizard1-4">Sejarah Peminjaman</a></li>
								</ul>
								<div class="tab-content">
                    <div id="wizard1-1" class="tab-pane active">
                        <div class="row" style='background-color:#27BB81;margin-bottom:5px;'>
							<div class="form-group">
								<label style='margin-top:5px;font-size:20px;color:rgb(37, 35, 35)' class="control-label col-sm-3">Masukan Kode :</label>
								<div class="controls col-sm-4">
									<div class="input-group" style='margin-bottom:5px;margin-top:5px;'>
										<input type="text" class="form-control">
										<span class="input-group-btn">
											<button class="btn btn-primary" type="button" style='background-color: #471282;'>Pinjam</button>
										</span>
									</div>
								</div>
							</div>
						</div>
						<div id='cari-pinjam'>
							<div class="row">
								<table class="table table-bordered" style='background-color:white;'>
									<thead style='background-color:#ddd'>
										<tr>
											<th>Hapus</th>
											<th>Kode</th>
											<th>Judul</th>
											<th>Tanggal Pinjam</th>
											<th>Tanggal Kembali</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>B0010</td>
											<td>Perikanan Di Indonesia</td>
											<td>2015-07-01</td>
											<td>2015-07-10</td>
										</tr>
										
									</tbody>
								</table>
							</div>
						</div>
                    </div>
                    <div id="wizard1-2" class="tab-pane">
                        	<div class="row">
								<table class="table table-bordered" style='background-color:white;'>
									<thead style='background-color:#ddd'>
										<tr>
											<th>Kembali</th>
											<th>Perpanjang</th>
											<th>Kode</th>
											<th>Judul</th>
											<th>Tipe</th>
											<th>Tanggal Pinjam</th>
											<th>Tanggal Kembali</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>Mark</td>
											<td>Otto</td>
											<td>@mdo</td>
											<td>@mdo</td>
											<td>@mdo</td>
											<td>@mdo</td>
										</tr>
										
									</tbody>
								</table>
							</div>
                    </div>
                    <div id="wizard1-3" class="tab-pane">
                        <div class="row">
                            <div class="col-xs-12 form-group">
                                <label class="control-label" for="cardNo">Card No</label>
                                <input type="text" class="form-control" id="cardNo" placeholder="Card Number">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-4 form-group">
                                <label class="control-label" for="cvc">CVC</label>
                                <input type="text" class="form-control" id="cvc" size="4" placeholder="ex. 311" autocomplete="off">
                            </div>
                            <div class="col-xs-4 form-group">
                                <label class="control-label" for="expiration">Expiration</label>
                                <input type="text" class="form-control" id="expiration" size="2" placeholder="MM">
                            </div>
                            <div class="col-xs-4 form-group">
                                <label class="control-label">&nbsp;</label>
                                <input type="text" class="form-control" size="4" placeholder="YYYY">
                            </div>
                        </div>
                    </div>
                    <div id="wizard1-4" class="tab-pane">
                        <div class="row">
								<table class="table table-bordered" style='background-color:white;'>
									<thead style='background-color:#ddd'>
										<tr>
											<th>Kode</th>
											<th>Judul</th>
											<th>Tanggal Pinjam</th>
											<th>Tanggal Kembali</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>B0010</td>
											<td>Perikanan Di Indonesia</td>
											<td>2015-07-01</td>
											<td><i>Belum DiKembalikan</i></td>
										</tr>
										
									</tbody>
								</table>
							</div>
                    </div>
                </div>
							</div>
						</div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>