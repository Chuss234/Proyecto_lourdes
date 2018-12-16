<?php
include_once(__dir__."/app/controlador/controlador.php");

$mvc=new controlador();

if ($mvc->goSession()) {

	if (isset($_GET["action"]) && $_SESSION["tipo"]!=1) {
		switch ($_GET["action"]) {
			case 'index':
				$mvc->index();
				break;

			case 'responsable':
					$mvc->responsable();
				break;
				case 'alumno':
						$mvc->alumno();
					break;
				case 'matricula':
							$mvc->matricula();
						break;
				case 'notas':
					$mvc->notas();
					break;

				case 'cerrar':
					$mvc->cerrar();
						break;
				case 'actividades':
						$mvc->actividades();
							break;
				case 'grados':
							$mvc->grados();
						break;
				case 'getalumo':
							$mvc->getalumno();

				break;case 'getrespon':
							$mvc->getrespon();
				   		break;
				case 'getmatricula':
							$mvc->getmatricula();
							break;

				default:
						$mvc->index();
					break;

		}
	}

}else {
	if (isset($_GET["action"])) {
			switch ($_GET["action"]) {

				case 'login':
					$mvc->login();
					break;
				case 'validar':
					$mvc->validar();
					break;

					default:
							$mvc->login();
						break;

		}
	}else {
		$mvc->login();

	}
}
if (isset($_GET["action"])) {
if ($_SESSION["tipo"]==1) {
	switch ($_GET["action"]) {
		case 'index':
			$mvc->index();
			break;
		case 'usuario':
			$mvc->usuarios();
			break;
		case 'responsable':
				$mvc->responsable();
			break;
			case 'alumno':
					$mvc->alumno();
				break;
			case 'matricula':
						$mvc->matricula();
					break;
			case 'notas':
				$mvc->notas();
				break;

			case 'cerrar':
				$mvc->cerrar();
					break;
			case 'actividades':
					$mvc->actividades();
						break;
			case 'grados':
						$mvc->grados();
					break;
			case 'getalumo':
						$mvc->getalumno();

			break;case 'getrespon':
						$mvc->getrespon();
						break;
			case 'getmatricula':
						$mvc->getmatricula();
						break;
						case 'usuario':
							$mvc->usuarios();
							break;
		case 'admin':
			$mvc->admin();
			break;
		case 'docentes':
				$mvc->docentes();
				break;
			}
		}
}
