<?php
session_start();
if (!isset($_SESSION['usuario_n']))header('location:../index.php');
  //inicio

    require_once '../conexion/conexion.php';
    echo $cod_profe5 = $_GET['cod_profe4'];
    echo "<- profe.";
    echo $id_mate2 = $_GET['id_ma2'];
    echo "<- id mate.";    
    echo $id_curso4 = $_GET['id_cur3'];
    echo "<- id curso.";    
    
    $sql_e = "
    SELECT e.codigo_estudiante, e.apellido1, e.apellido2, e.nombre1, e.nombre2, e.id_curso, x.id_profe_materia, 
    c.nombre_curso, p.codigo_profesor, m.id_materia
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
            JOIN estudiantes e
            on e.id_curso = c.id_curso
            WHERE e.id_curso = ".$id_curso4." and p.codigo_profesor = ".$cod_profe5." and m.id_materia = ".$id_mate2."
        ORDER BY e.apellido1 ASC;
    ";
   
    //crea la variable sql con el comando sql a utilizar
    $result_e=mysqli_query(db_conexion::db_conectar(),$sql_e);
       
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
        <form action="../controladores/usuarios_c.php" method="POST" class="form_registro">
    <br>
    <a href="registro_curso.php">Registrar Curso</a>
    <h3>lista de cursos </h3>

    <table class="striped responsive-table centered ">
        <thead>
          <tr>
              <th>Codigo Estudiante</th>
              <th>Primer Apellido</th>
              <th>Segundo Apellido</th>
              <th>Primer Nombre</th>
              <th>Segundo Nombre</th>
              <th>Nota</th>
          
          </tr>
        </thead>

        <tbody>
        <?php
        $f=0;
        $dato="";
        while ($datos_e = mysqli_fetch_array($result_e)) {
                $f=$f+1;
                $dato="n".$f;
				//ingresa codigo html automaticamente usando el while e imprimiendo el array de cada dato result o conexion con la base
				echo "
				<tr>
	<!-- esto es comentario asigna cada dato de la tabla-->
                    <td>{$datos_e['codigo_estudiante']}</td>
                    <td>{$datos_e['apellido1']}</td>
					<td>{$datos_e['apellido2']}</td>
					<td>{$datos_e['nombre1']}</td>
					<td>{$datos_e['nombre2']}</td>
                ";
                //coge los datos del usuario y se los reenvia a este mismo archivo con la variable accion = 2 para 
				//que llenar los campos automaticamente de la tabla editar
				//despues envia lo mismo pero para el caso de eliminar
            //'../controladores/usuarios_c.php?accion=4&ide={$datos['id_usuario']}'
            
            /******** Este es un codifo borrado de cajon de texto******* 
            fue reeemplazado por el input de type number
            <td>
            <textarea id='' name='falla' cols='1' rows='5' 
            placeholder='Digite falla'></textarea>
            </td>
            ****************************************************/
            echo "
            <td>
                      
               <textarea id='' name= $dato cols='1' rows='5' 
               placeholder='Digite nota'></textarea>
            </td>

            </tr>
            ";
            }
              ?>
                
                
    </tbody>
      </table>

      <br>
      <br>
      <br>
		<div class="row">
			<div class="col s3 push-s5">
				<a class="waves-effect waves-light btn">
					<i class="material-icons left"></i>
						<input type="submit" value="Registrar Notas" name="s1" >
				</a>
			</div>
		</div>
				
            <input type="hidden" name="accion" value="10">
			<input type="hidden" name="id_ma3" value="<?php echo $id_mate2; ?>">				
			<input type="hidden" name="id_cur5" value="<?php echo $id_curso4; ?>">				
			<input type="hidden" name="cod_pro6" value="<?php echo $cod_profe5; ?>">				
            				
	</form>
		<article class="article_registro">
			
			<a class="waves-effect waves-light btn-small #e57373 red lighten-2" href="materias.php" title="" id="btn_reg_registro">
				<i class="material-icons left"></i>Atras</a>
			</a>	
			<a class="waves-effect waves-light btn-small #e57373 red lighten-2" href="inicio.php" title="" id="btn_reg_registro">
				<i class="material-icons left"></i>Menu</a>
			</a>			
        </article>   
        <br>
        <br>
        <br>

</body>
</html>
