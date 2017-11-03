<?php
require_once '../model/register.model.php';
require_once '../view/json.php';
$perfil = $_POST['perfil'];
$rol = new Dashboardcontroller();
$rol->validaterol($perfil);
$rolid = $rol->rol_id;
$data=array('rolid'=>$rolid,'correo'=>$_POST['correo'],'tipodocumento'=>$_POST['tipodocumento'], 'password'=>$_POST['password'], 'numerodocumento'=>$_POST['numerodocumento'],'nombre'=>$_POST['nombre']);
$rol->ingresarusuario($data);