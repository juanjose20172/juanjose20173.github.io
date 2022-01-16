<?php
session_start();
if (!isset($_SESSION['usuario_n']))header('location:../index.php');
	require_once '../conexion/conexion.php';
	$sql="select id_departamento, nombre from departamentos";
	$result= mysqli_query(db_conexion::db_conectar(),$sql);
//	echo "nombre: ".$_SESSION['usuario_n'];
$sql_ma = "select id_materia, nombre_materia
from materias;";
//en casos de querer desabilitar materias se puede crear un nuevo campo "habil" en la tabla materias y se cambia el sql con un where habil = 1 
$result_ma=mysqli_query(db_conexion::db_conectar(),$sql_ma);
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
	<title>Registro</title>
	<! titulo de la pagina->
</head>

<script>
	function cargar(dep){
		//vaciar los campos
		if (dep=="") {
			document.getElementById("car_ciu").innerHTML="";
			return;
		}
		//cargar las ciudades en pantalla
		if (window.XMLHttpRequest) {
			  //code for IE7+, fIREFOX, cHROME, oPERA, sAFARI
			  xmlhttp=new XMLHttpRequest();
		}
		else{//code for ie6, ie5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		//tiempo para refrescar
		xmlhttp.onreadystatechange=function(){
			if (this.readyState==4 && this.status==200){
				document.getElementById("car_ciu").innerHTML=this.responseText;
			}
		}
		xmlhttp.open("GET","../controladores/cargar_ciu.php?id_dep="+dep,true);
		xmlhttp.send();
	}
</script>
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
			<h1 id="h1_index">Registro de Usuarios</h1>
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
					<th id="log_index">Registro</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<!* se crea cajon para nombre
					*type es opcion ej texto o contraseña
					* name es como va a ser asignado internamente para enviarse la informacion a otra pagina
					*id se usa para el css o script
					*placeholder es el texto visible en la pagina
					*required significa campo obligatorio requerido->

					<td><input type="text" name="cedula" id=""
					placeholder="ingrese su codigo" required>
					</td>
				</tr>
				<tr>
					<td><input type="text" name="nombre1" id=""
					placeholder="ingrese primer nombre" required>
					</td>
				</tr>
				<tr>
					<td><input type="text" name="nombre2" id=""
					placeholder="ingrese segundo nombre" required>
					</td>
				</tr>
				<tr>
					<td><input type="text" name="apellido1" id=""
					placeholder="ingrese su primer apellido" required>
					</td>
				</tr>
				<tr>
					<td><input type="text" name="apellido2" id=""
					placeholder="ingrese su segundo apellido" required>
					</td>
				</tr>
				<!-- empieza generar materias-->
				<tr>
					<td>Seleccione las materias asignadas al profesor
				<?php
					$var=0; 
					$mat = "m";
					while ($datos_ma = mysqli_fetch_array($result_ma)) {
					$var = $var+1;
					$comp = $mat.$var;
					$nombre_mat=$datos_ma['nombre_materia'];
		
				//ingresa codigo html automaticamente usando el while e imprimiendo el array de cada dato result o conexion con la base
				echo "
	<! esto es comentario asigna cada dato de la tabla->
						<p>
						<label>
							<input name= $comp type='checkbox' value='{$datos_ma['id_materia']}' />
							<span>$nombre_mat</span>
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
				<!-- termina materias-->
				<tr id="clave_registro">
					<td>
						<input type="password" name="contra" id="" placeholder="ingrese su clave" required>
					</td>
				</tr>
				<tr>
					<td>
						<input type="password" name="contra2" id="" placeholder="confirme su clave" required>
					</td>
				</tr>
			</tbody>
		</table>
		<br>
		<div class="row">
			<div class="col s3 push-s4">
				<a class="waves-effect waves-light btn">
					<i class="material-icons left"></i>
						<input type="submit" value="Registrar" name="s1" >
				</a>
			</div>
		</div>
				
			<input type="hidden" name="accion" value="1">				
	</form>
		<article class="article_registro">
			
			<a class="waves-effect waves-light btn-small #e57373 red lighten-2" href="inicio.php" title="" id="btn_reg_registro">
				<i class="material-icons left"></i>Regresar</a>
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