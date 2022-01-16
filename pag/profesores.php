<?php
session_start();
if (!isset($_SESSION['usuario_n']))header('location:../index.php');

if ($_GET['accion']==2) {  //inicio
	//si la variable es igual a 1 lista los usuarios con sus datos
	//variable enviada desde inicio.php con valor accion = 1
	require_once '../conexion/conexion.php';
	$sql = "select id_curso, nombre_curso, numero_curso, id_jornada, id_director from cursos";
	//crea la variable sql con el comando sql a utilizar
	$result=mysqli_query(db_conexion::db_conectar(),$sql);
	//se conecta con la clase conexion y la funcion conectar del
	//archivo conexion/conexion.php
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

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
				<li><a href="../index.php" title="">Cerrar Sesión</a></li>
				<li><a href="inicio.php" title="">Menu Principal</a></li>			
			<!--	<li><a href="pag/registro.php" title="">Registro</a></li> quitamos esta linea porque solo pueden registrar los coordinadores-->
			</ul>
        </nav>
        
<!--
        <table>
		<caption><h3>Cursos<h3></caption>
		<thead>
			<tr>
				<th>Seleccione la opción que quiera a cada curso</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>
                    <a href="?">Listar Cursos</a>
                </td>
            </tr>
            <tr>
				<td>
                <a href="registro_curso.php">Registrar Cursos</a>                    
                </td>
            </tr>
            <tr>
				<td>
                <a href="?">Editar Curso</a>                    
                </td>
            </tr>
            <tr>
				<td>
                <a href="?">Eliminar Curso</a>                    
                </td>
            </tr>
		</tbody>
    </table>
-->
    <br>
    <a href="registro_curso.php">Registrar Curso</a>
    <h3>lista de cursos </h3>
    <table class="striped responsive-table centered ">
        <thead>
          <tr>
              <th>Nombre Curso</th>
              <th>Numero Curso</th>
              <th>Jornada</th>
              <th>Acción</th>
          </tr>
        </thead>

        <tbody>
        <?php while ($datos = mysqli_fetch_array($result)) {
				//ingresa codigo html automaticamente usando el while e imprimiendo el array de cada dato result o conexion con la base
				echo "
				<tr>
	<!-- esto es comentario asigna cada dato de la tabla-->
					<td>{$datos['nombre_curso']}</td>
					<td>{$datos['numero_curso']}</td>
                ";
                switch ($datos['id_jornada']) {
					//obtiene el rol de cada usuario para imprimirlo en la tabla en pantalla
					case 1:
						echo "<td>Mañana</td>";
						break;
					case 3:
						echo "<td>Tarde</td>";
                        break;					
					default:
						echo "<td>Noche</td>";
						break;
                }
                //coge los datos del usuario y se los reenvia a este mismo archivo con la variable accion = 2 para 
				//que llenar los campos automaticamente de la tabla editar
				//despues envia lo mismo pero para el caso de eliminar
            //'../controladores/usuarios_c.php?accion=4&ide={$datos['id_usuario']}'
            echo "
            <td>
            <a href='cursos.php?accion=2&id_cur={$datos['id_curso']}'>
            <span>agrega materia</span>
            </a>
            &nbsp; | &nbsp;
            <a href='' title='eliminar'>
            <span>inhabilitar
            </span>
            </a>
            </td>
            </tr>
            ";
            }
                ?>
        </tbody>
      </table>
</body>
</html>

<?php
}
if ($_GET['accion']==1) {
    require_once '../conexion/conexion.php';
    //paquete  para ingreso de datos
    $codigo_profe3 = $_GET['codigo_profe2'];
    $sql_m2 = "
    SELECT m.id_materia, m.nombre_materia, c.id_curso ,c.nombre_curso, p.codigo_profesor, p.nombre1, p.apellido1, 
            x.id_profe_materia, x.id_materia, x.codigo_profesor ,f.id_materia_curso,
            f.id_materia, f.id_curso ,g.id_profe_materia_curso, g.id_profe_materia, g.id_materia_curso
            FROM profesores p
            JOIN profe_materia x
            ON p.codigo_profesor = x.codigo_profesor
            join materias m
            ON m.id_materia = x.id_materia
            JOIN materia_curso f
            ON f.id_materia = m.id_materia
            JOIN cursos c
            on c.id_curso = f.id_curso
            JOIN profe_mate_curso g
            ON g.id_materia_curso = f.id_materia_curso
            WHERE p.codigo_profesor = ".$codigo_profe3."
            ORDER BY m.nombre_materia ASC;
    ";
	$result_m2=mysqli_query(db_conexion::db_conectar(),$sql_m2);
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
    <br>
    <h4>Para ingresar las notas seleccione la materia y curso</h4>    
        <!-- inicia seccion de lista -->
        <table class="striped responsive-table centered ">
        <thead>
          <tr>
              <th>Nombre Profesor</th>
              <th>Apellido Profesor</th>
              <th>Nombre Materia</th>
              <th>Nombre Curso</th>
              <th>Accion</th>
              
          </tr>
        </thead>

        <tbody>
        <?php while ($datos_m2 = mysqli_fetch_array($result_m2)) {
            //ingresa codigo html automaticamente usando el while e imprimiendo el array de cada dato result o conexion con la base
            echo "
            <tr>
<!-- esto es comentario asigna cada dato de la tabla-->
                <td>{$datos_m2['nombre1']}</td>
                <td>{$datos_m2['apellido1']}</td>
                <td>{$datos_m2['nombre_materia']}</td>
                <td>{$datos_m2['nombre_curso']}</td>
            ";
         
            //coge los datos del usuario y se los reenvia a este mismo archivo con la variable accion = 2 para 
            //que llenar los campos automaticamente de la tabla editar
            //despues envia lo mismo pero para el caso de eliminar
        //'../controladores/usuarios_c.php?accion=4&ide={$datos['id_usuario']}'
        echo "
        <td>
        <a href='ingreso_notas.php?id_cur3={$datos_m2['id_curso']}&id_ma2={$datos_m2['id_materia']}&cod_profe4={$codigo_profe3}'>
       <!-- esto es copia de la información  -->
        <span>Ingresar Notas</span>
        </a>
        &nbsp;  &nbsp;
        </td>
        </tr>
        ";
        }
            ?>
        <!-- termina seccion de lista -->
		
		<?php if ($_GET['rolv']==1 || $_SESSION['rol_v']==1){
            //obtiene el rol para saber que opciones mostrarle al usuaio
        }
		?>

<?php
}  //editando la opcion 3
  if ($_GET['accion']==3) {
    require_once '../conexion/conexion.php';
    //paquete  para ingreso de datos
    $sql_p = "select codigo_profesor, nombre1, nombre2, apellido1, apellido2 from profesores";
	$result_p=mysqli_query(db_conexion::db_conectar(),$sql_p);
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
    <br>
    <h4>Para ingresar las notas seleccione la materia y curso</h4>    
        <!-- inicia seccion de lista -->
        <table class="striped responsive-table centered ">
        <thead>
          <tr>
            <th>Codigo</th>
            <th>Nombre 1</th>
            <th>Nombre 2</th>
            <th>Apellido 1</th>
            <th>Apellido 2</th>
              
          </tr>
        </thead>

        <tbody>
        <?php while ($datos_p = mysqli_fetch_array($result_p)) {
            //ingresa codigo html automaticamente usando el while e imprimiendo el array de cada dato result o conexion con la base
            echo "
            <tr>
<!-- esto es comentario asigna cada dato de la tabla-->
                <td>{$datos_p['codigo_profesor']}</td>
                <td>{$datos_p['nombre1']}</td>
                <td>{$datos_p['nombre2']}</td>
                <td>{$datos_p['apellido1']}</td>
                <td>{$datos_p['apellido2']}</td>
            ";
         
            //coge los datos del usuario y se los reenvia a este mismo archivo con la variable accion = 2 para 
            //que llenar los campos automaticamente de la tabla editar
            //despues envia lo mismo pero para el caso de eliminar
        //'../controladores/usuarios_c.php?accion=4&ide={$datos['id_usuario']}'
        echo "
        <td>
       <!-- copia de la informacion <a href='ingreso_notas.php'> -->
       <!-- esto es copia de la información <a href='ingreso_notas.php?accion=10&id_mat={$id_materia3}&id_cur2={$id_curso3}&id_co_pro={$datos_p['codigo_profesor']}&id_pro_ma={$datos_p['id_profe_materia']}'> -->
       <a href='profesores.php?accion=1&codigo_profe2={$datos_p['codigo_profesor']}' title='Registrar'>
       
       <span>Ingresar Notas</span>
        </a>
        &nbsp;  &nbsp;
        </td>
        </tr>
        ";
        }
        ?>

        <!-- build:js main.js build/scripts -->
        <script src="../node_modules/jquery/dist/jquery.min.js"></script>
        <script src="../node_modules/materialize-css/dist/js/materialize.min.js"></script>  
        <script src="main.js"></script>
        <!-- endbuild -->
        </body>
        </html>
         
        <?php
        }
        ?>