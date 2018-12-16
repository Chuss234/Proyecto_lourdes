<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" type="text/css" href="<?php echo controlador::$rutaAPP ?>app/template/css/video.css">
    <title>Pagina Principal</title>
    <!-- Todos los CSS-->
    <?php include_once(__dir__."/secciones/css.php");?>
</head>

<body>
  <!-- Header--><?php include_once(__dir__."/secciones/encabezado.php");?>

    <div id="wrapper">

      <?php include_once(__dir__."/secciones/menu.php");?>
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">


<h1 class="display-4"><span class="badge badge-pill badge-secondary">Hola De Nuevo, <span  ></i><?php echo $_SESSION["nuser"]; ?></span>!!!</span></h1>

<div id="video-container" class="row no-margin no-padding">
    <video autoplay loop muted>
        <source src="<?php echo controlador::$rutaAPP ?>app/template/images/videol.mp4"">
    </video>
</div>
            </div>
        </div>

    </div>    <!-- Fin del menu-->






<!-- Bootstrap core JavaScript -->  <?php include_once(__dir__."/secciones/script.php");?>


</body>

</html>
