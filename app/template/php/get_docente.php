<?php
require(__dir__."../../../modelo/getDatos.php");

$mvcDatos = new GetDatos();
switch ($_POST['op']) {
case '1':

    $result = $mvcDatos->consultaGen("SELECT a.`cod_docente`, a.`nombres`,a.`apellidos`, a.`especialidad`, a.`nit`, a.`dui`,a.id_departamento,b.departamento, a.`municipio`, a.`direccion` FROM `docentes` a INNER JOIN departamento b USING(id_departamento)");
    $info= array('success' => true,'data' => $result );

    echo json_encode($info);
      break;
case '2':
  $mvcDatos->borrar("delete from docentes where cod_docente ='{$_POST['id']}'");
  echo 1;
  break;
case '3':
  if (isset($_POST['editar']) && $_POST['editar']==1) {
    $mvcDatos->actualizar("update docentes set cod_docente='{$_POST['COD']}',id_departamento='{$_POST['departamento']}',direccion='{$_POST['direccion']}',dui='{$_POST['dui']}',especialidad='{$_POST['especialidad']}',municipio='{$_POST['municipio']}',nit='{$_POST['nit']}',nombres='{$_POST['nombres']}',apellidos='{$_POST['apellidos']}' where cod_docente='{$_POST['COD']}'");
      echo 1;
    }else {
      $mvcDatos->insertar("insert into docentes set cod_docente='{$_POST['COD']}',id_departamento='{$_POST['departamento']}',direccion='{$_POST['direccion']}',dui='{$_POST['dui']}',especialidad='{$_POST['especialidad']}',municipio='{$_POST['municipio']}',nit='{$_POST['nit']}',nombres='{$_POST['nombres']}',apellidos='{$_POST['apellidos']}'");
        echo 1;
    }
    break;
case '4':
        $result = $mvcDatos->consultaGen("SELECT a.`cod_docente`, a.`nombres`,a.`apellidos`, a.`especialidad`, a.`nit`, a.`dui`,a.id_departamento,b.departamento, a.`municipio`, a.`direccion` FROM `docentes` a INNER JOIN departamento b USING(id_departamento) where cod_docente='{$_POST['id']}'");
        $info= array('success' => true,'data' => $result );

        echo json_encode($info);
        break;
default:

  break;

}


?>
