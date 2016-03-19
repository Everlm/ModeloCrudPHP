<!DOCTYPE html>
<?php //session_start(); ?>
<html>
<head>
	<meta charset=utf-8 />
    <link href="css/banner.css" rel="stylesheet">
    <link href="css/menu.css" rel="stylesheet">
    
    <title>Aplicación CRUD</title>
    
    <!--Le ponemos el valor a la etiqueta range ------------------> 
    <script>
	addEventListener('load',inicio,false);
	function inicio() {
		document.getElementById('rango').addEventListener('change',cambioRango,false);
	}
	
	function cambioRango() {
		document.getElementById('rang').innerHTML=document.getElementById('rango').value;
	} </script>
    <!-------------------->
</head>
<body>

<section>

			<div class="menudes">
              <ul>
                <li><a class="menu" href="index.php">Inicio</a></li>
                <li><a class="menu" href="crear.php">Registrar Contacto</a></li>
                <li><a class="menu" href="gestion.php">Gestion de Datos</a></li>
                <li><a class="menu" href="desarrollador.php">Desarrollado por</a></li>
               <div class="marca"></div>
             </ul>
            </div>

	<div id="banner"></div>

<form method="post" action="sqlupdate.php">
<fieldset>
            <legend>Actualizar Contacto</legend>	
<?php
	
	$id = null;
	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}
	
	if ( null==$id ) {
		header("Location: index.php");
	}
	
	//$_SESSION["id"] = $id; 
	//include 'conexion.php';
	//----------------------------------------------------------------
	include 'database.php';  
	$pdo = Database::connect();
	//----------------------------------------------------------------

	$sql = "SELECT * FROM datos_de_contacto where identificacion = $id";
	//echo $query.'<br />';
	
	foreach ($pdo->query($sql) as $row) {
		
		echo "  id documento <input type='text' name='tipo_doc'  value='".$row["id_documento"]."'/>	</br></br>";
		//----------------------------------------------------------------
		
		//----------------------------------------------------------------
		echo "  numero identificacion <input type='text' name='identificacion' value='".$row["identificacion"]."'/>	</br></br>";
		echo "  nombre <input type='text' name='nombre' value='".$row["nombre"]."'/>	</br></br>";
		echo "  Fecha Nacimiento <input type='date' name='fecha_nacimiento' value='".$row["fecha_nacimiento"]."'/>	</br></br>";
		echo "  Tipo Sangre <input type='text' name='tipo_sangre' pattern='[+/-]{1}[A-Za-z]{1}'' value='".$row["tipo_sangre"]."'/>	</br></br>";
		echo "  clave acceso <input type='password' name='clave_acceso' value='".$row["clave_acceso"]."'/></br></br>";
		echo "  id navegador <input type='text' name='navegador' value='".$row["id_navegador"]."'/>	</br></br>";
		echo "  Nivel Ingles <input type='range' id='rango' name='rango_conocimiento' min='0' max='100' value='".$row["rango_conocimiento"]."'/>";
		echo '<span id="rang">0</span> </br></br>';
		echo "  id ciudad <input type='text' name='ciudad' value='".$row["id_ciudad"]."' </br></br>";
		
		echo "<p><br><input type='submit' name='guardar' value='Guardar' /></p>";
	}
	mysql_close();
?>
        </fieldset>
        </form>
</section>
		<div id="pie_pagina">
    		<p>created by: Moon - Copyright © Todos los Derechos Reservados</p>
    	</div>
</body>
</html>