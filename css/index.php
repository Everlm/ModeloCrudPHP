<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Nunito' rel='stylesheet' type='text/css'>
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
            <div class="row">
                <h3>parcial</h3>
            </div>
            <div class="row">
                 <p>
                  <a href="create.php" class="btn btn-success">datos</a>
                </p>
                <table class="table table-striped table-bordered">
                <table class="table table-striped table-bordered">
                  
				  <tr>
					<td>id_contacto</td>
                        <td>
                            <input type="text" name="idcliente" id="idcliente2" size="20" 
                                   onkeypress="return numeros(event)" maxlength="20"/>
                        </td>
						
						<td>id_documento</td>
                        <td>
                            <input type="text" name="idcliente" id="idcliente2" size="20" 
                                   onkeypress="return numeros(event)" maxlength="20"/>
                        </td>
					
                        <td>Identificacion</td>
                        <td>
                            <input type="text" name="idcliente" id="idcliente2" size="20" 
                                   onkeypress="return numeros(event)" maxlength="20"/>
                        </td>
                        <td>Nombre</td>
                        <td>
                            <input type="text" name="nomcliente" id="nomcliente2" size="40" 
                                   maxlength="30"/>
                        </td>
                        <td>fecha de nacimiento</td>
                        <td>
                            <input type="text" name="fecha_naccliente" id="fecha_naccliente2" size="40" 
                                   maxlength="30"/>
                        </td>
                    </tr>
                    <tr>
                        <td>tipo sangre</td>
                        <td>
                            <input type="text" name="tip_sangrecliente" id="tip_sangrecliente2" size="20" 
                                   maxlength="30"/>
                        </td>
						
						<td>clave acceso</td>
                        <td>
                            <input type="text" name="cla_accesocliente" id="cla_accesocliente2" size="20" 
                                   maxlength="30"/>
                        </td>
                        <td>id_navegador</td>
                        <td>
                            <input type="text" name="id_navegadorcliente" id="id_navegadorcliente2" size="40" 
                                   maxlength="30"/>
                        </td>
                        
                    </tr>
                    <tr>
                        <td>rango de conocimiento en ingles</td>
                        <td>
                            <input type="text" name="ran_inglescliente" id="ran_inglescliente2" size="20" 
                                   maxlength="30"/>
                        </td>
                        <td>Ciudad</td>
                        <td>
                            <select name="ciudad" id="ciudad2" style="cursor: pointer;width: 260px;">

                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6" align="center">
                            <input type="button" name="guardar" value="Guardar" style="cursor: pointer; margin-top: 10px;"
                                    onclick="guardarcli()"/>
                            <input type="button" name="cancelar" value="Cancelar" style="cursor: pointer; margin-top: 10px;" 
                                   onclick="cancelar()"/>
                        </td>
                    </tr>
                </tbody>
            </table>
            </div>
        </div>
        
            <br></br>
            <table align="center" >
                <tr><th>Filtrar por departamento o ciudad:</th>
                    <td><input type="text" name="filtro" id="filtro" size="40" 
                               maxlength="30"/></td>
                <td><input type="button" name="buscar" value="Buscar" style="cursor: pointer; margin-top: 10px;" 
                               onclick="filtrar()"/></td>
                </tr>
            </table>
            <br/>
            <table align="center" style="border: solid 1px; width: 98%" rules="all">
				  <thead>
                    <tr>
                     <th>contacto</th>
					<th>documento</th>
                    <th>Identificacion</th>
                    <th>Nombre</th>
                    <th>fecha de nacimento</th>
                    <th>tipo de sangre</th>
                    <th>clave de acceso</th>
                    <th>navegador</th>
                    <th>rango de conocimento en ingles</th>
                    <th>ciudad</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   include 'database.php';
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM customers ORDER BY id DESC';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo "<td>".$row["id_con"]."</td>";
							echo "<td>".$row["id_doc"]."</td>";
                            echo "<td>".$row["id"]."</td>";
                            echo "<td>".$row["nom"]."</td>";
                            echo "<td>".$row["fecha_nac"]."</td>";
                            echo "<td>".$row["tip_sangre"]."</td>";
							echo "<td>".$row["cla_acceso"]."</td>";
							echo "<td>".$row["id_navegador"]."</td>";
							echo "<td>".$row["ran_ingles"]."</td>";
							echo "<td>".$row["ciudad"]."</td>";
                            echo '<td width=250>';
                            echo '<a class="btn" href="read.php?id='.$row['id'].'">Leer</a>';
                            echo ' ';
                            echo '<a class="btn btn-success" href="update.php?id='.$row['id'].'">Modificar</a>';
                            echo ' ';
                            echo '<a class="btn btn-danger" href="delete.php?id='.$row['id'].'">Eliminar</a>';
                            echo '</td>';
                            echo '</tr>';
                   }
                   Database::disconnect();
                  ?>
                  </tbody>
            </table>
        </div>
    </div> <!-- /container -->
  </body>
</html>
