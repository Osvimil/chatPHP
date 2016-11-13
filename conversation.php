<?php
$db = "chat";
$server = "localhost";
$password = "";
$usuario = "root";

$conexion = @mysqli_connect($server,$usuario,$password,$db);

if(!$conexion){
	die ("error".mysqli_connect_error());
}

$sql = "SELECT usuario,mensaje FROM mensajines order by id asc;";
$resultado = mysqli_query($conexion,$sql);

while($data = mysqli_fetch_assoc($resultado)){
	echo "<p> <b>".$data["usuario"]. "</b> dice: ".$data["mensaje"]."</p>";

}

?>