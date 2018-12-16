<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Matricula</title>
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
                  <div class="card-header">
                    <h4>
                  Paso 3 Agregar Matricula
                  </h4>
                  </div>
                  <div class="card-body">
                    <table border="1" cellpadding="3" cellspacing="3" class="table table-hover table table-borderless">

                      <form class="" id="formres" method="post">

                    <TR bgcolor="black" style="color: white">
                      <th colspan="10"><H1> Agregar Matricula  </H1> <a href="#"class="float-left" >REGRESAR</a></th>

                    </TR>

                    <tr bgcolor="skyblue">
                      <th colspan="10">Matricula</th>

                    </tr>
                    <tr >
                        <td colspan="2">ID Alumno </td>
                        <th><input type="text" class="form-control limpiar" name="id_alum"  id="id_alum" placeholder="ejemplo XX022018"></th>
                        <td><span class="btn btn-success btn-md float-left" onclick="consultar();">CONSULTAR ALUMNOS</span></td>

                    </tr>

                    <tr >
                       <td colspan="2" >Grado a Matricular</td>
                       <td>  <select class="form-control limpiar" id="grados2"name="grado">


                         </select></td>

                   </tr>
                   <tr >
                     <td colspan="2" >Turno</td>
                     <td>  <select class="form-control limpiar" name="turno">
                       <option value="Manana" selected>Ma&ntilde;ana</option>
                       <option value="Tarde">Tarde</option>

                       </select></td>

                  </tr>


                    <tr>

                      <th colspan="5">
                        <input id="respon" type="submit" class="form-control btn-primary" idea value="Guardar">
                      </th>

                    </tr>
<input type="hidden" name="op" id="op" value="6">

                </form>
                  </table>
                  </div
                  <div class="card-footer text-muted">
                    2 days ago
                  </div>
                  </div>
                </div>



            </div>
        </div>

    </div>    <!-- Fin del menu-->




<!-- Bootstrap core JavaScript -->  <?php include_once(__dir__."/secciones/script.php");?>

<script type="text/javascript">
$("document").ready(function(){
  $.ajax({
     dataType:"json",
     url:"<?php echo controlador::$rutaAPP?>app/template/php/get_datos.php",
     data:{op:3,fl:1},
     type:'POST',
     success: function(data){
       $("#grados2 option").each(function(){
         $(this).remove();
       });
       $("#grados2").append("<option value='0'>Seleccione un Grado</option>");
       data.data.forEach(function(item,index){
         $("#grados2").append("<option value="+item.id_grado+">"+item.nom_grado+"</option>");
        });

}
});

  $("#formres").submit(function(event){
    event.preventDefault();
     var datos= $("#formres").serialize();

     $.ajax({
            type:"POST",
            url:"<?php echo controlador::$rutaAPP?>app/template/php/get_user.php",
            data:datos,
            success:function(r){
              if(r==1){

                alertify.alert("El alumno ha sido matriculado");
                $(".limpiar").val("");



              }else if (r==3) {
                alertify.error("El alumno ya esta matriculado");
              }

              else{
                alertify.error("Falla al ingresar los datos");
              }
            }

          });
    });
});


function consultar() {
  $("#myModal").modal("show");
  recuperarDatos();

}

</script>
<script type="text/javascript">



      function recuperarDatos() {


      $.ajax({
        dataType:"json",
        url:"<?php echo controlador::$rutaAPP?>app/template/php/get_user.php",
        data:{op:7,responsable:2},
        type:"POST",
        success:function(data){
          if (data.success==true) {
            var html ="<table class='table-responsive'  id='tableContentData' style='text-align:center'; ><thead style='background-color: #3B5998; color: white;'><tr>";
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


</body>

</html>
