<?php

$server = "localhost";
$user = "root";
$pass = "";

// realizo la conexion a la BD
$db = mysql_connect($server, $user, $pass);
mysql_select_db("usuarios");

$usuario = $_POST['usuario'];
$pass = $_POST['pass'];
//$correo = $_POST['email'];

$sql = "SELECT nombre, correo FROM usuario WHERE nombre = '$usuario' AND pass='$pass'";

$result = mysql_query($sql);
$fila = mysql_fetch_array($result);

$resultado;

// tendré que mirar el número de resultados
if (mysql_num_rows($result)>0) {
	$resultado[0]=array("logstatus"=>"1", "correo"=>$fila['correo']);
} else {
	$resultado[0]=array("logstatus"=>"0");
}

echo json_encode($resultado);

?>