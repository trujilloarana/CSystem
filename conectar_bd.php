<?php
/*
$host= 'localhost';
$basedatos= 'usuarios';
$usuario= 'root';
$contrasena= '';

try {
$conectar = new PDO('mysql:host='.$host.';dbname='.$basedatos, $usuario, $contrasena);
print "Conexión exitosa desde PDO!";
}
catch (PDOException $econexion) {
print "¡Error al conectar!: " . $econexion->getMessage() . "";
die();
}
$conectar =null;
*/

$mysqli= new mysqli('localhost','root','','usuarios');

if(mysqli_connect_errno()){
  echo 'Conexion Fallida : ',mysqli_connect_error();
  exit();
}
?>
