<?php
include("conexion.php");
$tipo = $_POST["tipo_doc"];
$id = $_POST["identificacion"];
$nombre = $_POST["nombre"];
$fecha_nac = $_POST["fecha_nacimiento"];
$tipo_sangre = $_POST ["tipo_sangre"];
$clave = $_POST["clave_acceso"];
$navegador = $_POST["navegador"];
$rango = $_POST["rango_conocimiento"];
$ciudad = $_POST["ciudad"];

/*echo $_POST['tipo_doc'].'<br />';
echo $_POST['identificacion'].'<br />';
echo $_POST['nombre'].'<br />';
echo $_POST['fecha_nacimiento'].'<br />';
echo $_POST['tipo_sangre'].'<br />';
echo $_POST['clave_acceso'].'<br />';
echo $_POST['navegador'].'<br />';
echo $_POST['rango_conocimiento'].'<br />';
echo $_POST['ciudad'].'<br />';*/

$query = "select identificacion from datos_de_contacto where identificacion=$id;"; // consultar el id ingresado en la BD
$result = mysql_query($query) or die("Error SQL S"); //ejecuto la consulta en result
//echo mysql_num_rows($result);  //numero de filas: 0 si no hay ningun resultado en la consulta
							    // 				   'n' si encontro  registros con ese id	 
if(mysql_num_rows($result) > 0){
echo "<br>El registro se encuentra insertado";
echo "<a href='index.php'><br>atras</a>";
}else{
$query ="insert into datos_de_contacto (id_documento,identificacion,nombre,fecha_nacimiento,tipo_sangre,clave_acceso,id_navegador,rango_conocimiento,id_ciudad) values('$tipo',$id,'$nombre','$fecha_nac','$tipo_sangre','$clave','$navegador','$rango','$ciudad')";
//echo $query;
$result = mysql_query($query) or die ("Error SQL I");
echo "<br>Registro Guardado";
echo "<a href='index.php'><br>atras</a>";

}
mysql_close();

?>