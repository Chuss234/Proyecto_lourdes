
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Notas</title>

  <!-- Todos los CSS-->  <?php include_once(__dir__."/secciones/css.php");?>


</head>

<body>

<!-- Header--><?php include_once(__dir__."/secciones/encabezado.php");?>


        <!-- Menu -->
    <div id="wrapper">

      <?php include_once(__dir__."/secciones/menu.php");?>
        <!-- Page Content -->
        <div id="page-content-wrapper">
          <div class="container-fluid container">


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
                    <div id="content" style="font-size:12px;" width="100%">

                    </div>


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
    <div class="modal-content container">

      <!-- Modal Header -->
      <div class="modal-header">

        <h4 class="modal-title col-sm-4 ">Agregar Notas de Alumno</h4>

        <select class="col-sm-2 form-control " name="grado" id="grados2" required>

        </select>

        <select class="col-sm-2 form-control " name="periodos" id="periodos2" required>


        </select>
        <span class="btn btn-primary col-sm-2" onclick="filtarNotas();">FILTRAR</span>


        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>


      <!-- Modal body -->
      <div class="modal-body ">
          <form class="form-inline" role="form" id="nota">

                <select class="form-control col-sm-2" name="alumno" id="alumno">

                </select>

                <select class="form-control col-sm-2" name="asignatura"id="materia">

                </select>

                <select class="form-control col-sm-2" name="docente" id="docente" >

                </select>

                <select class="form-control col-sm-2" name="actividad"id="actividad">

                </select>
                <input type="hidden" name="op" value="1">
                <input type="hidden" name="sec" id="sec" value="">
                <input type="hidden" name="gra"  id="gra" value="">

                <input type="number" id="nota" class="form-control col-sm-2" min="0" max="10" step="any" name="nota"size="2">

                <button type="submit" class="btn btn-primary col-sm-1" >Agregar</button>


              </form>


      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>






      <!-- Div del select notas-->
      <div class="container row" style="margin:25px;">
        <select class="col-sm-2 form-control " name="grado" id="grados" required>

        </select>

        <select class="col-sm-2 form-control " name="periodos" id="periodos" required>


        </select>
        <select class="col-sm-2 form-control " name="grado" id="asignatura" required>

        </select>
        <div class="container col-sm-3">
          <button type="button" class=" btn btn-primary btn-md " onclick="filtrar();">FILTRAR<i class="fas fa-filter"></i></button>

        </div>


          <div class="container col-sm-3">
            <button type="button" class=" btn btn-success btn-md " onclick="agregar();">Agregar Nota</button>

          </div>


      </div>

      <!-- data table -->
      <div class="" id="contentTable">

      </div>






      </div><!-- /#page-content-wrapper -->
      </div>
    </div>
    <!-- fin del menu -->



<!-- Todos los CSS--> <?php include_once(__dir__."/secciones/script.php");?><!-- Bootstrap core JavaScript -->



