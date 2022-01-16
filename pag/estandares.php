<?php
session_start();
if (!isset($_SESSION['usuario_n']))header('location:../index.php');
	require_once '../conexion/conexion.php';
//	echo "nombre: ".$_SESSION['usuario_n'];

require_once '../conexion/conexion.php';
$sql_a = "select numero_anio from anios where habil = 1";
$result_a=mysqli_query(db_conexion::db_conectar(),$sql_a);
 
$sql_j = "select j.nombre_jornada,  p.nombre1, p.apellido1
from jornadas j
join coordinadores co
on co.id_coordinador = j.id_coordinador
join profesores p
on p.codigo_profesor = co.codigo_profesor;";
$result_j=mysqli_query(db_conexion::db_conectar(),$sql_j);

$sql_p = "select nombre_periodo from periodos where habil = 1";
$result_p=mysqli_query(db_conexion::db_conectar(),$sql_p);

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

					<th>Año</th>
					<th>Accion</th>
				</tr>
			</thead>
			<tbody>
			<?php while ($datos_a = mysqli_fetch_array($result_a)) {
				//ingresa codigo html automaticamente usando el while e imprimiendo el array de cada dato result o conexion con la base
				echo "
				<tr>
	<! esto es comentario asigna cada dato de la tabla->
					<td>{$datos_a['numero_anio']}</td>
                    <td><a href='?' title='editar'>Cambiar</a></td>
				";
			
				//coge los datos del usuario y se los reenvia a este mismo archivo con la variable accion = 2 para 
				//que llenar los campos automaticamente de la tabla editar
				//despues envia lo mismo pero para el caso de eliminar
            }
			?>
            </tbody>
        </table>
        <!-- inicia tabla jornadas -->
        <br>
        <br>

        <table>
			<thead>
				<tr>
	<! se crean los campos de cada tabla->

					<th>Jornada</th>
					<th>Nombre Coordinador</th>
					<th>Apellido Coordinador</th>
				</tr>
			</thead>
			<tbody>
			<?php while ($datos_j = mysqli_fetch_array($result_j)) {
				//ingresa codigo html automaticamente usando el while e imprimiendo el array de cada dato result o conexion con la base
				echo "
				<tr>
	<! esto es comentario asigna cada dato de la tabla->
					<td>{$datos_j['nombre_jornada']}</td>
					<td>{$datos_j['nombre1']}</td>
					<td>{$datos_j['apellido1']}</td>
                    <td><a href='?' title='editar'>Cambiar</a></td>
				";
			
				//coge los datos del usuario y se los reenvia a este mismo archivo con la variable accion = 2 para 
				//que llenar los campos automaticamente de la tabla editar
				//despues envia lo mismo pero para el caso de eliminar
            }
			?>
        </table>
        <!-- termina tabla jornadas -->
        <br>
        <br>
        <!-- inicia tabla periodos -->
        <table>
			<thead>
				<tr>
	<! se crean los campos de cada tabla->

					<th>Periodo habilitado</th>
					<th>Accion</th>
				</tr>
			</thead>
			<tbody>
			<?php while ($datos_p = mysqli_fetch_array($result_p)) {
				//ingresa codigo html automaticamente usando el while e imprimiendo el array de cada dato result o conexion con la base
				echo "
				<tr>
	<! esto es comentario asigna cada dato de la tabla->
					<td>{$datos_p['nombre_periodo']}</td>
                    <td><a href='?' title='editar'>Cambiar</a></td>
				";
			
				//coge los datos del usuario y se los reenvia a este mismo archivo con la variable accion = 2 para 
				//que llenar los campos automaticamente de la tabla editar
				//despues envia lo mismo pero para el caso de eliminar
            }
			?>
			</tbody>
        </table>
        <!-- termina tabla periodos -->
        </tbody>

	</center>
    <br>
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
<br>
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