<?php
require_once '../model/conection.php';

class LoginController extends Conexion
{
	public $mensajeError = "El sistema no se encuentra disponible";
	public $mensajeOk = false;
	public $result;
	private function validate($data)
	{
		$conexion = $this->Conexion();
		$stm = $conexion->prepare("SELECT usuario,contrasena,nombre,rol_id FROM usuario WHERE usuario = :usuario AND contrasena = :contrasena");
		$stm->execute(array(':usuario' => $data[0], ':contrasena' => $data[1]));
		$resultado = $stm->fetchAll();
		return $resultado;
	}

	public function dateempty($data)
	{
		if ($data[0] != '' && $data[1] != '') {
			$resultado = $this->validate($data);
			if (count($resultado) > 0) {
				$this->result= array('usuario' => $resultado->usuario, 'nombre' => $resultado->nombre, 'rol_id' => $resultado->rol_id);
				$this->mensajeOk = true;
				session_start();
				$this->mensajeError = 'Logueado Correctamente';
			}
			else {
				$this->mensajeError = 'Email y/o Contraseña incorrectos';
			}
		}
		else {
			$this->mensajeError = 'Todos los campos son requeridos';
		}
	}
}