<script type="text/javascript">

  function agregar(){

    $("#Modal").modal("show");
  }




      function recuperarDatos(grado,periodos,asignatura) {


      $.ajax({
        dataType:"json",
        url:"<?php echo controlador::$rutaAPP?>app/template/php/get_user.php",
        data:{op:2,grado:grado,periodos:periodos,asignatura:asignatura},
        type:"POST",
        success:function(data){
          if (data.success==true) {
            var html ="<table ' id='tabla' style='text-align:center'; ><thead style='background-color: #3B5998; color: white;'><tr>";
            html+="<th>ID Alumno</th>";
            html+="<th>Alumno</th>";
            html+="<th>Asignatura</th>";
            html+="<th>Profesor</th>";
            html+="<th>NOTA FINAL</th>";
            html+="<th>Calidad</th>";
            html+="<th>grado</th>";
            html+="<th>Periodo</th>";
            html+="<th>Borrar/editar</th>";
            html+="</tr></thead><tbody>";
            data.data.forEach(function(item,index){
              var alumno =JSON.stringify(item.id_alumno);
              var asignatura =JSON.stringify(item.asignatura);

              html+="<tr>";
              html+="<td>"+item.id_alumno+"</td>";
              html+="<td>"+item.Alumno+"</td>";
              html+="<td>"+item.asignatura+"</td>";
              html+="<td>"+item.Profesor+"</td>";
              html+="<td>"+item.ponderacion+"</td>";
              if (item.ponderacion>6) {
                html+="<td><img src='app/template/images/verde.png' width='60px'> </td>";

              }else if (item.ponderacion==6) {
                html+="<td><img src='app/template/images/amarillo.png' width='40px'> </td>";

              }
              else if(item.ponderacion<6){
                html+="<td><img src='app/template/images/rojo.png' width='60px'> </td>";
              }
              html+="<td>"+item.id_grado+"</td>";
              html+="<td>"+item.tipo_periodo+"</td>";
              html+="<td><button class='btn btn-primary btn-xs'  onclick='notas("+alumno+","+asignatura+","+item.id_periodo+")'><i class='far fa-edit'></i></button></td>";
              html+="</tr>";

            });
            html+="</tbody></table>";
            $("#contentTable").html(html);

            $("#tabla").DataTable();

        }


        },


        error:function(response){

        }
      })
    }


    </script>



    <script type="text/javascript">



    function notas(alumno,asignatura,periodo) {

    $.ajax({
      dataType:"json",
      url:"<?php echo controlador::$rutaAPP?>app/template/php/get_user.php",
      data:{op:2,grado:'7A',alumno:alumno,asignatura:asignatura,periodo:periodo},
      type:"POST",
      success:function(data){
        if (data.success==true) {
          $("#myModal").modal("show");

          var notas ="<table ' id='tableContentData' style='text-align:center'; class='table-responsive' ><thead style='background-color: #3B5998; color: white;'><tr>";
          notas+="<th>ID Alumno</th>";
          notas+="<th>Alumno</th>";
          notas+="<th>Asignatura</th>";
          notas+="<th>Profesor</th>";
          notas+="<th>descripcion</th>";
          notas+="<th>porcentaje</th>";
          notas+="<th>nota</th>";
          notas+="<th>Ponderacion</th>";
          notas+="<th>grado</th>";
          notas+="<th>Periodo</th>";
          notas+="<th>Borrar/editar</th>";
          notas+="</tr></thead><tbody>";
          data.data.forEach(function(item,index){
            var id =JSON.stringify(item.id_nota);
            notas+="<tr>";
            notas+="<td>"+item.id_alumno+"</td>";
            notas+="<td>"+item.Alumno+"</td>";
            notas+="<td>"+item.asignatura+"</td>";
            notas+="<td>"+item.Profesor+"</td>";
            notas+="<td>"+item.descripcion+"</td>";
            notas+="<td>"+item.porcentaje+"</td>";
            notas+="<td>"+item.nota+"</td>";
            notas+="<td>"+item.ponderacion+"</td>";
            notas+="<td>"+item.id_grado+"</td>";
            notas+="<td>"+item.tipo_periodo+"</td>";
            notas+="<td><button class='btn btn-primary btn-xs'><i class='far fa-edit' onclick='editar();'></i></button><span class='btn btn-danger btn-xs' onclick='eliminar("+id+");'><i class='fas fa-trash-alt'></i></span></td>";
            notas+="</tr>";

          });
          notas+="</tbody></table>";
          $("#content").html(notas);

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

                          $("#grados").append("<option value='0'>Seleccione un Grado</option>");
                          data.data.forEach(function(item,index){
                            $("#grados").append("<option value="+item.id_grado+">"+item.nom_grado+"</option>");
                           });

                           $("#periodos").append("<option value='0'>Seleccione un periodo</option>");
                           data.dataperi.forEach(function(item,index){
                             $("#periodos").append("<option value="+item.id_periodo+">"+item.tipo_periodo+"</option>");
                           });
                           $("#asignatura").append("<option value='0'>Asignatura</option>");
                           data.dataasig.forEach(function(item,index){
                             $("#asignatura").append("<option value="+item.asignatura+">"+item.asignatura+"</option>");
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
              var asignatura= $("#asignatura").val();
              recuperarDatos(grado,periodos,asignatura);

            }






        </script>

        <script type="text/javascript">
         function agregar(){
           $("#Modal").modal("show");

           $.ajax({
              dataType:"json",
              url:"<?php echo controlador::$rutaAPP?>app/template/php/get_datos.php",
              data:{op:3,fl:1,grado:'7A'},
              type:'POST',
              success: function(data){
                $("#grados2 option").each(function(){
                  $(this).remove();
                });
                $("#grados2").append("<option value='0'>Seleccione un Grado</option>");
                data.data.forEach(function(item,index){
                  $("#grados2").append("<option value="+item.id_grado+">"+item.nom_grado+"</option>");
                 });
                 $("#periodos2 option").each(function(){
                     $(this).remove();
                   });
                 $("#periodos2").append("<option value='0'>Seleccione un periodo</option>");
                 data.dataperi.forEach(function(item,index){
                   $("#periodos2").append("<option value="+item.id_periodo+">"+item.tipo_periodo+"</option>");
                 });






                  }


           });
         }


        </script>
        <script type="text/javascript">
        function filtarNotas(){
          var grado= $("#grados2").val();
          var periodos= $("#periodos2").val();

          $("#gra").val($("#grados2").val());

          $("#sec").val($("#periodos2").val());

          $.ajax({
             dataType:"json",
             url:"<?php echo controlador::$rutaAPP?>app/template/php/get_datos.php",
             data:{op:3,fl:2,grado:grado,periodos:periodos},
             type:'POST',
             success: function(data){
               $("#alumno option").each(function(){
                 $(this).remove();
               });
               $("#alumno").append("<option value='0'>Alumno </option>");
               data.dataalum.forEach(function(item,index){
                 $("#alumno").append("<option value="+item.id_alumno+">"+item.nombres+"</option>");
                });
                $("#materia option").each(function(){
                    $(this).remove();
                  });
                $("#materia").append("<option value='0'>Asignatura</option>");
                data.dataasig.forEach(function(item,index){
                  $("#materia").append("<option value="+item.id_asignatura+">"+item.asignatura+"</option>");
                 });
                 $("#docente option").each(function(){
                        $(this).remove();
                      });
                 $("#docente").append("<option value='0'>docentes</option>");
                 data.datadoce.forEach(function(item,index){
                   $("#docente").append("<option value="+item.cod_docente+">"+item.nombres+" "+item.apellidos+"</option>");
                  });
                  $("#actividad option").each(function(){
                      $(this).remove();
                    });
                  $("#actividad").append("<option value='0'>actividades </option>");
                  data.dataacti.forEach(function(item,index){
                    $("#actividad").append("<option value="+item.id_actividad+">"+item.descripcion+"</option>");
                   });

                 }


          });
        }

        </script>


        <script type="text/javascript">

        $("#nota").submit(function(event){
          event.preventDefault();
          var datos= $("#nota").serialize();

          $.ajax({

            url:"<?php echo controlador::$rutaAPP?>app/template/php/get_notas.php",
            data:datos,
            type:'POST',
            success: function(r){
              if (r==1) {
                var grado= $("#grados").val();
                var periodos= $("#periodos").val();
                var asignatura= $("#asignatura").val();
                recuperarDatos(grado,periodos,asignatura);
                alertify.success("Guardado");


              } else if (r==2) {

                  alertify.error("El alumno ya tiene todas las actividades");

                }
              else if (r==3) {
                alertify.error("El alumno ya tiene esa actividad");

              }

              else{
                alertify.error("La nota no es correcta");

              }


            }


          });

        });

        function eliminar(id) {
          $("#myModal").modal('hide');
          alertify.confirm('Eliminar actividad','Seguro?', function(){
              $.ajax({
                url:"<?php echo controlador::$rutaAPP?>app/template/php/get_notas.php",
                data:{op:2,id:id},
                type:'POST',
                success:function(r){
                  if (r==1) {
                    var grado= $("#grados").val();
                    var periodos= $("#periodos").val();
                    var asignatura= $("#asignatura").val();
                    recuperarDatos(grado,periodos,asignatura);
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
