<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Responsables</title>
    <!-- Todos los CSS-->
    <?php include_once(__dir__."/secciones/css.php");?>
</head>

<body>
  <!-- Header--><?php include_once(__dir__."/secciones/encabezado.php");?>

    <div id="wrapper">

      <?php include_once(__dir__."/secciones/menu.php");?>

        <!-- Page Content -->
        <div id="page-content-wrapper">
        ``  <div class="container-fluid">
          <?php include_once(__dir__."/secciones/modal.php");?>


                <div class="container">
                  <div class="card text-center container ">
                    <div class="card-header">
                    <h4>
                  Paso 1 Agregar Responsable de Alumno
                  </h4>
                  </div>
                  <button class="btn btn-success btn-md float-left" onclick="consultar();">CONSULTAR RESPONSABLE</button>
                  <div class="card-body">
                    <table border="1" cellpadding="3" cellspacing="3" class="table table-hover table table-borderless">

                      <form class="" id="formres" method="post">

                    <TR bgcolor="black" style="color: white">
                      <th colspan="10"><H1> Responsables  </H1> <a href="#"class="float-left" >CONSULTAR</a><a href="<?php echo controlador::$rutaAPP ?>index.php?action=alumno" class="float-right">Paso 2 -></a></th>

                    </TR>

                    <tr bgcolor="skyblue">
                      <th colspan="10">Datos del Responsable</th>

                    </tr>


                    <tr >
                        <td colspan="2">Nombre Responsable</td>
                        <th><input type="text" class="limpiar" name="nombre"  id="nombre" placeholder="Nombre responsable" required></th>


                    </tr>
                     <tr >
                        <td colspan="2">Apellidos Responsable</td>
                        <th><input type="text" class="limpiar" name="apellidos" id="apellidos" value="" placeholder="Apellidos responsable"></th>


                    </tr>
                    <tr >
                       <td colspan="2">Parentesco</td>
                       <th><input type="text" class="limpiar" name="parentesco" id="parentesco" placeholder="Parentesco"></th>


                   </tr>
                     <tr >
                        <td colspan="2">N° Dui</td>
                        <th><input type="text" class="limpiar" name="dui" id="dui" placeholder="Numero de DUI" maxlength="9"></th>


                    </tr>
                     <tr >
                        <td colspan="2">Telefono </td>
                        <th><input type="text" class="limpiar" name="telefono" id="telefono" placeholder="Telefono"></th>


                    </tr>
                     <tr >
                        <td colspan="2">Correo</td>
                        <th><input type="email" class="limpiar" name="correo" id="correo" placeholder="ejemplo@gmail.com"></th>


                    </tr>
                     <tr >
                        <td colspan="2" >Actidad laboral</td>
                        <th><input type="text" class="limpiar" name="laboral" id="laboral" placeholder="Actidad laboral"></th>


                    </tr>



                    <tr>

                      <th colspan="5">
                        <input id="respon" type="submit" class="btn-primary" idea value="Guardar">
                      </th>

                    </tr>
<input type="hidden" name="op" id="op" value="4">

                </form>
                  </table>
                  </div
                  <div class="card-footer text-muted">
                    2 days ago
                  </div>
                  </div>
                </div>



            </div>
        </div>   <!-- Fin del menu-->




<!-- Bootstrap core JavaScript -->  <?php include_once(__dir__."/secciones/script.php");?>

<script type="text/javascript">
$("document").ready(function(){

  $("#formres").submit(function(event){
    event.preventDefault();
     var datos= $("#formres").serialize();

     $.ajax({
            type:"POST",
            url:"<?php echo controlador::$rutaAPP?>app/template/php/get_user.php",
            data:datos,
            success:function(r){
              if(r==1){

                alertify.alert("agregado con exito! (ir al paso 2)");
                $(".limpiar").val("");



              }else{
                alertify.alert("Fallo en el envio del formulario");
              }
            }

          });
    });
});


</script>




<script type="text/javascript">
      function consultar() {
      $("#myModal").modal("show");
      recuperarDatos();


    }


      function recuperarDatos() {


      $.ajax({
        dataType:"json",
        url:"<?php echo controlador::$rutaAPP?>app/template/php/get_user.php",
        data:{op:7,responsable:1},
        type:"POST",
        success:function(data){
          if (data.success==true) {
            var html ="<table  id='tableContentData' style='text-align:center'; ><thead style='background-color: #3B5998; color: white;'><tr>";
            html+="<th>dui_responsable</th>";
            html+="<th>Nombres</th>";
            html+="<th>Apellidos</th>";
            html+="<th>parentesco</th>";
            html+="<th>telefono</th>";
            html+="<th>Actidad laboral</th>";
            html+="</tr></thead><tbody>";
            data.data.forEach(function(item,index){
              html+="<tr>";
              html+="<td>"+item.dui_responsable+"</td>";
              html+="<td>"+item.nombres+"</td>";
              html+="<td>"+item.apellidos+"</td>";
              html+="<td>"+item.parentesco+"</td>";
              html+="<td>"+item.telefono+"</td>";
              html+="<td>"+item.trabajo_res+"</td>";
              html+="</tr>";

            });
            html+="</tbody></table>";
            $("#contentTable").html(html);

            $("#tableContentData").DataTable();

        }


        },


        error:function(response){

        }
      })
    }
    </script>


</body>

</html>
