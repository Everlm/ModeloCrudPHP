<?php 
	require 'database.php';
	$id = null;
	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}
	
	if ( null==$id ) {
		header("Location: index.php");
	} else {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM datos_de_contacto where identificacion = $id";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		Database::disconnect();
	}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <link   href="css/banner.css" rel="stylesheet">
    <link href="css/menu.css" rel="stylesheet">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
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
                <li><a class="menu" href="desarrollador.php">Desarrollado por</a></li>
               <div class="marca"></div>
             </ul>
            </div>
            
		<div id="banner"></div>
    <div class="container">
    
    			<div class="span10 offset1">
    				<div class="row">
		    			<h3>Leer Contactos</h3>
		    		</div>
                    
		    		<div class="form-horizontal">
					    <label class="control-label">Tipo de Documento</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['id_documento'];?>
						    </label>
					    </div>
					</div>
                   
                   <div class="form-horizontal">
					    <label class="control-label">Identificación</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['identificacion'];?>
						    </label>
					    </div>
                   </div>
                   
                   <div class="form-horizontal" >
					  
					    <label class="control-label">Nnombre</label>
					    <div class="controls">
						    <label class="checkbox">
						     	<?php echo $data['nombre'];?>
						    </label>
					    </div>
				   </div>
                   
                   <div class="form-horizontal">
					    <label class="control-label">Fecha de Nacimiento</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['fecha_nacimiento'];?>
						    </label>
					    </div>
				   </div>
                   
                   <div class="form-horizontal">
					    <label class="control-label">Tipo de Sangre</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['tipo_sangre'];?>
						    </label>
					    </div>
                    </div>
                   
                    <div class="form-horizontal">
					    <label class="control-label">Clave de Acceso</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['clave_acceso'];?>
						    </label>
					    </div>
                     </div>
                     
                     <div class="form-horizontal">
					    <label class="control-label">Navegador</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['id_navegador'];?>
						    </label>
					    </div>
                     </div>
                     
                      <div class="form-horizontal">
					    <label class="control-label">Rango de Conocimiento</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['rango_conocimiento'];?>
						    </label>
					    </div>
                   </div>
                   
                   <div class="form-horizontal">
					    <label class="control-label">Ciudad</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['id_ciudad'];?>
						    </label>
					    </div>
					  </div>
                   
					 <div class="form-actions">
						  <a class="btn" href="index.php">Volver</a>
					 </div>
					

					</div>
				</div>
				
    </div> <!-- /container -->
    <div id="pie_pagina">
    	<p>created by: Moon - Copyright © Todos los Derechos Reservados</p>
    </div>
  </body>
</html>