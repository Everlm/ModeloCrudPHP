<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <link href="css/banner.css" rel="stylesheet">
    <link href="css/menu.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Nunito' rel='stylesheet' type='text/css'>
    <script src="js/bootstrap.min.js"></script>
    <title>Aplicación CRUD</title>
</head>
 
<body>
			
            
            <div class="menudes">
              <ul>
                <li><a class="menu" href="index.php">Inicio</a></li>
                <li><a class="menu" href="crear.php">Registrar Contacto</a></li>
                <li><a class="menu" href="gestion.php">Gestion de Datos</a></li>
                <li><a class="menu" href="">Desarrollador</a></li>
               <div class="marca"></div>
             </ul>
            </div>    		
            
            <div id="banner"></div>
   
    <div class="contacto">

            <div class="row">
                <!--<h3>APLICACIÓN CRUD</h3>-->
            </div>
			
            <div class="row">
                 <p>
                  <a href="crear.php" class="btn btn-success">Registrar Contacto</a>
                </p>
                <table class="table table-striped table-bordered">
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Identificacion</th>
                      <th>Nombre</th>
                      <th>Fecha Nacimiento</th>
                      <th>Tipo Sangre</th>
                      <th>Clave Acceso</th>
                      <th>Navegador</th>
                      <th>Rango Conocimiento</th>
                      <th>Ciudad</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   include 'database.php';  
				   $pdo = Database::connect();
                   $sql = 'SELECT * FROM datos_de_contacto ORDER BY identificacion DESC';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['identificacion'] . '</td>';
                            echo '<td>'. $row['nombre'] . '</td>';
                            echo '<td>'. $row['fecha_nacimiento'] . '</td>';
							echo '<td>'. $row['tipo_sangre'] . '</td>';
							echo '<td>'. $row['clave_acceso'] . '</td>';
							echo '<td>'. $row['id_navegador'] . '</td>';
							echo '<td>'. $row['rango_conocimiento'] . '</td>';
							echo '<td>'. $row['id_ciudad'] . '</td>';
                            echo '<td width=250>';
                            echo '<a class="btn" href="leer.php?id='.$row['identificacion'].'">Leer</a>';
                            echo ' ';
                            echo '<a class="btn btn-success" name="identificacion"  value="identificacion" 
							 		href="modificar.php?id='.$row['identificacion'].'">Modificar</a>';
                            echo ' ';
                            echo '<a class="btn btn-danger" href="delete.php?id='.$row['identificacion'].'">Eliminar</a>';
                            echo '</td>';
                            echo '</tr>';
                   }
                   Database::disconnect();
                  ?>
                  </tbody>
            </table>
        </div>
    </div> <!-- /container -->
    <div id="pie_pagina">
    	<p>created by: Moon - Copyright © Todos los Derechos Reservados</p>
    </div>
  </body>
</html>
