<!DOCTYPE html>
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
	
		
	<form name="datos" id="datos" action="guardar.php" method="POST">
			<fieldset>
            <legend>Registrar Contacto</legend>
            <?php 
			include("conexion.php");
			// Envía la consulta a Mysql:
				$sql = mysql_query("select id_documento, tipo_documento from tipo_de_documento order by id_documento");
				
				// Verifica que te llegaron datos de respuesta:
				if (mysql_num_rows($sql) > 0)
				{
				  // Recoge los datos recibidos. 
				  // Puedes mostrarlos o guardarlos en un arreglo para posterior uso...
				
				  // Yo he elegido mostrarlos directamente en el select:
				  echo"Tipo de Documento <select name='tipo_doc'>\n";
				  
				  // Aquí recorres los datos recibidos:
				  while ($temp = mysql_fetch_array($sql))
				  {
					print" <option value='".$temp["id_documento"]."'>".$temp["tipo_documento"]."</option>\n";
				  }
				
				  echo"  </select>\n";
				}
				else
				{  echo"No hay datos";  }
				
				// Cierras la consulta
				mysql_free_result($sql);
			?>
            
			<p>Numero de Identificación
				<input type="text" name="identificacion" required>
			</p>
			<p>Nombre
				<input type="text" name="nombre" required>
			</p>
			<p>Fecha de Nacimiento
				<input type="date" name="fecha_nacimiento" required>
			</p>
			<p>Tipo de Sangre
				<input type="text" name="tipo_sangre" pattern="[+/-]{1}[A-Za-z]{1}">
			</p>
			<P>Clave de Acceso
				<input type="password" name="clave_acceso" >
			</P>
			<!--<P>Navegador
				<input type="text" list="navegador" name="navegador" >
				<datalist id="navegador">
					<option id="navegador" label="Chroome" value="1"></option>
					<option id="navegador" label="Mozilla" value="2"></option>
					<option id="navegador" label="Safari" value="3"></option>
					<option id="navegador" label="Internet Explorer" value="4"></option>
				</datalist>
			</P>-->
            
            <?php 
			include("conexion.php");
			// Envía la consulta a Mysql:
				$sql = mysql_query("select id_navegador, navegador from navegador_favorito order by id_navegador");
				
				// Verifica que te llegaron datos de respuesta:
				if (mysql_num_rows($sql) > 0)
				{
				  // Recoge los datos recibidos. 
				  // Puedes mostrarlos o guardarlos en un arreglo para posterior uso...
				
				  // Yo he elegido mostrarlos directamente en el select:
				  echo"Navegador <select name='navegador'>\n";
				  
				  // Aquí recorres los datos recibidos:
				  while ($temp = mysql_fetch_array($sql))
				  {
					print" <option value='".$temp["id_navegador"]."'>".$temp["navegador"]."</option>\n";
				  }
				
				  echo"  </select>\n";
				}
				else
				{  echo"No hay datos";  }
				
				// Cierras la consulta
				mysql_free_result($sql);
			?>
            
			<P>Rango de Conocimiento en Ingles
				<input type="range" id="rango" value="0" min="0" max="100" name="rango_conocimiento" >
                <span id="rang">0</span> <br>
			</P>
			
            
            <!--<p>Ciudad
				<select id="ciudad" name="ciudad" >
					<option>1</option>
					<option>2</option>
				</select>
			</p>-->
            
            <?php 
			include("conexion.php");
			// Envía la consulta a Mysql:
				$sql = mysql_query("select id_ciudad, ciudad from ciudad order by id_ciudad");
				
				// Verifica que te llegaron datos de respuesta:
				if (mysql_num_rows($sql) > 0)
				{
				  // Recoge los datos recibidos. 
				  // Puedes mostrarlos o guardarlos en un arreglo para posterior uso...
				
				  // Yo he elegido mostrarlos directamente en el select:
				  echo"Ciudad <select name='ciudad'>\n";
				  
				  // Aquí recorres los datos recibidos:
				  while ($temp = mysql_fetch_array($sql))
				  {
					print" <option value='".$temp["id_ciudad"]."'>".$temp["ciudad"]."</option>\n";
				  }
				
				  echo"  </select>\n";
				}
				else
				{  echo"No hay datos";  }
				
				// Cierras la consulta
				mysql_free_result($sql);
			?>
			
			
			
			<br /><br /><input type="submit" name="guardar" value="Guardar" />
            </fieldset>
		</form>
	<p> 
	</p>
    <div id="pie_pagina">
    	<p>created by: Moon - Copyright © Todos los Derechos Reservados</p>
    </div>
</body>
</html>