<?php 
	require 'database.php';
	$id = 0;
	
	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}
	
	if ( !empty($_POST)) {
		// keep track post values
		$id = $_POST['id'];
		
		// delete data
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "DELETE FROM datos_de_contacto  WHERE identificacion = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		Database::disconnect();
		header("Location: index.php");
		
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
		    			<h3>Eliminar Contacto</h3>
		    		</div>
		    		
	    			<form class="form-horizontal" action="eliminar.php" method="post">
	    			  <input type="hidden" name="id" value="<?php echo $id;?>"/>
					  <p class="alert alert-error">¿Está seguro que desea eliminar este contacto?</p>
					  <div class="form-actions">
						  <button type="submit" class="btn btn-danger">Si</button>
						  <a class="btn" href="index.php">No</a>
						</div>
					</form>
				</div>
				
    </div> <!-- /container -->
    <div id="pie_pagina">
    	<p>created by: Moon - Copyright © Todos los Derechos Reservados</p>
    </div>
  </body>
</html>