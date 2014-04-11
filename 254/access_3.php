<?php

$server = "localhost";
$user = "root";
$pass = "";

// realizo la conexion a la BD
$db = mysql_connect($server, $user, $pass);
mysql_select_db("usuarios");

$usuario = $_POST['usuario'];
$pass = $_POST['pass'];

//$sql = "SELECT nombre, correo FROM usuario WHERE nombre = '$usuario' AND pass='$pass'";
$sql = "SELECT nombre, correo FROM usuario";

$result = mysql_query($sql);
//$fila = mysql_fetch_array($result);

$resultado = array();
while($row = mysql_fetch_assoc($result)) {
	//$resultado[] = array("logstatus"=>"1", "row"=>$row);
	$resultado[] =$row;
}
// tendré que mirar el número de resultados
//if (mysql_num_rows($result)>0) {
//	$resultado[0]=array("logstatus"=>"1", "correo"=>$fila['correo']);	
//} else {
//	$resultado[0]=array("logstatus"=>"0");
//}

header('Content-type: application/json');
echo json_encode($resultado);

?>