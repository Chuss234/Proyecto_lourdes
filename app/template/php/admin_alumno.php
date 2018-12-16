<?php

require(__dir__."../../../modelo/getDatos.php");

$mvcDatos = new GetDatos();
switch ($_POST['op']) {
  case '1':
  if(isset($_POST['id'])){
    $mvcDatos->borrar("delete from responsables WHERE dui_responsable = '{$_POST['id']}'");
      echo 1;
  }else{
    echo 2;
  }

    break;
  case '2':
      switch ($_POST['select']) {
        case '1':
        $id=$_POST['id'];
        $resultalum = $mvcDatos->consultaGen("select * from alumno where id_alumno='{$id}'");
        $info= array('success' => true,'data' => $resultalum );

        echo json_encode($info);
          break;
        case '2':
        $id=$_POST['id'];
        $resultresp = $mvcDatos->consultaGen("select * from responsables where dui_responsable='{$id}'");
        $info= array('success' => true,'data' => $resultresp );

        echo json_encode($info);

          break;
        default:
          // code...
          break;
      }
      break;
case '3':
    $id=$_POST['id'];
    $id_alum=$_POST['id_alum'];
    $nombres=$_POST['nombre'];
    $apellidos=$_POST['apellido'];
    $genero=$_POST['genero'];
    $fecha=$_POST['fecha'];
    $dui=$_POST['dui'];
    $departamento=$_POST['departamento'];
    $municipio=$_POST['municipio'];
    $direccion=$_POST['direccion'];

    $mvcDatos->actualizar("update alumno set id_alumno='{$id_alum}',nombres='{$nombres}',apellidos='{$apellidos}',genero='{$genero}',fecha_nac='{$fecha}',dui_responsable='{$dui}',id_departamento='{$departamento}',municipio='{$municipio}',direccion='{$direccion}' where id_alumno='{$id}'");
    echo 1;
  break;
case '4':
if(isset($_POST['nombre']) && $_POST['nombre']!="" ){
  $id=$_POST['id'];
  $nombres=$_POST['nombre'];
  $apellidos=$_POST['apellidos'];
  $parentesco=$_POST['parentesco'];
  $dui=$_POST['dui'];
  $telefono=$_POST['telefono'];
  $correo=$_POST['correo'];
  $trabajo=$_POST['laboral'];

    $mvcDatos->insertar("update responsables set nombres='{$nombres}',apellidos='{$apellidos}',parentesco='{$parentesco}',dui_responsable='{$dui}',telefono='{$telefono}',correo='{$correo}',trabajo_res='{$trabajo}' where dui_responsable='{$id}'");

    echo 1;
}else {
  echo 2;
}

  break;
case '5':
if(isset($_POST['id_alum']) and $_POST['id_alum']!="" ){
  $id_alum=$_POST['id_alum'];
  $grado=$_POST['grado'];
  $turno=$_POST['turno'];


    $mvcDatos->insertar("update matriculas set id_alumno='{$id_alum}',id_grado='{$grado}',fecha_matr=now(),turno='{$turno}',id_usr='1' where id_alumno='{$id_alum}'");

    echo 1;
}else {
  echo 2;
}
  break;
  case '6':
  if(isset($_POST['id'])){
    $mvcDatos->borrar("delete from alumno WHERE id_alumno = '{$_POST['id']}'");
      echo 1;
  }else{
    echo 2;
  }

    break;
  default:

    break;
}

 ?>
