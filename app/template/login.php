<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Login</title>
	<?php include_once(__dir__."/secciones/css.php");?>

</head>


<div class="login-box">
      <img src="<?php echo controlador::$rutaAPP ?>app/template/images/logo_colegio.jpg" class="avatar" alt="Avatar Image"></img>
      <h1>Inicio de sesion</h1>
      <form id="loginForm">
        <label for="username">Usuario</label>

        <input type="text"  id="user"  placeholder="Usuario">

        <label for="password">Contraseña</label>

        <input type="password" id="pass" placeholder="Contraseña">
		<div class="alert alert-danger mb4 d-none" role="alert" id="mensaje">
			<span>

			</span>
		</div>
        <input type="submit" value="Iniciar">
        <center>
        	  <p>Colegio lourdes de Ahuachapan &copy; 2018</p>
        </center>

      </form>
    </div>



<?php include_once(__dir__."/secciones/script.php");?>
<script type="text/javascript">
	$(document).ready(function(){
		$("#loginForm").submit(function(event){
			event.preventDefault();
			$.ajax({
				dataType:"json",
				url:"<?php echo controlador::$rutaAPP ?>index.php?action=validar",
				type:"POST",
				data:{usr:$("#user").val(),pass:$("#pass").val()},
				success: function(data) {
					if (data.success==false) {
						$("#mensaje").removeClass("d-none");
						$("#mensaje span").html(data.msg);
					} else {
						window.location=data.link;
					}
				},
				error: function(response) {

				}
			});
		});
	});
</script>
</body>
</html>
