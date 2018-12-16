<?php
require(__dir__."../../../modelo/getDatos.php");

$mvcDatos = new GetDatos();

switch ($_POST["op"]) {
  case '1':
    $resultado = $mvcDatos->consultaGen("select *,if(tipo=1,'Administrador','Usuario')as tipo2 from usuarios");
    $info= array('success' => true,'data' => $resultado );

    echo json_encode($info);

    break;
    case '2':
            $grado=$_POST['grado'];

            if (!isset($_POST['alumno'])) {
              $periodo=$_POST['periodos'];
              $asignatura=$_POST['asignatura'];
              $resultado = $mvcDatos->consultaGen("SELECT f.id_alumno,CONCAT(f.nombres,' ',f.apellidos) as Alumno ,alumno.asignatura,CONCAT(alumno.nombres,' ',alumno.apellidos) as Profesor,SUM(alumno.porcentaje*alumno.nota) as ponderacion,alumno.id_grado,alumno.id_periodo,alumno.tipo_periodo
              FROM alumno f
              INNER JOIN
              (SELECT materia.id_alumno,e.asignatura,materia.nombres,materia.apellidos,materia.porcentaje,materia.nota,materia.id_grado,materia.id_periodo,materia.tipo_periodo
              FROM asignaturas e
              INNER join
              (SELECT docente.id_alumno,docente.id_asignatura,d.nombres,d.apellidos,docente.porcentaje,docente.nota,docente.id_grado,docente.id_periodo,docente.tipo_periodo
              FROM docentes d
              INNER JOIN
              (SELECT c.id_alumno,c.id_asignatura,c.cod_docente,actividad.porcentaje,c.nota,actividad.id_grado,actividad.id_periodo,actividad.tipo_periodo
              FROM calificaciones c
              INNER JOIN
              (SELECT a.id_actividad,a.porcentaje,a.descripcion,a.id_grado,b.id_periodo,b.tipo_periodo
              FROM actividades a
              INNER JOIN periodos b USING(id_periodo))
              as actividad USING (id_actividad))
              as docente USING(cod_docente))
              as materia  USING(id_asignatura))
              as alumno USING (id_alumno) where id_grado='{$grado}'and id_periodo='{$periodo}' and asignatura='{$asignatura}' GROUP BY alumno");

              $info= array('success' => true,'data' => $resultado );
              echo json_encode($info);

            }else{
              $alumno=$_POST['alumno'];
              $periodo=$_POST['periodo'];
              $asignatura=$_POST['asignatura'];

              $result = $mvcDatos->consultaGen("select f.id_alumno,CONCAT(f.nombres,' ',f.apellidos) as Alumno ,alumno.id_nota,alumno.asignatura,CONCAT(alumno.nombres,' ',alumno.apellidos) as Profesor,alumno.id_actividad,alumno.descripcion,alumno.porcentaje,alumno.nota,ROUND((alumno.porcentaje*alumno.nota),2) as ponderacion,alumno.id_grado,alumno.id_periodo,alumno.tipo_periodo
                          FROM alumno f
                          INNER JOIN
                          (SELECT materia.id_nota,materia.id_alumno,e.asignatura,materia.nombres,materia.apellidos,materia.id_actividad,materia.descripcion,materia.porcentaje,materia.nota,materia.id_grado,materia.id_periodo,materia.tipo_periodo
                          FROM asignaturas e
                          INNER join
                          (SELECT docente.id_nota,docente.id_alumno,docente.id_asignatura,d.nombres,d.apellidos,docente.id_actividad,docente.descripcion,docente.porcentaje,docente.nota,docente.id_grado,docente.id_periodo,docente.tipo_periodo
                          FROM docentes d
                          INNER JOIN
                          (SELECT c.id_nota,c.id_alumno,c.id_asignatura,c.cod_docente,actividad.id_actividad,actividad.descripcion,actividad.porcentaje,c.nota,actividad.id_grado,actividad.id_periodo,actividad.tipo_periodo
                          FROM calificaciones c
                          INNER JOIN
                          (SELECT a.id_actividad,a.porcentaje,a.descripcion,a.id_grado,b.id_periodo,b.tipo_periodo
                          FROM actividades a
                          INNER JOIN periodos b USING(id_periodo))
                          as actividad USING (id_actividad))
                          as docente USING(cod_docente))
                          as materia  USING(id_asignatura))
                          as alumno USING (id_alumno)  WHERE id_alumno='{$alumno}' and id_periodo='{$periodo}' and asignatura='{$asignatura}'");
                $inf= array('success' => true,'data' => $result );
                echo json_encode($inf);
            }


    break;
    case '4':
      if(isset($_POST['nombre']) and $_POST['nombre']!="" ){
        $nombres=$_POST['nombre'];
        $apellidos=$_POST['apellidos'];
        $parentesco=$_POST['parentesco'];
        $dui=$_POST['dui'];
        $telefono=$_POST['telefono'];
        $correo=$_POST['correo'];
        $trabajo=$_POST['laboral'];

          $mvcDatos->insertar("insert into responsables set nombres='{$nombres}',apellidos='{$apellidos}',parentesco='{$parentesco}',dui_responsable='{$dui}',telefono='{$telefono}',correo='{$correo}',trabajo_res='{$trabajo}'");

          echo 1;
      }else {
        echo 2;
      }
      break;
    case '5':
        if(isset($_POST['id_alum']) and $_POST['id_alum']!="" ){
          $id_alum=$_POST['id_alum'];
          $nombres=$_POST['nombre'];
          $apellidos=$_POST['apellido'];
          $genero=$_POST['genero'];
          $fecha=$_POST['fecha'];
          $dui=$_POST['dui'];
          $departamento=$_POST['departamento'];
          $municipio=$_POST['municipio'];
          $direccion=$_POST['direccion'];


            $mvcDatos->insertar("insert into alumno set id_alumno='{$id_alum}',nombres='{$nombres}',apellidos='{$apellidos}',genero='{$genero}',fecha_nac='{$fecha}',dui_responsable='{$dui}',id_departamento='{$departamento}',municipio='{$municipio}',direccion='{$direccion}'");

            echo 1;
        }else {
          echo 2;
        }
        break;
        case '6':
            if(isset($_POST['id_alum']) and $_POST['id_alum']!="" ){
              $id_alum=$_POST['id_alum'];
              $grado=$_POST['grado'];
              $turno=$_POST['turno'];

                $resultado = $mvcDatos->consultaGen("SELECT * FROM matriculas");

                if (count($resultado)>0) {
                  if ($resultado[0]['id_alumno']!=$id_alum=$_POST['id_alum']) {
                          $mvcDatos->insertar("insert into matriculas set id_alumno='{$id_alum}',id_grado='{$grado}',fecha_matr=now(),turno='{$turno}',id_usr='1'");
                          echo 1;
                        }else {
                          echo 3;
                        }
                    }else {
                    $mvcDatos->insertar("insert into matriculas set id_alumno='{$id_alum}',id_grado='{$grado}',fecha_matr=now(),turno='{$turno}',id_usr='1'");
                    echo 1;
                  }
                }else {
                    echo 2;
                  }
            break;

            case '7':
                switch ($_POST['responsable']) {
                  case '1':
                  $resultado = $mvcDatos->consultaGen("SELECT dui_responsable,nombres,apellidos,parentesco,telefono,trabajo_res FROM responsables");

                    $info= array('success' => true,'data' => $resultado );
                    echo json_encode($info);
                    break;
                  case '2':
                  $resultado = $mvcDatos->consultaGen("SELECT id_alumno,nombres,apellidos,genero,fecha_nac,dui_responsable,direccion FROM alumno ");

                    $info= array('success' => true,'data' => $resultado );
                    echo json_encode($info);
                    break;




                  default:

                    break;
                }
            break;


  default:
    // code...
    break;
}
 ?>
