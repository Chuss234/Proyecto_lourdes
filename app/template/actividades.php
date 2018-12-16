
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <title>Actividades</title>

  <!-- Todos los CSS-->  <?php include_once(__dir__."/secciones/css.php");?>


</head>

<body>

<!-- Header--><?php include_once(__dir__."/secciones/encabezado.php");?>


        <!-- Menu -->
    <div id="wrapper">

      <?php include_once(__dir__."/secciones/menu.php");?>

        <!-- Page Content -->
        <div id="page-content-wrapper">
          <div class="container-fluid container ">

            <div class="modal" id="editacti">
                <div class="modal-window">
                <div class="modal-content container">

                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>

                  <!-- Modal body -->
                  <div class="modal-body ">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label" for="descripcion">Ponderacion</label>
                      <div class="col-sm-8">
                      <input  class="form-control" type="number" step="any" min="0" max="1" name="ponderacion"  step="0.01" id="porcentaje" >
                      </div>

                    </div>
                      <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="descripcion">Nombre de la actividad</label>
                        <div class="col-sm-8">
                        <input  class="form-control" type="text" name="nombre" id="descripcion" >
                        </div>

                      </div>
                      <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="periodo">periodo</label>
                      <div class="col-sm-8">
                        <select class="form-control periodos" name="periodo"id="periodo2" >

                        </select>

                      </div>

                        </div>
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label" for="descripcion">grado</label>
                        <div class="col-sm-8">
                          <select class="form-control grados" name="grado" id="grado2" >

                          </select>
                          <input type="hidden" name="op" value="4">

                        </div>

                          </div>
                          </form>



                  </div>

                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  </div>

                </div>
              </div>
            </div>



<div class="modal" id="Modal">
  <div class="modal-window">
    <div class="modal-content container ">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Agregar actividades</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body container ">
          <form class="form-horizontal" role="form" id="actividades">
            <div class="form-group row">
              <label class="col-sm-4 col-form-label" for="descripcion">Ponderacion</label>
              <div class="col-sm-8">
              <input  class="form-control" type="number" step="any" min="0" max="1" name="ponderacion" id="porcentaje" >
              </div>

            </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label" for="descripcion">Nombre de la actividad</label>
                <div class="col-sm-8">
                <input  class="form-control" type="text" name="nombre" id="descripcion" >
                </div>

              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label" for="periodo">periodo</label>
              <div class="col-sm-8">
                <select class="form-control" name="periodo"id="periodo" required>

                </select>

              </div>

                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label" for="descripcion">grado</label>
                <div class="col-sm-8">
                  <select class="form-control" name="grado" id="grado" required>

                  </select>
                  <input type="hidden" name="op" value="4">

                </div>

                  </div>
                  </form>
              </div>


      <!-- Modal footer -->
      <div class="modal-footer">
        <apan onclick="guardarActividades();" class="btn btn-primary">Agregar</apan>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>






      <!-- Div del select notas-->


      <div class="container row" style="margin:25px;">
        <select class="col-sm-2 form-control grados" name="grado" id="grados" required>

        </select>

        <select class="col-sm-2 form-control periodos" name="periodos" id="periodos" required>


        </select>
        <div class="container col-sm-3">
          <button type="button" class=" btn btn-primary btn-md " onclick="filtrar();">FILTRAR<i class="fas fa-filter"></i></button>

        </div>
        <div class="col-sm-2">

        </div>

          <div class="container col-sm-3">
            <button type="button" class=" btn btn-success btn-md " onclick="agregar();">Agregar actividad</button>

          </div>


      </div>

      <!-- data table principal-->
      <div class="" id="contentTable">

      </div>






      </div><!-- /#page-content-wrapper -->
      </div>
    </div>
    <!-- fin del menu -->



<!-- Todos los <script--> <?php include_once(__dir__."/secciones/script.php");?><!-- Bootstrap core JavaScript -->



