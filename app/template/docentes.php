<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Docente</title>
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
            <div class="container-fluid ">



              <div class="modal" id="myModal">
                  <div class="modal-dialog">
                  <div class="modal-content container">

                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title"></h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body ">
                      <form class="form"id="formdocen" >
                        <input type="text" name="COD" id="COD" class="form-control limpiar"  placeholder="COD docente">
                        <input type="text" name="nombres" id="nombres" class="form-control limpiar"  placeholder="Nombres">
                        <input type="text" name="apellidos" id="apellidos"class="form-control limpiar" placeholder="Apellidos" >
                        <input type="text" name="especialidad" id="especialidad"class="form-control limpiar"  placeholder="especialidad">
                        <input type="text" name="nit" id="nit"class="form-control limpiar" placeholder="NIT" >
                        <input type="text" name="dui" id="dui" class="form-control limpiar" placeholder="DUI" >
                        <input type="hidden" name="op" value="3">
                        <input type="hidden" name="editar"id="editar" value="">
                        <select class="form-control limpiar" name="departamento" id="departamento" placeholder="Departamento">
                          <option value="1"> Santa Ana</option>
                          <option value="2" selected> Ahuachapan</option>
                          <option value="3"> Sonsonate</option>
                        </select>
                        <input type="text" name="municipio" id="municipio"class="form-control limpiar" placeholder="Municipio">
                        <input type="text" name="direccion"id="direccion" class=" form-control limpiar" placeholder="Direccion">

                      </form>

                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                      <button type="button" name="agregar" class="btn btn-primary"  onclick="agregardocen()">Agregar</button>
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

              </div>
              </div>
              </div>
              <ul class="nav nav-tabs">
              <li class="nav-item">
                <a class="nav-link " href="<?php echo controlador::$rutaAPP ?>index.php?action=admin">Administar grados</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link active" href="<?php echo controlador::$rutaAPP ?>index.php?action=docentes">Administrar docentes</a>
              </li>

            </ul>
            <button type="button" name="agregar" class="btn btn-success float-right"  onclick="agregar()">Agregar Docente</button><br><br>

            <br><br>
            <div id="contentTable" width="100%">

          </div>

          </div>
      </div>
    </div>    <!-- fin del menu -->

    <!-- core JavaScript -->  <?php include_once(__dir__."/secciones/script.php");?>

<script type="text/javascript">
$(document).ready(function(){

  recuperarDatos();
});
function recuperarDatos(){
  $.ajax({
    dataType:"json",
    url:"<?php echo controlador::$rutaAPP?>app/template/php/get_docente.php",
    data:{op:1},
    type:"POST",
    success:function(data){
      if (data.success==true) {
        var html ="<table   id='tableContentData' style='text-align:center'; ><thead style='background-color: #3B5998; color: white;'><tr>";
        html+="<th>COD docente</th>";
        html+="<th>Nombres</th>";
        html+="<th>Apellidos</th>";
        html+="<th>Especialidad</th>";
        html+="<th>NIT</th>";
        html+="<th>DUI</th>";
        html+="<th>departamento</th>";
        html+="<th>municipio</th>";
        html+="<th>direccion</th>";
        html+="<th>Borrar</th>";
        html+="</tr></thead><tbody>";
        data.data.forEach(function(item,index){
          var id =JSON.stringify(item.cod_docente);

          html+="<tr>";
          html+="<td>"+item.cod_docente+"</td>";
          html+="<td>"+item.nombres+"</td>";
          html+="<td>"+item.apellidos+"</td>";
          html+="<td>"+item.especialidad+"</td>";
          html+="<td>"+item.nit+"</td>";
          html+="<td>"+item.dui+"</td>";
          html+="<td>"+item.departamento+"</td>";
          html+="<td>"+item.municipio+"</td>";
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

</script>
<script type="text/javascript">

function eliminar(id) {

  alertify.confirm('Eliminar responsable','Nose recomineda borrar desea continuar?', function(){
      $.ajax({
        url:"<?php echo controlador::$rutaAPP?>app/template/php/get_docente.php",
        data:{op:2,id:id},
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

function agregar(){
  $("#editar").val("0");
$(".limpiar").val("");
$("#myModal").modal("show")

}
function agregardocen(){

    var datos = $("#formdocen").serialize();
    alertify.confirm('Editar Responsable','Seguro desea editar', function(){
        $.ajax({
          url:"<?php echo controlador::$rutaAPP?>app/template/php/get_docente.php",
          data:datos,
          type:'POST',
          success:function(r){
            if (r==1) {
              recuperarDatos();
              alertify.success("Agregado con exito!");

            }else {
              alertify.error("Error")
            }

          }


        });

    },function(){alertify.error("cancelar")});



}
</script>
<script type="text/javascript">
function editar(id){
  $.ajax({
    dataType:"json",
    url:"<?php echo controlador::$rutaAPP?>app/template/php/get_docente.php",
    data:{op:4,id:id},
    type:"POST",
    success:function(data){
      if (data.success==true) {
      data.data.forEach(function(item,index){

        $("#COD").val(item.cod_docente);
        $("#nombres").val(item.nombres);
        $("#apellidos").val(item.apellidos);
        $("#especialidad").val(item.especialidad);
        $("#nit").val(item.nit);
        $("#dui").val(item.dui);
        $("#departamento").val(item.id_departamento);
        $("#municipio").val(item.municipio);
        $("#direccion").val(item.direccion);
        $("#editar").val("1");

      });

    }

    else {
      alertify.error("no se hay datos");
      }

    }
  });
  $("#myModal").modal("show");
}
</script>
</body>

</html>
