
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Grados</title>

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
      <!-- Div del select notas-->


      <div class="container row" style="margin:25px;">

        <select class="col-sm-4 form-control " name="grado" id="grados" required>

        </select>


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

      function recuperarDatos(grado){


      $.ajax({
        dataType:"json",
        url:"<?php echo controlador::$rutaAPP?>app/template/php/get_grados.php",
        data:{op:2,grado:grado},
        type:"POST",
        success:function(data){
          if (data.success==true) {
            var html ="<table ' id='tableContentData' style='text-align:center'; ><thead style='background-color: #3B5998; color: white;'><tr>";
            html+="<th>No de lista</th>";
            html+="<th>ID alumno</th>";
            html+="<th>nombre</th>";
            html+="<th>genero</th>";
            html+="<th>edad</th>";
            html+="<th>id_grado</th>";
            html+="<th>editar</th>";
            html+="</tr></thead><tbody>";
            data.data.forEach(function(item,index){
              html+="<tr>";
              html+="<td>"+(index+1)+"</td>";
              html+="<td>"+item.id_alumno+"</td>";
              html+="<td>"+item.nombre+"</td>";
              html+="<td>"+item.genero+"</td>";
              html+="<td>"+item.edad+"</td>";
              html+="<td>"+item.id_grado+"</td>";
              html+="<td><button class='btn btn-primary btn-xs'  onclick='notas("+item.id_activida+")'><i class='far fa-edit'></i></button></td>";
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

                      $("#grados").append("<option value='0'>Seleccione un Grado</option>");
                      data.data.forEach(function(item,index){
                        $("#grados").append("<option value="+item.id_grado+">"+item.nom_grado+"</option>");
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

      $("#grados").change(function(){
        var grado = $("#grados").val();
        recuperarDatos(grado);
      });






    </script>







</body>

</html>
