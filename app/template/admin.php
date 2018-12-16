<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administrar</title>
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



              <div class="modal" id="myModal">
                  <div class="modal-window">
                  <div class="modal-content container">

                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title"></h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body ">
                      <div id="contentTable" width="100%">

                    </div>


                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

              </div>
              </div>
              </div>
              <ul class="nav nav-tabs">
              <li class="nav-item">
                <a class="nav-link active" href="<?php echo controlador::$rutaAPP ?>index.php?action=admin">Administar grados</a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="<?php echo controlador::$rutaAPP ?>index.php?action=docentes">Administar docentes</a>
              </li>

            </ul><br><br>

        <div class="row ">
              <div class="card border-primary mb-3" style="margin: 10px;max-width: 20rem;">
                  <div class="card-header bg-info border"><h4 style="color:white;">secciones  ></h4> </div>
                  <div class="card-body ">
                    <form class="form-inline" id="formseccion" method="post">

                        <input type="text" name="seccion" id="seccion" class="form-control limpiar" placeholder="seccion" >

                        <input type="text" name="desc" id="desc" class="form-control limpiar" placeholder="description">
                      <input type="hidden" name="op" value="1">
                    </form>

                  </div>
                  <div class="card-footer bg-transparent border-primary">
                    <button type="button" class="btn btn-success" name="button" onclick="guardarseccion()">Agregar</button>
                    <button type="button" class="btn btn-primary" name="button" onclick="consultar()">consultar</button>
                  </div>
                </div>

                <div class="card border-primary mb-3 " style="margin: 10px;max-width: 20rem;">
                    <div class="card-header bg-info border "><h4 style="color:white;">Grados ></h4></div>
                    <div class="card-body text-primary">

                    <form class="form-inline" id="formgrado">
                      <input type="text" class="form-control limpiar" name="idgrado" value="" placeholder="ID del grado">
                      <input type="text" class="form-control limpiar" name="grado" value="" placeholder="Nombre del grado">
                      <input type="text" class="form-control limpiar" name="descripcion" value=""placeholder="descripcion">
                      <select id="idsec" class="form-control" name="idsec">

                      </select>
                      <input type="text" class="form-control limpiar" name="cant" value=""placeholder="cantidad maxima">
                      <input type="hidden" name="op" value="2">


                    </form>

                    </div>
                    <div class="card-footer bg-transparent border-primary">
                      <button type="button" class="btn btn-success" name="button" onclick="guardargrado()">Agregar</button>
                      <button type="button" class="btn btn-primary" name="button" onclick="consultargrado()">consultar</button>
                    </div>
                  </div>

                  <div class="card border-primary mb-3" style="margin: 10px;max-width: 20rem;">
                      <div class="card-header bg-info border"><h4 style="color:white;">periodos ></h4></div>
                      <div class="card-body text-primary">

                      <form class="form-inline" id="formper">

                        <input type="text" class="form-control limpiar" name="periodo" value="" placeholder="periodo">
                        <input type="date" class="form-control limpiar" name="fechain" value="" placeholder="fecha de Inicio">
                        <input type="date" class="form-control limpiar" name="fechafin" value="" placeholder="fecha de FIN">

                        <input type="hidden" name="op" value="7">


                      </form>

                      </div>
                      <div class="card-footer bg-transparent border-primary">
                        <button type="button" class="btn btn-success" name="button" onclick="guardarper()">Agregar</button>
                        <button type="button" class="btn btn-primary" name="button" onclick="consultarper()">consultar</button>
                      </div>
                    </div>


                  <div class="card border-primary mb-3" style="margin: 10px;max-width: 20rem;">

                        <div class="card-header bg-info border"><h4 style="color:white;">Materias</h4></div>
                        <div class="card-body text-primary">

                          <form class="form-inline" id="formasig">
                            <input type="text" name="id" class="form-control" placeholder="COD de la Materia">
                            <input type="text" name="asignatura" class="form-control" placeholder="Nombre de la materia">
                            <input type="hidden" name="op" value="3">

                          </form>

                        </div>
                        <div class="card-footer bg-transparent border-primary">
                          <button type="button" class="btn btn-success" name="button" onclick="guardarasig()">Agregar</button>
                          <button type="button" class="btn btn-primary" name="button" onclick="consultarasig()">consultar</button>
                        </div>
                      </div>
                  </div>
                </div>
                </div>

              </div>





            </div>
        </div>      <!-- /#page-content-wrapper -->

    </div>    <!-- fin del menu -->

    <!-- core JavaScript -->  <?php include_once(__dir__."/secciones/script.php");?>

