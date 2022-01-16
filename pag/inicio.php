<?php 
// en esta pagina solo se le avisa al usuario que ya entro y 
//se le muestra el menu las opciones de penden si es usuario
// o super usuario
session_start();
//en todas las paginas se inicia sesion para poder usar las variables
//de sesion
if (!isset($_SESSION['usuario_n']))header('location:../index.php');
//si no ha iniciado se sesion el if lo envia al index y alli mata 
//todas las sesiones abriertas para que no pueda "vulnerar la pagina"
//echo "nombre: ".$_SESSION['usuario_n'];
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="../css/css.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- build:css css/css.css build/css-->
     <link rel="stylesheet" href="../node_modules/materialize-css/dist/css/materialize.min.css">
    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
    <link rel="stylesheet" href="../css/css.css">
    
    <!-- endbuild -->   
        <!-- importamos el css-->
	<title>Inicio</title>
	<! titulo de la pagina->
</head>
<body>
<nav>
			<ul>
				<li><a href="?" title="">Inicio</a></li>
				<li>hola mundo</li>
			<!--	<li><a href="pag/registro.php" title="">Registro</a></li> quitamos esta linea porque solo pueden registrar los coordinadores-->
			</ul>
		</nav>

	<h3>bienvenido <?php echo $_SESSION['usuario_n']." ".$_SESSION['usuario_a']; ?></h3>
	<! dice bienvenido y le muestra al usuario su nombre->
	<table class="table">
		<thead>
			<tr>
				<th>Menú</th>
			</tr>
		</thead>
		<tbody>
		<tr></tr>
		<?php if ($_GET['rolv']==1 || $_SESSION['rol_v']==1){
			//obtiene el rol para saber que opciones mostrarle al usuaio
		?>
			<tr>
				<td>
					<a href="estandares.php" title="estandares">Estándares</a>
					<! muestra la opcion menu y envia a usuarios.php la variable accion = 1 para mostrar la lista de todos los usuarios->
				</td>
				<td>
					<a href="pdf_usu.php" title="">Generar reporte participantes</a>
				</td>
				<td>
				<a href="profesores.php?accion=3" title="">Notas</a>
			</td>
								<td>
					<a href="cursos.php?accion=1" title="cursos">Cursos</a>
				</td>
				<td>
					<a href="materias.php" title="">Materias</a>
				</td>
								<td>
					<a href="coordinadores.php" title="">Coordinadores</a>
				</td>
								<td>
					<a href="directores.php" title="">Directores</a>
				</td>
				<td>
					<a href="selecciona_registro.php" title="">Registro</a>
				</td>


				<?php 
				} 
				//termina la condicion del if para no mostrar la opcion menu o listar
				?>
				<td>
				<a href="../index.php">cerrar sesion</a>	
				<! muestra la opcion cerrar sesion para todos los usuario->
				</td>
			</tr>
		</tbody>
    </table>
    

        <!-- build:js main.js build/scripts -->
<script src="../node_modules/jquery/dist/jquery.min.js"></script>
<script src="../node_modules/materialize-css/dist/js/materialize.min.js"></script>  
<script src="main.js"></script>
<!-- endbuild -->
</body>
</html>
