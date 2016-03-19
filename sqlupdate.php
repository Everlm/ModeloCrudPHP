<?php
	session_start(); 
	$id = $_SESSION["id"];
	$tipo = $_POST["tipo_doc"];
	$id = $_POST["identificacion"];
	$nombre = $_POST["nombre"];
	$fecha_nac = $_POST["fecha_nacimiento"];
	$tipo_sangre = $_POST ["tipo_sangre"];
	$clave = $_POST["clave_acceso"];
	$navegador = $_POST["navegador"];
	$rango = $_POST["rango_conocimiento"];
	$ciudad = $_POST["ciudad"];

	$query = "UPDATE datos_de_contacto  set id_documento='$tipo', identificacion='$id', nombre='$nombre', fecha_nacimiento='$fecha_nac', tipo_sangre='$tipo_sangre', clave_acceso='$clave', id_navegador='$navegador', rango_conocimiento='$rango', id_ciudad='$ciudad' WHERE identificacion = $id";
	include("conexion.php");
	$result = mysql_query($query) or die("Error SQL U ".mysql_error());
	mysql_close();
	header("Location: index.php");
	
	echo "<br>Registro Guardado";
	echo "<a href='index.php'><br>atras</a>";
?>