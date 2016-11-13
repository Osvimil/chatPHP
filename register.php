<?php
$db = "chat";
$server = "localhost";
$usuario = "root";
$pass = "";

$conexion = @mysqli_connect($server,$usuario,$pass,$db);
if(!$conexion){
	die("error".mysqli_connect_error());
}
$user = $_POST['user'];
$message = $_POST['message'];

$sql = "INSERT INTO mensajines(usuario,mensaje) VALUES ('$user','$message')";
$resultado = mysqli_query($conexion,$sql);

if($resultado){
	echo "mensaje recibido y registrado";
}

?>