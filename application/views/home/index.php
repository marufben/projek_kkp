<div class="form-group text-right">
    <button type="button" class="btn btn-primary" onclick="previous()">Prev</button>
    <button type="button" class="btn btn-primary" onclick="next()">Next</button>
</div>
<div id="carga">
    <embed src="<?php echo base_url();?>assets/img/5.gif" class="centrar" />
</div>
<div id="imagen-oculta2" />

    <div class="magazine">
    </div>

</div>



<script type="text/javascript">

    PDFJS.disableWorker = true;
    var pdfDoc, scale, file, np, filename;

    // $(document).ready(function () {
    (function(){
        filename = "<?php echo $nama;?>";

        // if(filename == ''){ alert('Nama File Tidak Boleh Kosong'); return false;}

        file = getUrlVars()["file"];
        if (file == null)
            file = '<?php echo base_url();?>public/FILES/'+filename;

        PDFJS.getDocument(file).then(function (doc) {
            pdfDoc = doc;
            np = (doc.numPages);

            scale = 3;

            for (var i = 1; i <= np; i++) {
                $(".magazine").html($(".magazine").html() + '<div><canvas id="hoja' + i + '" style="border: 1px solid black; width: 99.4%; height: 99.5%;"></canvas></div>');
            }

            for (var i = 1; i <= np; i++) {
                renderPage(i, document.getElementById('hoja' + i));
            }

            //Evento Window Ready
            flipkey();
            demoDisplay();
            window.onload = function () {
                // setContent();
            }
            
            // document.getElementById('imagen-oculta').style.visibility = 'visible';
            document.getElementById('imagen-oculta2').style.visibility = 'visible';
        });
    // });
    })();
  
</script>