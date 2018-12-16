<?php

require_once __dir__ . "/../modelo/getDatos.php";
class controlador {
    public static $rutaAPP = "/proyec_lourdes/";

    public function goSession(){
      if (!isset($_SESSION)) {
          session_start();

      }if (isset($_SESSION["id_usr"])) {
        return true;
      }
      return false;
    }

    public function cerrar_sesion() {
		if (!isset($_SESSION)) {
			session_start();
		}
		session_destroy();
		$this->login();
	}

    public function index() {
        include_once __dir__ . "/../template/index.php";
    }


    public function login() {
        include_once __dir__ . "/../template/login.php";
    }

    public function validar() {
        include_once __dir__ . "/../template/php/validarlogin.php";
    }

    public function main() {
        include_once __dir__ . "/../template/main.php";
    }

    public function usuarios() {
        include_once __dir__ . "/../template/usuarios.php";
    }
    public function getUser() {
        include_once __dir__ . "/../template/php/get_user.php";
    }
    public function notas() {
        include_once __dir__ . "/../template/notas.php";
    }
    public function responsable() {
        include_once __dir__ . "/../template/responsable.php";
    }
    public function alumno() {
        include_once __dir__ . "/../template/alumno.php";
    }
    public function matricula() {
        include_once __dir__ . "/../template/matricula.php";
    }
    public function cerrar() {
        include_once __dir__ . "/../template/cerrar.php";
    }
    public function actividades() {
        include_once __dir__ . "/../template/actividades.php";
    }
    public function grados() {
        include_once __dir__ . "/../template/grados.php";
    }
    public function getalumno() {
        include_once __dir__ . "/../template/get_alum.php";
    }
    public function getrespon() {
        include_once __dir__ . "/../template/get_respon.php";
    }
    public function getmatricula() {
        include_once __dir__ . "/../template/get_matricula.php";
    }
    public function admin() {
        include_once __dir__ . "/../template/admin.php";
    }
    public function docentes() {
        include_once __dir__ . "/../template/docentes.php";
    }
}
