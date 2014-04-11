<?php
// apache activo (si hace falta cambiar config puerto al 8080 en httpd)
// C:\xampp\htdocs\254\
// C:\Usuarios\user\.android\adb_usb.ini  <-  0x1F3A

$server = "localhost";
$user = "root";
$pass = "";

// realizo la conexion a la BD
$db = mysql_connect($server, $user, $pass);
mysql_select_db("usuarios");

$usuario = $_POST['usuario'];
$pass = $_POST['pass'];

$sql = "SELECT COUNT(*) FROM usuario WHERE nombre = '$usuario' AND pass='$pass'";

$result = mysql_query($sql);
if($result === FALSE) {
    die(mysql_error()); // TODO: better error handling
}$fila = mysql_fetch_array($result);

$resultado;

if ($fila[0]==0) {
$resultado[0] = array("logstatus"=>"0");
}else {
$resultado[0] = array("logstatus"=>"1");
}

echo json_encode($resultado);
?>