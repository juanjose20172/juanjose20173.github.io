<?php
session_start();
if (!isset($_SESSION['usuario_n']))header('location:../index.php');

if ($_GET['accion']==1) {  //inicio
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
if($_GET['accion']==2){
//inicia 2 ****************************************
	require_once '../conexion/conexion.php';
	$sql_m = "select id_materia, nombre_materia from materias";
    $result_m=mysqli_query(db_conexion::db_conectar(),$sql_m);
    $curso_a=$_GET['id_cur'];
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
        
    <br>
    <h3>Seleccione la Materia para agregar al curso </h3>
    <table class="striped responsive-table centered ">
        <thead>
          <tr>
              <th>Nombre Materia</th>
          </tr>
        </thead>

        <tbody>
        <?php while ($datos_m = mysqli_fetch_array($result_m)) {
				//ingresa codigo html automaticamente usando el while e imprimiendo el array de cada dato result o conexion con la base
				echo "
				<tr>
	<!-- esto es comentario asigna cada dato de la tabla-->
					<td>{$datos_m['nombre_materia']}</td>
                ";
            echo "
            <td>
            <a href='cursos.php?accion=3&id_mat={$datos_m['id_materia']}&id_cur2={$curso_a}'>
            <span>agregar</span>
            </a>
            &nbsp; | &nbsp;
            <a href='' title='ir atras'>
            <span>******
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
// inicia el 3 ****************
if($_GET['accion']==3){
    //inicia 2 ****************************************
   // echo "entro a la accion 3";
        require_once '../conexion/conexion.php';
        $id_materia3=$_GET['id_mat'];
        $id_curso3=$_GET['id_cur2'];
        $sql_p = "select m.id_profe_materia, m.id_materia, m.codigo_profesor, p.nombre1,p.nombre2, p.apellido1, p.apellido2, m2.nombre_materia
        from profe_materia m
        join profesores p
        on m.codigo_profesor = p.codigo_profesor
        join materias m2
        on m2.id_materia = m.id_materia
        where m.id_materia = '{$id_materia3}';";
        $result_p=mysqli_query(db_conexion::db_conectar(),$sql_p);
        
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
            
        <br>
        <h3>Para finalizar seleccione el profesor que dictara dicha materia </h3>
        <table class="striped responsive-table centered ">
            <thead>
              <tr>
                  <th>Primer nombre</th>
                  <th>Segundo Nombre</th>
                  <th>Primer Apellido</th>
                  <th>Segundo Apellido</th>
                  
              </tr>
            </thead>
    
            <tbody>
            <?php while ($datos_p = mysqli_fetch_array($result_p)) {
               // echo "entro a WHILE 11111111111";
                $dat_nombre = $datos_p['nombre1'];
               // echo "nombre 1= ".$dat_nombre;
                //ingresa codigo html automaticamente usando el while e imprimiendo el array de cada dato result o conexion con la base
                    echo "
                    <tr>
        <!-- esto es comentario asigna cada dato de la tabla-->
                        <td>{$datos_p['nombre1']}</td>
                        <td>{$datos_p['nombre2']}</td>
                        <td>{$datos_p['apellido1']}</td>
                        <td>{$datos_p['apellido2']}</td>
                    ";
                echo "
                <td>
                <a href='../controladores/usuarios_c.php?accion=9&id_mat={$id_materia3}&id_cur2={$id_curso3}&id_co_pro={$datos_p['codigo_profesor']}&id_pro_ma={$datos_p['id_profe_materia']}'>
                <span>agregar</span>
                </a>
                &nbsp; | &nbsp;
                <a href='' title='ir atras'>
                <span>******
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
?>


