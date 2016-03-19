<?php
$conn = mysql_connect("localhost","root","") or 
	die("Erro en la conexión base de datos");
mysql_select_db("contacto") or die("Error seleccionar base de datos");
?>