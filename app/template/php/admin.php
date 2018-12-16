<?php

require(__dir__."../../../modelo/getDatos.php");
$mvcDatos = new GetDatos();
switch ($_POST['op']) {
  case '1':
    if ($_POST['seccion']!='') {
      $mvcDatos->insertar("insert into seccion set seccion='{$_POST['seccion']}',descripcion='{$_POST['desc']}'");
        echo 1;
    }else{
      echo 2;
    }
    break;
case '2':
  if ($_POST['grado']!='' && $_POST['idsec']!='') {
    $mvcDatos->insertar("insert into grado set id_grado='{$_POST['idgrado']}',nom_grado='{$_POST['grado']}',descripcion='{$_POST['descripcion']}',id_seccion='{$_POST['idsec']}',cant_max='{$_POST['cant']}'");
      echo 1;
  }else{
    echo 2;
  }
  break;
  case '3':
    if ($_POST['id']!='' && $_POST['asignatura']!='') {
      $mvcDatos->insertar("insert into asignaturas set id_asignatura='{$_POST['id']}',asignatura='{$_POST['asignatura']}'");
        echo 1;
    }else{
      echo 2;
    }
    break;
case '4':
      $resultado = $mvcDatos->consultaGen("select * from seccion");
      $info= array('success' => true,'data' => $resultado );
      echo json_encode($info);
  break;
case '5':

  $resultado = $mvcDatos->consultaGen("SELECT a.id_grado,a.nom_grado,c.seccion,a.descripcion,a.cant_max FROM grado a INNER JOIN seccion c USING(id_seccion)");
  $info= array('success' => true,'data' => $resultado );
  echo json_encode($info);
  break;
  case '6':

    $resultado = $mvcDatos->consultaGen("select * from asignaturas");
    $info= array('success' => true,'data' => $resultado );
    echo json_encode($info);
    break;
case '7':
      if ($_POST['periodo']!='' && $_POST['fechain']!='') {
        $mvcDatos->insertar("insert into periodos set tipo_periodo='{$_POST['periodo']}',fecha_inicio='{$_POST['fechain']}',fecha_fin='{$_POST['fechafin']}'");
          echo 1;
      }else{
        echo 2;
      }
      break;
case '8':

        $resultado = $mvcDatos->consultaGen("select * from periodos");
        $info= array('success' => true,'data' => $resultado );
        echo json_encode($info);
        break;
        case '9':

                $resultado = $mvcDatos->borrar("delete from seccion where id_seccion='{$_POST['id']}'");
                echo 1;
        break;

        case '10':

                $resultado = $mvcDatos->borrar("delete from grado where id_grado='{$_POST['id']}'");
                echo 1;
        break;

        case '11':

                $resultado = $mvcDatos->borrar("delete from asignaturas where id_asignatura='{$_POST['id']}'");
                echo 1;
        break;

        case '12':

                $resultado = $mvcDatos->borrar("delete from periodos where id_periodo='{$_POST['id']}'");
                echo 1;
        break;
  default:
    // code...
    break;
}
?>
