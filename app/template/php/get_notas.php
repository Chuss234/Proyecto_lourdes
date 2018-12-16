<?php

require(__dir__."../../../modelo/getDatos.php");

$mvcDatos = new GetDatos();
switch ($_POST['op']) {
  case '1':
  if ($_POST['nota']>=0 && $_POST['nota']<=10) {
    $resultcali = $mvcDatos->consultaGen("SELECT COUNT(a.id_actividad) as totalcali from calificaciones a INNER join actividades b USING (id_actividad) where b.id_grado='{$_POST['gra']}' and b.id_periodo='{$_POST['sec']}' and a.id_alumno='{$_POST['alumno']}'and a.id_asignatura='{$_POST['asignatura']}' ");
    $resultacti = $mvcDatos->consultaGen("SELECT COUNT(id_actividad) as totalacti from actividades where id_grado='{$_POST['gra']}' and id_periodo='{$_POST['sec']}'");
    if($resultcali[0]["totalcali"]<$resultacti[0]["totalacti"]){

      $resultidacti = $mvcDatos->consultaGen("select a.id_actividad as id_actividad from calificaciones a INNER join actividades b USING (id_actividad) where b.id_grado='{$_POST['gra']}' and b.id_periodo='{$_POST['sec']}' and a.id_alumno='{$_POST['alumno']}' and a.id_asignatura='{$_POST['asignatura']}'");

      $i=0;
      $j=0;
        while ($i<COUNT($resultidacti)) {
          if ($resultidacti[$i]['id_actividad']!=$_POST['actividad']) {
            $i++;
                  }else {
                    $j++;
                      if ($j==1) {
                      echo "3";
                      break;
                    }

                }
        }
        if ($j==0) {
          $mvcDatos->insertar("insert into calificaciones set id_alumno='{$_POST['alumno']}',id_asignatura='{$_POST['asignatura']}',cod_docente='{$_POST['docente']}',id_actividad='{$_POST['actividad']}',nota='{$_POST['nota']}'");
          echo 1;
        break;
      }


  }else {

    echo 2;
  }
}else {
  echo "error al ingresar la nota";
}
    break;
case '2':
  if(isset($_POST['id'])){
    $mvcDatos->borrar("delete from calificaciones WHERE Id_nota = '{$_POST['id']}'");
      echo 1;
  }else{
    echo 2;
  }
  break;
case '3':
  $id=$_POST['id'];
  $resultacti = $mvcDatos->consultaGen("select * from actividades where id_actividad='{$id}'");
  $info= array('success' => true,'data' => $resultacti );
  echo json_encode($info);

  break;
  case '4':
    $id=$_POST['id'];
    $resultacti = $mvcDatos->borrar("delete from actividades where id_actividad='{$id}'");
    echo 1;
    break;
  default:

    break;
}

 ?>
