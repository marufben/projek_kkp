<style>.datepicker{z-index:1200 !important;}</style>
<div class="row">
    <div class="col-md-12">

        <div class="panel panel-success panel-clean">
            <div class="panel-heading">
                        <h4 class="panel-title">Hasil</h4>
                <div class="panel-options">
                            <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                            <a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a>
                            <a href="#" data-rel="close"><i class="fa fa-fw fa-times"></i></a>
                </div>
            </div>
            <div class="panel-body">
                <?php
                echo $pesan;
                ?>
                <hr>

                <table id="master-menu" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>
                                No
                            </th>
                            <th>
                                No Arsip
                            </th>
                            <th>
                                Tahun Terbit
                            </th>
                            <th>
                                Tahun Expired
                            </th>
                            <th>
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        foreach ($result as $key => $value) {
                        ?>
                        <tr>
                            <td>
                                <?php echo ($no+1); ?>
                            </td>
                            <td>
                                <?php echo $value->kode_arsip; ?>
                            </td>
                            <td>
                                <?php echo $value->tgl_terbit; ?>
                            </td>
                            <td>
                                <?php echo $value->tgl_expired; ?>
                            </td>
                            <td width="20%">
                                <a class="btn btn-default" href="<?php //echo base_url()."setupretensi/edit/".$value->id;?>">
                                    <i class="icon-edit"></i>
                                    Detail
                                </a>

                                &nbsp;
                                &nbsp;

                                <div class="checkbox">
                                    <label>
<!--                                         <input type="checkbox" value="<?php echo $value->kode_arsip; ?>" class="icheck flat-blue retensi"> -->
                                        <input type="checkbox" value="<?php echo $value->id; ?>" class="icheck flat-blue retensi">
                                        Set Retensi
                                    </label>
                                </div>

                            </td>
                        </tr>
                        <?php $no++; } ?>
                    </tbody>
                </table>
        
                <button type="button" style="float: right;" onclick="retensi()" class="btn btn-success" data-target="#hapusModal" data-toggle="modal">Execute</button>
        
            </div>
        </div>
	</div>
</div>

<div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Retensi Arsip</h4>
      </div>
      <form action="<?php echo base_url();?>setupretensi/retensidata" method="post" class="form-horizontal form-bordered">
      <div class="modal-body">
            <div class="form-group">
                <label for="inputEmail5" class="col-sm-2 control-label">No Berita Acara</label>
                <div class="col-sm-6">
                    <input class='form-control' name="no_bap" id="no_bap" >
                </div>
            </div>
<!--             <div class="form-group">
                <label for="inputEmail5" class="col-sm-2 control-label">Tanggal</label>
                <div class="col-sm-6">
                    <input class='form-control' name="tgl" id="tgl" >
                </div>
            </div> -->

            <div class="form-group">
                <label class="control-label col-sm-2">Tanggal</label>
                <div class="input-group date col-sm-6">
                    <input type="text" class='form-control' id="tgl" data-rel="datepicker"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                    <input type="hidden" name="tgl" id="tgl_send">
                </div>
            </div>

            <div class="form-group">
                <label for="inputEmail5" class="col-sm-2 control-label">Pejabat</label>
                <div class="col-sm-6">
                    <input class='form-control' name="pejabat" id="pejabat" >
                </div>
            </div>
        <div id="hapusData" style="padding: 10px;">
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Batal</button>
        <button type="submit" class="btn">Simpan</button>
      </div>
        </form>
    </div>
  </div>
</div>


<script type="text/javascript">
$(document).ready(function(){
    $('#master-menu').DataTable();
    // $('#tgl').datepicker({  format: 'dd-mm-yyyy', });
    $('#tgl').datepicker({
            format: 'dd-mm-yyyy'
        }).on('changeDate', function(){

            var date = $(this).val(),
            values = date.split("-"),
            day = parseInt(values[0], 10),
            month = parseInt(values[1], 10), // Month is zero based, so subtract 1
            year = parseInt(values[2], 10);
            
            $('#tgl_send').val(year+"-"+month+"-"+day)
        });
})

var retensi = function(){
    var checked = $("input[type=checkbox]:checked"),
        l = checked.length;

    if(l<=0){
        alert('Belum memilih')
    }else{
        var html = '';
        checked.each(function(){
            // html += '<input name="kode_arsip[]" type="hidden" value="'+$(this).val()+'">';
            html += '<input name="id_arsip[]" type="hidden" value="'+$(this).val()+'">';
        });
        $('#hapusData').html(html)
    }

    console.log(l);
}
</script>