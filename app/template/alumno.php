<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Alumno</title>
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
                <?php include_once(__dir__."/secciones/modal.php");?>

                <div class="container">
                  <div class="card text-center container ">
                  <div class="card-header" >
                    <h4>
                  Paso 2 Agregar Alumno
                  </h4>
                  </div>
                    <button class="btn btn-success btn-md float-left" onclick="verAlumno();">CONSULTAR ALUMNOS</button>
                  <div class="card-body">
                    <table border="1" cellpadding="3" cellspacing="3" class="table table-hover table table-borderless">

                      <form class="" id="formres" method="post">

                    <TR bgcolor="black" style="color: white">
                      <th colspan="10"><H1> Agregar Alumno  </H1><a href="<?php echo controlador::$rutaAPP ?>index.php?action=matricula" class="float-right">Matricular-></a></th>

                    </TR>

                    <tr bgcolor="skyblue">
                      <th colspan="10">Datos del Alumno</th>

                    </tr>
                    <tr >
                        <td colspan="2">ID Alumno </td>
                        <th><input type="text" class="form-control limpiar" name="id_alum"  id="id_alum" placeholder="ejemplo XX022018"></th>
                        <td><label for="fui">2 iniciales Fecha de nacimiento </label></td>

                    </tr>

                    <tr >
                        <td colspan="2">Nombre </td>
                        <th><input type="text" class="form-control limpiar" name="nombre"  id="nombre" placeholder="Nombre alumno"></th>


                    </tr>
                     <tr >
                        <td colspan="2">Apellidos </td>
                        <th><input type="text" class="form-control limpiar" name="apellido" id="apellidos" value="" placeholder="Apellidos alumno"></th>


                    </tr>
                    <tr >
                       <td colspan="2">Genero</td>
                       <th><input type="text" class="form-control limpiar" name="genero" id="genero" placeholder="Masculino o Femenino"></th>


                   </tr>
                     <tr >
                        <td colspan="2">Fecha de nacimiento</td>
                        <th><input type="date" class=" form-control limpiar" name="fecha" id="fecha" placeholder="Fecha de nacimiento"></th>
                    </tr>
                    <tr >
                       <td colspan="2">N° Dui del responsable</td>
                       <td><input type="text" class="form-control limpiar" name="dui" id="dui" placeholder="00000000"min="9"></td>
                        <td><span class="btn btn-success btn-md float-left" onclick="consultar();">RESPONSABLE</span></td>
                   </tr>

                   <tr >
                      <td colspan="2" >Departamento</td>
                      <td>  <select class="form-control limpiar" name="departamento">
                        <option value="1"> Santa Ana</option>
                        <option value="2" selected> Ahuachapan</option>
                        <option value="3"> Metapan</option>

                        </select></td>

                  </tr>

                     <tr >
                        <td colspan="2">Municipio</td>
                        <td><input type="text" class="form-control limpiar" name="municipio" id="municipio" placeholder="Municipio"></td>


                    </tr>
                     <tr >
                        <td colspan="2" >Direccion</td>
                        <th><input type="text" class="form-control limpiar" name="direccion" id="direccion" placeholder="Direccion del Alumno"></th>
                    </tr>

                    <tr>

                      <th colspan="5">
                        <input id="respon" type="submit" class="form-control btn-primary" idea value="Guardar">
                      </th>

                    </tr>
                    <input type="hidden" name="op" id="op" value="5">

                </form>
                  </table>
                </div>
                  <div class="card-footer text-muted">
                    2 days ago
                  </div>
                  </div>
                </div>



            </div>
        </div>

    <!-- Fin del menu-->




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

                alertify.alert("agregado con exito! pasar a matricular");
                $(".limpiar").val("");



              }else{
                alertify.alert("Fallo en el envio del formulario");
              }
            }

          });
    });
});

function verAlumno() {
  $("#myModal").modal("show");
  recDatos();


}

</script>
<script type="text/javascript">


      function recDatos() {


      $.ajax({
        dataType:"json",
        url:"<?php echo controlador::$rutaAPP?>app/template/php/get_user.php",
        data:{op:7,responsable:2},
        type:"POST",
        success:function(data){
          if (data.success==true) {
            var html ="<table   id='tableContentData' style='text-align:center'; ><thead style='background-color: #3B5998; color: white;'><tr>";
            html+="<th>Id Alumno</th>";
            html+="<th>Nombres</th>";
            html+="<th>Apellidos</th>";
            html+="<th>Fecha de nacimiento</th>";
            html+="<th>Dui del responsable</th>";
            html+="<th>Direccion</th>";
            html+="</tr></thead><tbody>";
            data.data.forEach(function(item,index){
              html+="<tr>";
              html+="<td>"+item.id_alumno+"</td>";
              html+="<td>"+item.nombres+"</td>";
              html+="<td>"+item.apellidos+"</td>";
              html+="<td>"+item.fecha_nac+"</td>";
              html+="<td>"+item.dui_responsable+"</td>";
              html+="<td>"+item.direccion+"</td>";
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
