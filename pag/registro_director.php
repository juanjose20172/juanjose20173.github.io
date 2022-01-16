<?php
session_start();
if (!isset($_SESSION['usuario_n']))header('location:../index.php');
	require_once '../conexion/conexion.php';
//	echo "nombre: ".$_SESSION['usuario_n'];

require_once '../conexion/conexion.php';
$sql = "select codigo_profesor, nombre1, nombre2, apellido1, apellido2 from profesores";
$result=mysqli_query(db_conexion::db_conectar(),$sql);
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	<link rel="stylesheet" href="../css/css.css">

	
	<!-- build:css css/css.css build/css-->
     <link rel="stylesheet" href="../node_modules/materialize-css/dist/css/materialize.min.css">
    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>

    <!-- endbuild -->   
        <!-- importamos el css-->
	<title>Registro Coordinadores</title>
	<! titulo de la pagina->
</head>


</head>
<body>
<nav>
			<ul>
				<li><a href="../index.php" title="">Inicio</a></li>
				<li><a href="?" title="">Registro</a></li>
			</ul>
		</nav>
<section class="section_index" id="section_registro">
	<div class="div_h1" id="div_h1_registro">
		
	</div>
    <center>
		<table>
			<thead>
				<tr>
	<! se crean los campos de cada tabla->

					<th>Codigo</th>
					<th>Nombre 1</th>
					<th>Nombre 2</th>
					<th>Apellido 1</th>
					<th>Apellido 2</th>
				</tr>
			</thead>
			<tbody>
			<?php while ($datos = mysqli_fetch_array($result)) {
				//ingresa codigo html automaticamente usando el while e imprimiendo el array de cada dato result o conexion con la base
				echo "
				<tr>
	<! esto es comentario asigna cada dato de la tabla->
					<td>{$datos['codigo_profesor']}</td>
					<td>{$datos['nombre1']}</td>
					<td>{$datos['nombre2']}</td>
					<td>{$datos['apellido1']}</td>
					<td>{$datos['apellido2']}</td>
				";
			
				//coge los datos del usuario y se los reenvia a este mismo archivo con la variable accion = 2 para 
				//que llenar los campos automaticamente de la tabla editar
				//despues envia lo mismo pero para el caso de eliminar
			echo "
				<td>
				<a href='../controladores/usuarios_c.php?accion=8&codigo_profe={$datos['codigo_profesor']}' title='Registrar'>
				<span>Asignar</span>
				</a>
				</td>
				</tr>
				";
			}
			?>
			</tbody>
		</table>
	</center>
    
		<article class="article_registro">
			
			<a class="waves-effect waves-light btn-small #e57373 red lighten-2" href="materias.php" title="" id="btn_reg_registro">
				<i class="material-icons left"></i>Atras</a>
			</a>	
			<a class="waves-effect waves-light btn-small #e57373 red lighten-2" href="inicio.php" title="" id="btn_reg_registro">
				<i class="material-icons left"></i>Menu</a>
			</a>			
		</article>

	</div>
</div>
<!-- termina toda la tabla -->

</Section>	

<!-- inicio div prueba-->


<!-- fin div prueba -->



  <!-- build:js main.js build/scripts -->
<!--  <script src="../node_modules/jquery/dist/jquery.min.js"></script>
<script src="../node_modules/materialize-css/dist/js/materialize.min.js"></script>  
<script src="main.js"></script> -->
<!-- endbuild -->

</body>
</html>