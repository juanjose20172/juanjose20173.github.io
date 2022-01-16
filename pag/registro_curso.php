<?php
session_start();
if (!isset($_SESSION['usuario_n']))header('location:../index.php');
	require_once '../conexion/conexion.php';
//	echo "nombre: ".$_SESSION['usuario_n'];

$sql_pr = "select p.codigo_profesor, p.nombre1, p.nombre2, p.apellido1, p.apellido2, d.id_director_grupo
from directores d
join profesores p
on d.codigo_profesor = p.codigo_profesor;";
$result_pr=mysqli_query(db_conexion::db_conectar(),$sql_pr);

$sql_per = "select id_periodo from periodos where habil = 1";
$result_per=mysqli_query(db_conexion::db_conectar(),$sql_per);
$datos_per = mysqli_fetch_array($result_per);
//echo $datos_per;
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
	<title>Registro Cursos</title>
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
	<form action="../controladores/usuarios_c.php" method="POST" class="form_registro">
	<!-- todo es enviado a esa direccion con la variable accion que esta bajo
	se crea el formulario para llenar datos y poder enviarlos -->
	
	<!-- inicio titulo-->

	<div class="row">
		<div class="col s8 push-s3">
			<h1 id="h1_index">Registro Cursos</h1>
		</div>
	</div>
	<!-- termina titulo -->

	<!-- inicia toda la tabla -->
	<div class="row">
      <div class="col s4 push-s4">

	<table id="mitabla" class="table center-align col-s2">
		<! con un *tr pasamos de renglon hacia abajo en la tabla
		*con un td pasamos un cuadro hacia la derecha en ña table->
			<thead>
			<! *este es el encabezado de la tabla->
				<tr>
					<th id="log_index">Ingrese los datos</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><input type="text" name="nombre_curso" id=""
					placeholder="ingrese nombre del curso" required>
					</td>
				</tr>
				<tr>
					<td><input type="number" name="numero_curso" id=""
					placeholder="ingrese numero del curso ejemplo 96" required>
					</td>
				</tr>
				<tr>
					<td>Seleccione la jornada del curso
						<p>
						<label>
							<input name="jornada" type="radio" value="1" />
							<span>Mañana</span>
						</label>
						</p>
						<p>
						<label>
							<input name="jornada" type="radio" value="3" />
							<span>Tarde</span>
						</label>
						</p>
						<p>
						<label>
							<input name="jornada" type="radio" value="4" />
							<span>Noche</span>
						</label>
						</p>
					</td>
				</tr>
				<tr>
					<td>Seleccione director de grupo
				<?php while ($datos_pr = mysqli_fetch_array($result_pr)) {
					$nombre1=$datos_pr['nombre1'];
					$nombre2=$datos_pr['nombre2'];
					$apellido1=$datos_pr['apellido1'];
					$apellido2=$datos_pr['apellido2'];
					$codigo_profe=$datos_pr['codigo_profesor'];
					$datos=$codigo_profe." ".$nombre1." ".$nombre2." ".$apellido1." ".$apellido2;
				//ingresa codigo html automaticamente usando el while e imprimiendo el array de cada dato result o conexion con la base
				echo "
	<! esto es comentario asigna cada dato de la tabla->
						<p>
						<label>
							<input name='director' type='radio' value='{$datos_pr['id_director_grupo']}' />
							<span>$datos</span>
						</label>
						</p>
				";
			
				//coge los datos del usuario y se los reenvia a este mismo archivo con la variable accion = 2 para 
				//que llenar los campos automaticamente de la tabla editar
				//despues envia lo mismo pero para el caso de eliminar
			}
			?>
			</td>
		</tr>
			</tbody>
		</table>
		<br>
		<div class="row">
			<div class="col s3 push-s4">
				<a class="waves-effect waves-light btn">
					<i class="material-icons left"></i>
						<input type="submit" value="Registrar Curso" name="s1" >
				</a>
			</div>
		</div>
				
			<input type="hidden" name="accion" value="6">		
			<?php
			//	echo "
			//		echo <input type='hidden' name='periodo' value='{$datos_per['id_periodo']}'>			
			//	";
			?>	
					
	</form>
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