<script type="text/javascript">
$(document).ready(function(){
    seccion();
});
function seccion(){
  $.ajax({
     dataType:"json",
     url:"<?php echo controlador::$rutaAPP?>app/template/php/admin.php",
     data:{op:4,},
     type:'POST',
     success: function(data){
       $("#idsec option").each(function(){
         $(this).remove();
       });
       $("#idsec").append("<option value='0'>secciones</option>");
       data.data.forEach(function(item,index){
         $("#idsec").append("<option value="+item.id_seccion+">"+item.seccion+"</option>");
        });


      }


  });
}

</script>

    <script type="text/javascript">
    function guardarper(){
         var datos= $("#formper").serialize();

         $.ajax({
                type:"POST",
                url:"<?php echo controlador::$rutaAPP?>app/template/php/admin.php",
                data:datos,
                success:function(r){
                  if(r==1){

                    alertify.success("El periodo se ingreso correctamente");
                    $(".limpiar").val("");

                  }else{
                    alertify.error("Fallo en el envio del formulario");
                  }
                }

              });

    }
    function guardarseccion(){
         var datos= $("#formseccion").serialize();

         $.ajax({
                type:"POST",
                url:"<?php echo controlador::$rutaAPP?>app/template/php/admin.php",
                data:datos,
                success:function(r){
                  if(r==1){
                    seccion();
                    alertify.success("la seccion se ingreso");

                    $(".limpiar").val("");

                  }else{
                    alertify.error("Fallo en el envio del formulario");
                  }
                }

              });

    }
    function guardargrado(){
         var datos= $("#formgrado").serialize();

         $.ajax({
                type:"POST",
                url:"<?php echo controlador::$rutaAPP?>app/template/php/admin.php",
                data:datos,
                success:function(r){
                  if(r==1){

                    alertify.success("grado ingresado correctamente");
                    $(".limpiar").val("");

                  }else{
                    alertify.error("Fallo en el envio del formulario");
                  }
                }

              });

    }
    function guardarasig(){
         var datos= $("#formasig").serialize();

         $.ajax({
                type:"POST",
                url:"<?php echo controlador::$rutaAPP?>app/template/php/admin.php",
                data:datos,
                success:function(r){
                  if(r==1){

                    alertify.success("La matria fue ingresada");
                    $(".limpiar").val("");

                  }else{
                    alertify.error("Fallo en el envio del formulario");
                  }
                }

              });

    }

    </script>

