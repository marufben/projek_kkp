 <div class="panel panel-info">

        <div class="panel-heading">
            <h3 class="panel-title">Data Keanggotaan</h3>
        </div>
        <div class="panel" style='background-color:#27BB81;margin-bottom:3px;'>
	        <div class="form-group">
				<label style='margin-top:2px;font-size:16px;color:rgb(37, 35, 35)' class="control-label col-sm-2">ID Anggota :</label>
				<div class="controls col-sm-5">
					<div class="input-group" style='margin-bottom:5px;margin-top:5px;'>
						<input type="text" id="id_anggota" name="id_anggota" class="form-control">
						<span class="input-group-btn">
							<button class="btn btn-primary" id="cari" type="button" style='background-color: #471282;'>Mulai Transaksi</button>
						</span>
					</div>	
				</div>
			</div>
		</div>
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td>
                        <ul class="list-group margin-lg">
                            <li class="list-group-item">
                                Nama Anggota
								<li class="list-group-item">
									<input type="text" class="form-control" id="nama_anggota" name="nama_anggota">
								</li>
                            </li>
                            <li class="list-group-item">
                                Email Anggota
								<li class="list-group-item">
									<input type="text" class="form-control" id="email_anggota" name="email_anggota">
								</li>
                            </li>
                            <li class="list-group-item">
                                Tanggal Registrasi
								<li class="list-group-item">
									<input type="text" class="form-control" id="tgl_registrasi" name="tgl_registrasi">
								</li>
                            </li>
                        </ul>
                    </td>
                    <td>
                        <ul class="list-group margin-lg">
                            <li class="list-group-item">
                                ID Anggota
								<li class="list-group-item">
									<input type="text" class="form-control" id="IdAnggota" name="IdAnggota">
								</li>
                            </li>
                            <li class="list-group-item">
                                Tipe Anggota
								<li class="list-group-item">
									<input type="text" class="form-control" id="tipe_anggota" name="tipe_anggota">
								</li>
                            </li>
                            <li class="list-group-item">
                                Berlaku Hingga
								<li class="list-group-item">
									<input type="text" class="form-control" id="expired" name="expired">
								</li>
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
									<li><a data-toggle="tab" href="#wizard1-1">Peminjaman</a></li>
									<li class="active nowrap" ><a data-toggle="tab" href="#wizard1-2">Pinjaman Saat Ini</a></li>
									<li><a data-toggle="tab" href="#wizard1-3">Denda</a></li>
									<li><a data-toggle="tab" href="#wizard1-4">Sejarah Peminjaman</a></li>
								</ul>
								<div class="tab-content">
                    <div id="wizard1-1" class="tab-pane">
                        <div class="row" style='background-color:#27BB81;margin-bottom:5px;'>
							<div class="form-group">
								<label style='margin-top:5px;font-size:20px;color:rgb(37, 35, 35)' class="control-label col-sm-3">Masukan Kode :</label>
								<div class="controls col-sm-4">
									<div class="input-group" style='margin-bottom:5px;margin-top:5px;'>
										<input type="text" id="kode_buku" class="form-control">
										<span class="input-group-btn">
											<button class="btn btn-primary" type="button" id="pinjam" style='background-color: #471282;'>Pinjam</button>
										</span>
									</div>
								</div>
							</div>
						</div>
						<div id='cari-pinjam'>
							<div class="row">
								<table id="tbl_peminjaman" class="table table-bordered" style='background-color:white;'>
									<thead style='background-color:#ddd'>
										<tr>
											<th>Hapus <?php echo $title; ?></th>
											<th>Kode</th>
											<th>Judul</th>
											<th>Tanggal Pinjam</th>
											<th>Tanggal Kembali</th>
										</tr>
									</thead>
									<tbody id="tmp">
										
									</tbody>
								</table>
							</div>
						</div>
                    </div>
                    <div id="wizard1-2" class="tab-pane active">
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
									<tbody id="tmp_saat">
										
										
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
									<tbody id="tmp_sejarah">
										
									</tbody>
								</table>
							</div>
                    </div>
                </div>
                <!-- button class="btn btn-primary" id="selesai" type="button" style='background-color: #471282;'>Selesai Transaksi</button -->
                <a class="btn btn-primary" href="<?php echo base_url()."index.php/sirkulasi/selesai";?>"><i class="icon-edit"></i> Selesai Transaksi </a>
							</div>
						</div>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>

