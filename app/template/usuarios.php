<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Usuarios</title>
      <!-- Todos los CSS-->
    <?php include_once(__dir__."/secciones/css.php");?>


</head>

<body>

<!-- Header--><?php include_once(__dir__."/secciones/encabezado.php");?>

    <div id="wrapper">
        <!-- Menu -->


      <?php include_once(__dir__."/secciones/menu.php");?>
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">


              <div class="container">
                <table id="dataUser" class="table table-hover table-condensed table-bordered">
                <thead style="background-color: #3B5998; color: white; ">
                  <tr>
                    <td>Usuario</td>
                    <td>Nombres</td>
                    <td>Apellidos</td>
                  </tr>

                </thead>

                <tbody>
              <?php
              $mvcDatos = new GetDatos();
              $user     = $mvcDatos->consultaGen("select usuario,nombres,apellidos from usuarios");
              foreach ($user as $key => $value) {
              $data = $value["usuario"];
              $data = $value["nombres"];
              $data = $value["apellidos"];
              ?>
                  <tr>
                    <td><?php echo $data = $value["usuario"]; ?></td>
                    <td><?php echo $data = $value["nombres"]; ?></td>
                    <td><?php echo $data = $value["apellidos"]; ?></td>
                  </tr>
              <?php }?>

                </tbody>
              </table>
              </div>


            </div>
        </div>      <!-- /#page-content-wrapper -->

    </div>    <!-- fin del menu -->

    <!-- core JavaScript -->  <?php include_once(__dir__."/secciones/script.php");?>

      <script type="text/javascript">



            /* Dar formato de datatable*/

          $(document).ready(function(){
           $('#dataUser').DataTable();
          });
            </script>
</body>

</html>
