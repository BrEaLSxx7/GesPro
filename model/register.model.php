<?php
require_once '../model/conection.php';

class Dashboardcontroller extends Conexion
{
	public $rol_id;
	private function conectrol($perfil)
	{
		$conexion = $this->Conexion();
		$stm = $conexion->prepare("SELECT id, nombre FROM rol WHERE nombre = :perfil");
		$stm->execute(array(':perfil' => $perfil));
		$resultado = $stm->fetchAll();
		return $resultado;
	}
	private function agregarusuario($data){
		$conexion = $this->Conexion();
		$stm = $conexion->prepare("SELECT usuario FROM usuario WHERE usuario = :correo");
		$stm->execute(array(':correo' => $data[5]));
		$resultado = $stm->fetchAll();
		return $resultado;
	}
	public function validaterol($perfil)
	{
		$result = $this->conectrol($perfil);
		$this->rol_id = $result[0]->id;
	}
	public function ingresarusuario($data)
	{
		$resultado=$this->agregarusuario($data);
	}
}