<script src="<?php echo controlador::$rutaAPP?>app/template/js/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo controlador::$rutaAPP?>app/template/js/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo controlador::$rutaAPP?>app/template/js/datatables/datatables.min.js"></script>
<script src="<?php echo controlador::$rutaAPP?>app/template/js/bootbox.min.js"></script>
<script src="<?php echo controlador::$rutaAPP?>app/template/js/alertifyjs/alertify.js"></script>



    <!-- Menu Toggle Script -->
<script type="text/javascript">
matricula


$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");

    });

      $("#borra").click(function(e) {

          $("#abrir").toggleClass("mirar");
        });

        $("#matricula").click(function(e) {

            $("#abrirmatr").toggleClass("mirar");
          });

</script>
<!-- <script type="text/javascript">
	function blockDiv(el,state) {
        if (state==1) {
            $(el).block({
                      message: '<h2><i class="fa fa-spinner fa-spin vd_blue"></i></h2>',
                      css: {
                        border: 'none',
                        padding: '15px',
                        background: 'none'
                      },
                      overlayCSS: { backgroundColor: '#FFF' }
            });
        } else {
            $(el).unblock();
        }
    }
</script> -->