<script>
    $(function(){
    	var vid_anggota = "";
		var vaturan_peminjaman = "";
		var vitem_code = "";
		var vtgl_pinjam = "";
		var vtgl_hrs_kembali = "";

        $("#cari").click(function(){
            var kode=$("#id_anggota").val();
             $('#cari').prop('disabled', true);
            $.ajax({
                url:"<?php echo site_url('sirkulasi/cari');?>",
                type:"POST",
                data:"kode="+kode,
                dataType: "json",
                success: function(data){
                	$.each(data.list, function(i,n){
                		$("#nama_anggota").val(n["nama"]);
                		$("#email_anggota").val(n["email"]);
                		$("#tgl_registrasi").val(n["tgl_daftar"]);
                		$("#IdAnggota").val(n["kode_anggota"]);
                		$("#tipe_anggota").val(n["type"]);
                		$("#expired").val(n["expired"]);
		            });	
		            
		            $.each(data.peminjaman, function(i,b){
		            	var v = "kembali('"+b['item_code']+"')";

		            	var row = "<tr id='"+b['item_code']+"'>"
									+"<td>"
									+"<button class='btn btn-danger' onclick="+v+" ><i class='icon-trash'></i> Kembalikan </button>"
									+"</td>"
									+"<td></td>"
									+"<td>"+b['item_code']+"</td>"
									+"<td>"+b['title']+"</td>"
									+"<td></td>"
									+"<td>"+b['tgl_pinjam']+"</td>"
									+"<td>"+b['tgl_hrs_kembali']+"</td>"
									+"</tr>";
        				$("#tmp_saat").append(row); 
		            });

		            $.each(data.sejarah, function(i,s){
		            	var tglKembali = s['tgl_kembali'];
		            	if( tglKembali == '0000-00-00'){
		            		tglKembali = "Belum dikembalikan";
		            	}

						var row1 = "<tr>"
									+"<td>"+s['item_code']+"</td>"
									+"<td>"+s['title']+"</td>"
									+"<td>"+s['tgl_pinjam']+"</td>"
									+"<td>"+tglKembali+"</td>"
									+"</tr>";
        				$("#tmp_sejarah").append(row1);
					});		            	
                }
            });
        });

        $("#pinjam").click(function(){
            //var kode="<tr><td>1</td><td>B0010</td><td>Perikanan Di Indonesia</td><td>2015-07-01</td><td>2015-07-10</td></tr>";
            //$("#tmp").append(kode);
            var hari_ini= new Date();

			var tahun = hari_ini.getFullYear();
			var bulan = hari_ini.getMonth()+1;
			var tanggal = hari_ini.getDate();
			var tgl_pinjam = tahun+"-"+(bulan[1]?bulan:"0"+bulan[0])+"-"+tanggal;

			Date.prototype.yyyymmdd = function() {
			   var yyyy = this.getFullYear().toString();
			   var mm = (this.getMonth()+1).toString(); // getMonth() is zero-based
			   var dd  = this.getDate().toString();
			   return yyyy +"-"+(mm[1]?mm:"0"+mm[0]) +"-"+ (dd[1]?dd:"0"+dd[0]); // padding
			  };   

			var c = new Date();
			var d = new Date();

			var id_anggota=$("#id_anggota").val();
			vid_anggota = id_anggota;
        	var kode=$("#kode_buku").val();
        	$.ajax({
        		url:"<?php echo site_url('sirkulasi/kode_pinjam');?>",
        		type:"POST",
        		data:"kode="+kode+"&IdAnggota="+id_anggota,
        		dataType: "json",
        		success: function(data){
        			var lama,jmap,jmp; 
					$.each(data.aturan, function(i,v){
						lama = v['periode_peminjaman'];
						jmap = v['jumlah_pinjaman'];
						vaturan_peminjaman = v['id_aturan_peminjaman'];	
	        		});		
						d.setDate(c.getDate()+parseInt(lama));

					$.each(data.jmlpinjam, function(i,j){
						jmp = j['jml_pinjam'];						
	        		});		


        			$.each(data.list, function(i,n){

        				if(jmp<jmap){	
	        				var b = "hapus('"+n['item_code']+"')";

							vitem_code = n['item_code'];
							vtgl_pinjam = c.yyyymmdd();
							vtgl_hrs_kembali = d.yyyymmdd();

	        				var row = "<tr id='"+n['item_code']+"'>"
	        						  +"<td>"
	        						  +"<button class='btn btn-danger' onclick="+b+" ><i class='icon-trash'></i> Hapus </button>"
	        						  +"</td>"
	        						  +"<td><input type='text' id='item_code' name='item_code' disabled='disabled' value='"+n['item_code']+"' class='form-control'>"
	        						  +"<input type='hidden' id='id_aturan_peminjaman' name='id_aturan_peminjaman' value='"+vaturan_peminjaman+"' ></td>"
	        						  +"<td>"+n['title']+"</td>"
	        						  +"<td><input type='text' id='tgl_pinjam' name='tgl_pinjam' disabled='disabled' value='"+ c.yyyymmdd() +"' class='form-control'></td>"
	        						  +"<td><input type='text' id='tgl_kembali' name='tgl_kembali' disabled='disabled' value='"+ d.yyyymmdd() +"' class='form-control'></td>"
	        						  +"</tr>";
	        				$("#tmp").append(row); 

	        				$.ajax({
				                url:"<?php echo site_url('sirkulasi/tmp');?>",
				                type:"POST",
				                data:"anggota="+vid_anggota+"&aturan="+vaturan_peminjaman+"&item="+vitem_code+"&pinjam="+vtgl_pinjam+"&kembali="+vtgl_hrs_kembali,
				                //dataType: "json",
				                success: function(data){
				                	//alert("Sukses!");
				                }
				            });
				            
	        			}else{
	        				var row = "<tr>"
	        						  +"<td colspan='5'>"
	        						  +"Jumlah pinjaman Anda penuh!"
	        						  +"</td>"
	        						  +"</tr>";
	        				$("#tmp").append(row); 
	        			}	
        			});

        		}
        	});	



        });


 		$("#selesai").click(function(){
            /* var kode=$("#id_anggota").val();
            var rowCount = $('#tmp tr').length;
            alert(rowCount);

            for (i = 0; i < rowCount; i++) {
			    text += cars[i] + "<br>";
			}
            */
            
            $.ajax({
                url:"<?php echo site_url('sirkulasi/selesai');?>",
                type:"POST",
                //data:"kode="+kode,
                //dataType: "json",
                success: function(data){
                
                }
            });
 			
        });


    });

function hapus(id)
{
	var kd = "#"+id;
	$(kd).remove();
	$.ajax({
        url:"<?php echo site_url('sirkulasi/tmp_hapus');?>",
        type:"POST",
        data:"kode="+id,
        //dataType: "json",
        success: function(data){
        	alert("Sukses!");
        }
    });
}

function kembali(id)
{
	var kd = "#"+id;
	$(kd).remove();
	$.ajax({
        url:"<?php echo site_url('sirkulasi/kembali');?>",
        type:"POST",
        data:"kode="+id,
        //dataType: "json",
        success: function(data){
        	//alert("Sukses!");
        }
    });
}    
</script>