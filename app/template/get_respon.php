


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Responsable</title>
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
                        <h4 class="modal-title"> Editar responsable</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>

                      <!-- Modal body -->
                      <div class="modal-body ">
                        <div class="container">
                          <div class="card text-center container ">

                          <div class="card-body">
                            <table border="1" cellpadding="3" cellspacing="3" class="table table-hover table table-borderless">

                              <form class="" id="editres" method="post">

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
                                <input type="hidden" name="id" id="id" value="">

                                  </form>
                                  </table>
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
            </div>

            <div id="contentTable" width="100%">

            </div>


          </div>
        </div>
      </div>

    <!-- Fin del menu-->




<!-- Bootstrap core JavaScript -->  <?php include_once(__dir__."/secciones/script.php");?>
<script type="text/javascript">
$(document).ready(function(){
  datos();

});


        function datos(){

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
                html+="<th>Admin</th>";
                html+="</tr></thead><tbody>";
                data.data.forEach(function(item,index){
                  var id =JSON.stringify(item.dui_responsable);
                  html+="<tr>";
                  html+="<td>"+item.dui_responsable+"</td>";
                  html+="<td>"+item.nombres+"</td>";
                  html+="<td>"+item.apellidos+"</td>";
                  html+="<td>"+item.parentesco+"</td>";
                  html+="<td>"+item.telefono+"</td>";
                  html+="<td>"+item.trabajo_res+"</td>";
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



  function eliminar(id) {
    $("#myModal").modal('hide');
    alertify.confirm('Eliminar responsable','Nose recomineda borrar desea continuar?', function(){
        $.ajax({
          url:"<?php echo controlador::$rutaAPP?>app/template/php/admin_alumno.php",
          data:{op:1,id:id},
          type:'POST',
          success:function(r){
            if (r==1) {
              datos();
              alertify.success("Eliminado con exito!");

            }else {
              alertify.error("Error")
            }

          }


        });

    },function(){alertify.error("cancelar")});

  }

//--------------------------------------------------------------------------//
function editar(id){
  $("#editar").modal("show");
  $.ajax({
    dataType:"json",
    url:"<?php echo controlador::$rutaAPP?>app/template/php/admin_alumno.php",
    data:{op:2,id:id,select:2},
    type:"POST",
    success:function(data){
      if (data.success==true) {
        data.data.forEach(function(item,index){

          $("#nombre").val(item.nombres);
          $("#apellidos").val(item.apellidos);
          $("#parentesco").val(item.parentesco);
          $("#dui").val(item.dui_responsable);
          $("#id").val(item.dui_responsable);
          $("#telefono").val(item.telefono);
          $("#correo").val(item.correo);
          $("#laboral").val(item.trabajo_res);


        });




    }


    },error:function(response){

    }
  })

}

$("#editres").submit(function(event){
  event.preventDefault();
$("#editar").modal("hide");

  var respon = $("#editres").serialize();
  alertify.confirm('Editar Responsable','Seguro desea editar', function(){
      $.ajax({
        url:"<?php echo controlador::$rutaAPP?>app/template/php/admin_alumno.php",
        data:respon,
        type:'POST',
        success:function(r){
          if (r==1) {
            datos();
            alertify.success("Editato con exito!");

          }else {
            alertify.error("Error")
          }

        }


      });

  },function(){alertify.error("cancelar")});
})

    </script>


</body>

</html>
