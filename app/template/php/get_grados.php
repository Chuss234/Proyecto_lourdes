<?php
require(__dir__."../../../modelo/getDatos.php");

$mvcDatos = new GetDatos();
switch ($_POST['op']) {

case '1':

    $grado=$_POST['grado'];
    $resultalum = $mvcDatos->consultaGen("SELECT a.id_alumno,CONCAT(a.nombres,' ',a.apellidos) as nombre,a.genero,(YEAR(now())-YEAR(a.fecha_nac)) as edad,b.id_grado from alumno a INNER JOIN matriculas b USING(id_alumno) WHERE id_grado='{$grado}' ORDER BY a.nombres,a.apellidos ");
    $info= array('success' => true,'data' => $resultalum );

    echo json_encode($info);
      break;

case '2':

    $grado=$_POST['grado'];
    $resultalum = $mvcDatos->consultaGen("SELECT a.id_alumno,CONCAT(a.nombres,' ',a.apellidos) as nombre,a.genero,(YEAR(now())-YEAR(a.fecha_nac)) as edad,b.id_grado from alumno a INNER JOIN matriculas b USING(id_alumno) WHERE id_grado='{$grado}' ORDER BY a.nombres,a.apellidos ");
    $info= array('success' => true,'data' => $resultalum );

    echo json_encode($info);
      break;
default:
  break;

}


?>
