<?php
require(__dir__."../../../modelo/getDatos.php");

$mvcDatos = new GetDatos();
switch ($_POST['op']) {
  case '1':

      $resultado = $mvcDatos->consultaGen("select * from asignaturas");

      $info= array('success' => true,'data' => $resultado );

      echo json_encode($info);

      break;
  case '2':
          if (isset($_POST['grado'])) {
            $grado=$_POST['grado'];
            $periodo=$_POST['periodos'];

          $resultado = $mvcDatos->consultaGen("SELECT a.id_actividad,a.porcentaje,a.descripcion,a.id_grado,b.tipo_periodo FROM actividades a INNER JOIN periodos b USING(id_periodo) WHERE id_grado='{$grado}' and id_periodo='{$periodo}'");

          $info= array('success' => true,'data' => $resultado );

          echo json_encode($info);
        }else {
          echo 'Error';
        }

          break;
    case '3':

          switch ($_POST['fl']) {
            case '1':
            $resultado = $mvcDatos->consultaGen("select * from grado");
            $resultperi = $mvcDatos->consultaGen("select * from periodos");
            $resultasig = $mvcDatos->consultaGen("select * from asignaturas");
            $info= array('success' => true,'data' => $resultado,'dataperi'=>$resultperi,'dataasig'=> $resultasig);

            echo json_encode($info);
              break;
            case '2':
            $periodo=$_POST['periodos'];
            $grado=$_POST['grado'];
            $resultalum = $mvcDatos->consultaGen("SELECT b.id_alumno,a.nombres,a.apellidos,b.id_grado from alumno a INNER JOIN matriculas b USING(id_alumno) WHERE id_grado='{$grado}' ORDER BY a.nombres,a.apellidos");
            $resultasig = $mvcDatos->consultaGen("select * from asignaturas");
            $resultacti = $mvcDatos->consultaGen("select * from actividades where id_periodo='{$periodo}'and id_grado='{$grado}'");
            $resultdoce = $mvcDatos->consultaGen("select * from docentes");
            $info= array('success' => true,'dataalum'=>$resultalum,'dataasig'=>$resultasig,'dataacti'=>$resultacti,'datadoce'=>$resultdoce);

            echo json_encode($info);
              break;
            default:
              // code...
              break;
          }

      break;

      case '4':
      // ingreso de actividad
      $ponderacion= $_POST['ponderacion'];
      $grado=$_POST['grado'];
      $periodo= $_POST['periodo'];
      $descripcion= $_POST['nombre'];

      $resultotal = $mvcDatos->consultaGen("SELECT SUM(porcentaje) as total from actividades WHERE id_grado = '{$grado}' and id_periodo='{$periodo}'");
      if (($ponderacion+$resultotal[0]['total'])>1){
        echo $ponderacion+$resultotal[0]['total'];
        echo 2;

      }else{

          $resultado =$mvcDatos->insertar("insert into actividades (id_actividad,porcentaje,descripcion,id_periodo,id_grado) values (null,'{$ponderacion}','{$descripcion}','{$periodo}','{$grado}')");

          echo 1;
        }


        break;
  default:
    // code...
    break;
}







 ?>