<script type="text/javascript">
 //  function PARA recuperar Datos para data-table principal

      function recuperarDatos(grado,periodos) {


      $.ajax({
        dataType:"json",
        url:"<?php echo controlador::$rutaAPP?>app/template/php/get_datos.php",
        data:{op:2,grado:grado,periodos:periodos},
        type:"POST",
        success:function(data){
          if (data.success==true) {
            var html ="<table ' id='tableContentData' style='text-align:center'; ><thead style='background-color: #3B5998; color: white;'><tr>";
            html+="<th>ID actividad</th>";
            html+="<th>porcentaje</th>";
            html+="<th>Nombre de la actividad</th>";
            html+="<th>Grado</th>";
            html+="<th>periodo</th>";
            html+="<th>editar</th>";
            html+="</tr></thead><tbody>";
            data.data.forEach(function(item,index){
              html+="<tr>";
              html+="<td>"+item.id_actividad+"</td>";
              html+="<td>"+(item.porcentaje)*100+"%"+"</td>";
              html+="<td>"+item.descripcion+"</td>";
              html+="<td>"+item.id_grado+"</td>";
              html+="<td>"+item.tipo_periodo+"</td>";
              html+="<td><button class='btn btn-primary btn-xs'  onclick='eliminar("+item.id_actividad+")'><i class='fas fa-trash-alt'></i></button></td>";
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
    //recuperar datos para el select
              </script>
              <script type="text/javascript">
              $(document).ready(function(){

                $.ajax({
                  dataType:"json",
                  url:"<?php echo controlador::$rutaAPP?>app/template/php/get_datos.php",
                  data:{op:3,fl:1},
                  type:"POST",
                  success:function(data){
                    if (data.success==true) {

                      $(".grados").append("<option value='0'>Seleccione un Grado</option>");
                      data.data.forEach(function(item,index){
                        $(".grados").append("<option value="+item.id_grado+">"+item.nom_grado+"</option>");
                       });

                       $(".periodos").append("<option value='0'>Seleccione un periodo</option>");
                       data.dataperi.forEach(function(item,index){
                         $(".periodos").append("<option value="+item.id_periodo+">"+item.tipo_periodo+"</option>");
                       });
                  }

                  },
                  error:function(response){

                  }


                });


              });
              </script>

<script type="text/javascript">
//evento change para select #materia

        function filtrar(){
          var grado= $("#grados").val();
          var periodos= $("#periodos").val();
          recuperarDatos(grado,periodos);

        }






    </script>

    <script type="text/javascript">
     function agregar(){
       $("#Modal").modal("show");

       $.ajax({
          dataType:"json",
          url:"<?php echo controlador::$rutaAPP?>app/template/php/get_datos.php",
          data:{op:3,fl:1},
          type:'POST',
          success: function(data){
            if (data.success==true) {
              $("#periodo option").each(function(){
            $(this).remove();
          });

             $("#periodo").append("<option value='0'>Seleccione un periodo</option>");
             data.dataperi.forEach(function(item,index){
               $("#periodo").append("<option value="+item.id_periodo+">"+item.tipo_periodo+"</option>");
             });
             $("#grado option").each(function(){
           $(this).remove();
         });
             $("#grado").append("<option value='0'>Seleccione un Grado </option>");
             data.data.forEach(function(item,index){
               $("#grado").append("<option value="+item.id_grado+">"+item.nom_grado+"</option>");
              });
              }

          }
       });
     }


    </script>
    <script type="text/javascript">

    function guardarActividades(){
      var datos= $("#actividades").serialize();
      $.ajax({

        url:"<?php echo controlador::$rutaAPP?>app/template/php/get_datos.php",
        data:datos,
        type:'POST',
        success: function(r){
          if (r==1) {
            bootbox.alert("Guardado");


          }else{
            bootbox.alert("la Ponderacion es mayor 100%");

          }


        }


      });


    }


    function editar(id){
      $.ajax({
        dataType:"json",
        url:"<?php echo controlador::$rutaAPP?>app/template/php/get_notas.php",
        data:{op:3,id:id},
        type:"POST",
        success:function(data){
          if (data.success==true) {
            data.data.forEach(function(item,index){
              $("#porcentaje").val(item.porcentaje);
              $("#descripcion").val(item.descripcion);
              $("#grado2").val(item.id_grado);
              $("#periodo2").val(item.id_periodo);


            });

    $("#editacti").modal("show");


        }


        },error:function(response){

        }
      })

    }

    function eliminar(id) {
      $("#myModal").modal('hide');
      alertify.confirm('Eliminar la actividad','Nose recomineda borrar desea continuar?', function(){
          $.ajax({
            url:"<?php echo controlador::$rutaAPP?>app/template/php/get_notas.php",
            data:{op:4,id:id},
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
