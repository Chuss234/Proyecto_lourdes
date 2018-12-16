<?php

$mvcDatos = new GetDatos();
if (isset($_POST["usr"]) && isset($_POST["pass"])) {
    $result = $mvcDatos->consultaGen("Select * from usuarios where usuario='{$_POST['usr']}' and password=md5('{$_POST['pass']}')");
    if (count($result) > 0) {
        if (!isset($_SESSION)) {
            session_start();
        }
        $_SESSION["id_usr"]  = $result[0]["id_usr"];
        $_SESSION["tipo"]    = $result[0]["tipo"];
        $_SESSION["usuario"] = $result[0]["usuario"];
        $_SESSION["nuser"]   = $result[0]["nombres"] . " " . $result[0]["apellidos"];
        if ($result[0]["tipo"] == 1) {
            $info = array('success' => true, 'msg' => "Usuario Correcto", 'link' => controlador::$rutaAPP . "index.php?action=index");
        } else {
            $info = array('success' => true, 'msg' => "Usuario Correcto", 'link' => controlador::$rutaAPP . "index.php?action=index");
        }
    } else {
        $info = array('success' => false, 'msg' => "Usuario o password incorrecto");
    }
} else {
    $info = array('success' => false, 'msg' => "No hay datos para comparar");
}
echo json_encode($info);
