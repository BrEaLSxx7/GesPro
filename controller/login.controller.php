<?php
require_once '../model/login.model.php';
require_once '../view/json.php';
// $password = crypt($_GET['password'], password_hash($_GET['password'], 1));
$data = array($_GET['email'], $_GET['password']);
$login = new LoginController();
$login->dateempty($data);
$salidaJson = array('respuesta' => $login->mensajeOk, 'mensaje' => $login->mensajeError, 'resultado'=>$login->result);

$response = new Response($salidaJson);

echo $response->response();
// $login->mensajeError;