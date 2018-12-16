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

              <div class="modal" id="editar">
                  <div class="modal-window">
                  <div class="modal-content container">

                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title"></h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body ">
                      <div class="container">
                        <div class="card text-center container ">
                        <div class="card-header" >
                          <h4>
                        Paso 2 Agregar Alumno
                        </h4>
                        </div>

                        <div class="card-body">

                          <table border="1" cellpadding="3" cellspacing="3" class="table table-hover table table-borderless">

                          <form class="" id="editform" method="post">

                          <tr bgcolor="black" style="color: white">
                            <td colspan="10"><H1> Agregar Alumno  </H1><a href="<?php echo controlador::$rutaAPP ?>index.php?action=matricula" class="float-right">Matricular-></a></td>

                          </tr>

                          <tr bgcolor="skyblue">
                            <td colspan="10">Datos del Alumno</td>

                          </tr>
                          <tr >
                              <td colspan="2">ID Alumno </td>
                              <td><input type="text" class="form-control limpiar" name="id_alum"  id="id_alum" value=""> </td>
                              <td><label for="fui">2 iniciales mes y anio de nacio </label></td>

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
                             <td><input type="text" class="form-control limpiar" name="genero" id="genero" placeholder="Masculino o Femenino"></td>
                         </tr>
                           <tr >
                              <td colspan="2">Fecha de nacimiento</td>
                              <td><input type="text" class=" form-control limpiar" name="fecha" id="fecha" placeholder="Fecha de nacimiento"></td>
                          </tr>
                          <tr >
                             <td colspan="2">N° Dui del responsable</td>
                             <td><input type="text" class="form-control limpiar" name="dui" id="dui" placeholder="00000000"min="9"></td>
                              <td><span class="btn btn-success btn-md float-left" onclick="consultar();">RESPONSABLE</span></td>
                         </tr>
                         <tr >
                            <td colspan="2" >Departamento</td>
                            <td>  <select class="form-control limpiar" name="departamento" id="departamento">
                              <option value="1"> Santa Ana</option>
                              <option value="2" selected> Ahuachapan</option>
                              <option value="3"> Sonsonate</option>
                              </select></td>
                        </tr>
                           <tr >
                              <td colspan="2">Municipio</td>
                              <td><input type="text" class="form-control limpiar" name="municipio" id="municipio" placeholder="Municipio"></td>
                          </tr>
                           <tr >
                              <td colspan="2" >Direccion</td>
                              <td><input type="text" class="form-control limpiar" name="direccion" id="direccion" placeholder="Direccion del Alumno"></td>
                          </tr>
                          <tr>
                            <input type="hidden" name="op" id="op" value="3">
                            <input type="hidden" name="id" id="idedit" value="">

                            <td colspan="5">
                              <input id="respon" type="submit" class="form-control btn-primary" idea value="Guardar">
                            </td>
                          </tr>
                      </form>
                        </table>
                      </div>

                        </div>

                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

              </div>
              </div>
              </div>




            </div>
            <div id="contentTable" width="100%">

          </div>
        </div>
      </div>

    <!-- Fin del menu-->




<!-- Bootstrap core JavaScript -->  <?php include_once(__dir__."/secciones/script.php");?>

<script type="text/javascript">
function editar(id){
  $.ajax({
    dataType:"json",
    url:"<?php echo controlador::$rutaAPP?>app/template/php/admin_alumno.php",
    data:{op:2,id:id,select:1},
    type:"POST",
    success:function(data){
      if (data.success==true) {
        data.data.forEach(function(item,index){
          $("#id_alum").val(item.id_alumno);
          $("#idedit").val(item.id_alumno);
          $("#nombre").val(item.nombres);
          $("#apellidos").val(item.apellidos);
          $("#genero").val(item.genero);
          $("#fecha").val(item.fecha_nac);
          $("#dui").val(item.dui_responsable);
          $("#departamento").val(item.id_departamento);
          $("#municipio").val(item.municipio);
          $("#direccion").val(item.direccion);

        });

$("#editar").modal("show");


    }


    },error:function(response){

    }
  })

}

$(document).ready(function(){

  recuperarDatos();
});
function recuperarDatos(){
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
        html+="<th>Genero</th>";
        html+="<th>Fecha de nacimiento</th>";
        html+="<th>Dui del responsable</th>";
        html+="<th>Direccion</th>";
        html+="<th>Admin</th>";
        html+="</tr></thead><tbody>";
        data.data.forEach(function(item,index){
          var id =JSON.stringify(item.id_alumno);
          html+="<tr>";
          html+="<td>"+item.id_alumno+"</td>";
          html+="<td>"+item.nombres+"</td>";
          html+="<td>"+item.apellidos+"</td>";
          html+="<td>"+item.genero+"</td>";
          html+="<td>"+item.fecha_nac+"</td>";
          html+="<td>"+item.dui_responsable+"</td>";
          html+="<td>"+item.direccion+"</td>";
          html+="<td><button class='btn btn-primary btn-xs' onclick='editar("+id+");'><i class='far fa-edit'></i></button><span class='btn btn-danger btn-xs' onclick='eliminar("+id+");'><i class='fas fa-trash-alt'></i></span></td>";
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
$("#editform").submit(function(event){
  event.preventDefault();
$("#editar").modal("hide");
  var alumno = $("#editform").serialize();
  alertify.confirm('Editar alumno','Seguro desea editar', function(){
      $.ajax({
        url:"<?php echo controlador::$rutaAPP?>app/template/php/admin_alumno.php",
        data:alumno,
        type:'POST',
        success:function(r){
          if (r==1) {
            recuperarDatos();
            alertify.success("Editato con exito!");

          }else {
            alertify.error("Error")
          }

        }


      });

  },function(){alertify.error("cancelar")});
})

function eliminar(id) {
  $("#myModal").modal('hide');
  alertify.confirm('Eliminar alumno','Nose recomineda borrar desea continuar?', function(){
      $.ajax({
        url:"<?php echo controlador::$rutaAPP?>app/template/php/admin_alumno.php",
        data:{op:6,id:id},
        type:'POST',
        success:function(r){
          if (r==1) {
            recuperarDatos();
            alertify.success("Eliminado con exito!");

          }else {
            alertify.error("Error")
          }

        }


      });

  },function(){alertify.error("cancelar")});

}

    </script>


</body>

</html>