<!-- SCRIPT PARA CONSULTAR-->
    <script type="text/javascript">
    function consultar(){

      $("#myModal").modal("show");
      $.ajax({
        dataType:"json",
        url:"<?php echo controlador::$rutaAPP?>app/template/php/admin.php",
        data:{op:4},
        type:"POST",
        success:function(data){
          if (data.success==true) {
            $("#myModal").modal("show");
            var notas ="<table ' id='tableContentData' style='text-align:center;' ><thead style='background-color: #3B5998; color: white;'><tr>";
            notas+="<th>seccion</th>";
            notas+="<th>description</th>";
            notas+="<th>borrar</th>";
            notas+="</tr></thead><tbody>";
            data.data.forEach(function(item,index){
              var id =JSON.stringify(item.id_seccion);
              notas+="<tr>";
              notas+="<td>"+item.seccion+"</td>";
              notas+="<td>"+item.descripcion+"</td>";

              notas+="<td><span class='btn btn-danger btn-xs' onclick='eliminar("+id+");'><i class='fas fa-trash-alt'></i></span></td>";
              notas+="</tr>";

            });
            notas+="</tbody></table>";
            $("#contentTable").html(notas);

            $("#tableContentData").DataTable();

        }


        }
      })
    }

    </script>

    <script type="text/javascript">
    function consultargrado(){

      $("#myModal").modal("show");
      $.ajax({
        dataType:"json",
        url:"<?php echo controlador::$rutaAPP?>app/template/php/admin.php",
        data:{op:5},
        type:"POST",
        success:function(data){
          if (data.success==true) {
            $("#myModal").modal("show");
            var notas ="<table ' id='table' style='text-align:center;'><thead style='background-color: #3B5998; color: white;'><tr>";
            notas+="<th>ID grado</th>";
            notas+="<th>Grados</th>";
            notas+="<th>Section</th>";
            notas+="<th>Descripcion</th>";
            notas+="<th>MAX</th>";
            notas+="<th>borrar</th>";
            notas+="</tr></thead><tbody>";
            data.data.forEach(function(item,index){
              id =JSON.stringify(item.id_grado);
              notas+="<tr>";
              notas+="<td>"+item.id_grado+"</td>";
              notas+="<td>"+item.nom_grado+"</td>";
              notas+="<td>"+item.seccion+"</td>";
              notas+="<td>"+item.descripcion+"</td>";
              notas+="<td>"+item.cant_max+"</td>";

              notas+="<td><span class='btn btn-danger btn-xs' onclick='eliminargrado("+id+");'><i class='fas fa-trash-alt'></i></span></td>";
              notas+="</tr>";

            });
            notas+="</tbody></table>";
            $("#contentTable").html(notas);

            $("#table").DataTable();

        }


        }
      })
    }

    </script>

    <script type="text/javascript">
    function consultarasig(){

      $("#myModal").modal("show");
      $.ajax({
        dataType:"json",
        url:"<?php echo controlador::$rutaAPP?>app/template/php/admin.php",
        data:{op:6},
        type:"POST",
        success:function(data){
          if (data.success==true) {
            $("#myModal").modal("show");
            var notas ="<table ' id='tableData' style='text-align:center;' ><thead style='background-color: #3B5998; color: white;'><tr>";
            notas+="<th>ID asignatura</th>";
            notas+="<th>Asignatura</th>";
            notas+="<th>borrar</th>";
            notas+="</tr></thead><tbody>";
            data.data.forEach(function(item,index){
              var id =JSON.stringify(item.id_asignatura);
              notas+="<tr>";
              notas+="<td>"+item.id_asignatura+"</td>";
              notas+="<td>"+item.asignatura+"</td>";
              notas+="<td><span class='btn btn-danger btn-xs' onclick='eliminarasig("+id+");'><i class='fas fa-trash-alt'></i></span></td>";
              notas+="</tr>";

            });
            notas+="</tbody></table>";
            $("#contentTable").html(notas);

            $("#tableData").DataTable();

        }


        }
      })
    }

    </script>

    <script type="text/javascript">
    function consultarper(){

      $("#myModal").modal("show");
      $.ajax({
        dataType:"json",
        url:"<?php echo controlador::$rutaAPP?>app/template/php/admin.php",
        data:{op:8},
        type:"POST",
        success:function(data){
          if (data.success==true) {
            $("#myModal").modal("show");
            var notas ="<table ' id='Data' style='text-align:center;' ><thead style='background-color: #3B5998; color: white;'><tr>";
            notas+="<th>periodo</th>";
            notas+="<th>Fecha de inicio</th>";
            notas+="<th>Fecha de cierre</th>";
            notas+="<th>borrar/Editar</th>";
            notas+="</tr></thead><tbody>";
            data.data.forEach(function(item,index){
              var id =JSON.stringify(item.id_periodo);
              notas+="<tr>";
              notas+="<td>"+item.tipo_periodo+"</td>";
              notas+="<td>"+item.fecha_inicio+"</td>";
              notas+="<td>"+item.fecha_fin+"</td>";
              notas+="<td><span class='btn btn-danger btn-xs' onclick='eliminarper("+id+");'><i class='fas fa-trash-alt'></i></span></td>";
              notas+="</tr>";

            });
            notas+="</tbody></table>";
            $("#contentTable").html(notas);

            $("#Data").DataTable();

        }


        }
      })
    }

    </script>
<script type="text/javascript">
function eliminar(id) {
$("#myModal").modal("hide");
  alertify.confirm('Eliminar seccion','Nose recomineda borrar desea continuar?', function(){
      $.ajax({
        url:"<?php echo controlador::$rutaAPP?>app/template/php/admin.php",
        data:{op:9,id:id},
        type:'POST',
        success:function(r){
          if (r==1) {
            alertify.success("Eliminado con exito!");

          }else {
            alertify.error("Error")
          }

        }


      });

  },function(){alertify.error("cancelar")});

}

</script>
<script type="text/javascript">
function eliminargrado(id) {
$("#myModal").modal("hide");
  alertify.confirm('Eliminar grado','Nose recomineda borrar desea continuar?', function(){
      $.ajax({
        url:"<?php echo controlador::$rutaAPP?>app/template/php/admin.php",
        data:{op:10,id:id},
        type:'POST',
        success:function(r){
          if (r==1) {
            alertify.success("Eliminado con exito!");

          }else {
            alertify.error("Error")
          }

        }


      });

  },function(){alertify.error("cancelar")});

}

</script>


<script type="text/javascript">
function eliminarasig(id) {
$("#myModal").modal("hide");
  alertify.confirm('Eliminar asignatura','Nose recomineda borrar desea continuar?', function(){
      $.ajax({
        url:"<?php echo controlador::$rutaAPP?>app/template/php/admin.php",
        data:{op:11,id:id},
        type:'POST',
        success:function(r){
          if (r==1) {
            alertify.success("Eliminado con exito!");

          }else {
            alertify.error("Error")
          }

        }


      });

  },function(){alertify.error("cancelar")});

}

</script>
<script type="text/javascript">
function eliminarper(id) {
$("#myModal").modal("hide");
  alertify.confirm('Eliminar periodo','Nose recomineda borrar desea continuar?', function(){
      $.ajax({
        url:"<?php echo controlador::$rutaAPP?>app/template/php/admin.php",
        data:{op:12,id:id},
        type:'POST',
        success:function(r){
          if (r==1) {
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
