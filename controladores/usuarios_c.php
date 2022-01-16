<?php
//arriba
session_start();
require_once "../conexion/conexion.php";
//requiere la conexion para poder hacer cualquier cambio eliminar
//editar o crear etc

if(!empty($_GET)){
	//recibe las variables ya sea por post o por get para no fallar al recibir
	$accion=$_GET['accion'];
  }
else{
	$accion=$_POST['accion'];
  }

switch ($accion) {
	//realiza las cuatro opciones deacuerdo a la variable POST que 
	//se recibio crear, logear, editar o eliminar
	case '1':
		#guardar
		crear_usu_profe();
		break;
	case '2':
	//echo "entro a case 2";
		//se loguea
		logiar();
		break;
	case '3':
		editar();
		break;
	case '4':
		eliminar();
		break;
	case '5':
		registro_materia();
		break;
	case '6':
		registro_curso();
		break;
	case '7':
		registro_coordinador();
		break;
	case '8':
		registro_director();
		break;
	case '9':
		registro_materia_curso();
		break;
	case '10':
		registro_resultados();
		break;
	default:
		echo "error en usuarios_c.php no se escogió ningún caso en el switch";
		break;
}

function crear_usu_profe(){
	//en esta funcion se ingresan los profesores,
	//y la tabla profesor materia automaticamente
	if ($_POST['contra']==$_POST['contra2']) {
		//verifica la contraseña del form este bien
//echo "m1 = ".$_POST['m1'];
//echo "m2 = ".$_POST['m2'];

		$sql2 = "select codigo_profesor from profesores where codigo_profesor = '{$_POST['cedula']}'";
		//crea el comando sql a enviar
		$query2 = mysqli_query(db_conexion::db_conectar(),$sql2);
		//realiza la consulta a la base con el comando sql
		$registro2 = mysqli_fetch_array($query2);
		//realiza un array con todos los usuario para verificar que
		//no este aun registrado

		if (!$registro2){
				//***********************************************
					//si no hay un usuario igual ahora si creelo
					//se crean esas variables para no complicarse {$_POST''}
					$cla = md5($_POST['contra']);
					//crea un md5 de la clave para "proteger"
					
					$sql = "insert into profesores (codigo_profesor, nombre1, nombre2, apellido1, apellido2, clave, clave_cifrada, rol) values ('{$_POST['cedula']}','{$_POST['nombre1']}', '{$_POST['nombre2']}', '{$_POST['apellido1']}', '{$_POST['apellido2']}', '{$_POST['contra2']}', '$cla', 3)";
					
					if ($query = mysqli_query(db_conexion::db_conectar(),$sql)) {
						echo "se registro el profesor satisfactoriamente ";
						
						$_SESSION['rol_v'] = 1; //por ahora ponemos el numero directo		
							//realiza la consulta
							//crea las variables session que permaneces desde qno se destruya la session
						echo "<a href='../pag/inicio.php?rolv=1'>Regresar Al menu</a>";					
					
						}else {
							echo "error no se pudo ingresar el usuario en la base error error con codigo query 24022020804";
						}

						$sql_ma1 = "select count(*)	from materias;";
						$query_ma1 = mysqli_query(db_conexion::db_conectar(),$sql_ma1);
						$registro_ma1 = mysqli_fetch_array($query_ma1);
						$numero_materias = $registro_ma1[0];
						
						for ($i=1; $i <=$numero_materias ; $i++) {
							$def ="m".$i; 
							//utilizamos isset para comprobar si existe la variable
							//y que no salga error en la pagina
							if (isset($_POST[$def])) {
								$sql_ma = "insert into profe_materia (codigo_profesor, id_materia) values ('{$_POST['cedula']}', '{$_POST[$def]}')";
								$id_materia = ($_POST[$def]); 
								//INGRESA el sql
								if ($query_ma = mysqli_query(db_conexion::db_conectar(),$sql_ma)) {
									//echo "se registro la materia con el profesor satisfactoriamente ";
															
									}else {
										echo "error no se pudo ingresar la materia con id = ".$id_materia." en la base error error con codigo query 24022020810";
									}
							}
													
						}

					
				//***********************************************
			
	}else{
			echo "el usuario ya existe "."<a href='../pag/registro_profesor.php?rolv=1'>intentar con otro codigo</a>";
		}
	
	}else{
		echo "las contraseñas no coinciden "."<a href='../pag/registro.php'>volver a intentar</a>";
		
	}
}

//inicia crear usuario estandar
function crear_usu(){
	if ($_POST['contra']==$_POST['contra2']) {
		//verifica la contraseña del form este bien
echo "m1 = ".$_POST['m1'];
echo "m2 = ".$_POST['m2'];
		$sql = "select codigo_estudiante from estudiantes where codigo_estudiante = '{$_POST['cedula']}'";
		//crea el comando sql a enviar
		$query = mysqli_query(db_conexion::db_conectar(),$sql);
		//realiza la consulta a la base con el comando sql
		$registro = mysqli_fetch_array($query);
		//realiza un array con todos los usuario para verificar que
		//no este aun registrado

		$sql2 = "select codigo_profesor from profesores where codigo_profesor = '{$_POST['cedula']}'";
		//crea el comando sql a enviar
		$query2 = mysqli_query(db_conexion::db_conectar(),$sql2);
		//realiza la consulta a la base con el comando sql
		$registro2 = mysqli_fetch_array($query2);
		//realiza un array con todos los usuario para verificar que
		//no este aun registrado

		if (!$registro & !$registro2){

		if ($_POST['rol']==4) {

				//si no hay un usuario igual ahora si creelo
				//se crean esas variables para no complicarse {$_POST''}
				$cla = md5($_POST['contra']);
				//crea un md5 de la clave para "proteger"
				
				$sql = "insert into estudiantes (codigo_estudiante, nombre1, nombre2, apellido1, apellido2, clave, clave_cifrada, rol) values ('{$_POST['cedula']}','{$_POST['nombre1']}', '{$_POST['nombre2']}', '{$_POST['apellido1']}', '{$_POST['apellido2']}', '{$_POST['contra2']}', '$cla', '{$_POST['rol']}')";
				//INGRESA el sql
				
				if ($query = mysqli_query(db_conexion::db_conectar(),$sql)) {
					echo "se registro el estudiante satisfactoriamente ";
					//$_SESSION['rol_v'] = 1; //por ahora ponemos el numero directo							
					echo "<a href='../pag/inicio.php?rolv=1'>Regresar Al menu</a>";
					
						//realiza la consulta
						//crea las variables session que permaneces desde qno se destruya la session
				
					}else {
						echo "error no se pudo ingresar el usuario en la base";
					}				

		}else {
				//***********************************************
					//si no hay un usuario igual ahora si creelo
					//se crean esas variables para no complicarse {$_POST''}
					$cla = md5($_POST['contra']);
					//crea un md5 de la clave para "proteger"
					
					$sql = "insert into profesores (codigo_profesor, nombre1, nombre2, apellido1, apellido2, clave, clave_cifrada, rol) values ('{$_POST['cedula']}','{$_POST['nombre1']}', '{$_POST['nombre2']}', '{$_POST['apellido1']}', '{$_POST['apellido2']}', '{$_POST['contra2']}', '$cla', '{$_POST['rol']}')";
					//INGRESA el sql
					
					if ($query = mysqli_query(db_conexion::db_conectar(),$sql)) {
						
						if ($_POST['rol']==2){echo "se registro el coordinador satisfactoriamente ";}
						if ($_POST['rol']==3){echo "se registro el profesor satisfactoriamente ";}
						if ($_POST['rol']==5){echo "se registro el Usuario de Personal satisfactoriamente ";}
						
						$_SESSION['rol_v'] = 1; //por ahora ponemos el numero directo		
							//realiza la consulta
							//crea las variables session que permaneces desde qno se destruya la session
						echo "<a href='../pag/inicio.php?rolv=1'>Regresar Al menu</a>";					
					
						}else {
							echo "error no se pudo ingresar el usuario en la base";
						}
				//***********************************************
			}
	}else{
			echo "el usuario ya existe "."<a href='../pag/registro.php?rolv=1'>intentar con otro codigo</a>";
		}
	
	}else{
		echo "las contraseñas no coinciden "."<a href='../pag/registro.php'>volver a intentar</a>";
		
	}
}

//termina crear usuario estandar


function logiar(){
	//echo "entro a logiar";
	$sql = "select nombre1, apellido1, rol, clave_cifrada from profesores where codigo_profesor = '{$_POST['cedula']}' ";
	
	$query = mysqli_query(db_conexion::db_conectar(),$sql);
	$registro = mysqli_fetch_array($query);

	//echo "este es el nombre de registro ".$registro['usuario'];
	//recorre el array a ver si existe el usuario y lo guarda

	if($registro){
		//si existe el usuario verifica la contraseña
		$cla = md5($_POST['contra']);
		if ($cla==$registro['clave_cifrada']) {
			//aqui verifica que la contraseña sea igual
			$_SESSION['usuario_n'] = $registro['nombre1'];			
			$_SESSION['usuario_a'] = $registro['apellido1'];
			$_SESSION['rol_v'] = $registro['rol'];
			echo "entro bien al registro";
			//recoge del formulario el nombre y lo guarda en la variable session para despues mostrarlo
			header("location:../pag/inicio.php?rolv={$registro['rol']}");
			//lo manda a inicio on el rol para mostrar opciones
		}else{
			echo "Profesor: la contraseña es incorrecta";
			echo "<a href='../index.php'>vuelve a intentar</a>";
		}
	}else{
		//esto sirve para detectar si es un estudiante el usuario
		//que intenta ingresar
		$sql2 = "select nombre1, apellido1, rol, clave_cifrada from estudiantes where codigo_estudiante = '{$_POST['cedula']}' ";
		$query2 = mysqli_query(db_conexion::db_conectar(),$sql2);
		$registro2 = mysqli_fetch_array($query2);

		if($registro2){
			//echo "entro a registro 2";
			//si existe el usuario verifica la contraseña
			$cla = md5($_POST['contra']);
			//echo $cla;
			if ($cla==$registro2['clave_cifrada']) {
			//	echo "clave correcta";
				//aqui verifica que la contraseña sea igual
				$_SESSION['usuario_n'] = $registro2['nombre1'];				
				$_SESSION['usuario_a'] = $registro2['apellido1'];
				echo "entro bien al registro";
				//recoge del formulario el nombre y lo guarda en la variable session para despues mostrarlo
				header("location:../pag/inicio.php?rolv={$registro['rol']}");
				//lo manda a inicio on el rol para mostrar opciones
			}
			else{
				echo "Apreciado estudiante: la contraseña es incorrecta";
				echo "<a href='../index.php'>vuelve a intentar</a>";
				//lo manda a index para matar la sesion
			}
		}
	else{
			echo "no estas registrado";
			echo "<a href='../pag/registro.php'>ir al registro</a>";
	}
}
}

function eliminar(){
	$sql = "DELETE from usuarios where id_usuario='{$_GET['ide']}'";
	if ($query = mysqli_query(db_conexion::db_conectar(),$sql)) {
		header("location:../pag/usuarios.php?accion=1");
		//elmina el usuairo y vuelve y lista
	}
}

function editar(){
	//se crean estas variables para no complicarse
	//esta completo en el proyecyo llamado "proyecto"
	$contra = $_POST['contra'];
	$contra2 = $_POST['contra2'];
	if ($contra==$contra2) {
	$ide = $_POST['ide'];
	$cla = md5($contra);
	$usuario = $_POST['nombre'];
	$rol = $_POST['rol'];
	$estado = $_POST['est'];
	$sql = "UPDATE usuarios SET usuario = '$usuario', rol = '$rol', estado = '$estado', clave = '$cla' WHERE id_usuario = '$ide'";
	//realiza el comando sql del update
	if ($query = mysqli_query(db_conexion::db_conectar(),$sql)) {
	header("location:../pag/usuarios.php?accion=1");
	//despues de editar en la bd vuelve y lista
	}

	}else{
		echo "las contraseñas no coinciden, no se ha realizado el cambio";
		//aqui le avisa que las contraseñas estan mal para que elusuario sepa
		echo "<a href='../pag/usuarios.php?accion=1'> vuelve a intentarlo</a>";
	}
}

function registro_materia(){
	$sql = "select id_materia from materias where id_materia = '{$_POST['codigo']}' ";
	
	$query = mysqli_query(db_conexion::db_conectar(),$sql);
	$registro = mysqli_fetch_array($query);


	//crea el comando sql a enviar
	//echo "sql= ".$sql;
	//echo " query= ".$query;
	//realiza la consulta a la base con el comando sql
	//realiza un array con todos los usuario para verificar que
	//no este aun registrado
	//echo "registro: ".$registro;

	if (!$registro){
		$sql = "insert into materias (id_materia, nombre_materia, logro1, social1, 
		cognitivo1, personal1, logro2, social2, cognitivo2, personal2, logro3, social3, 
		cognitivo3, personal3) values ('{$_POST['codigo']}','{$_POST['nombre_materia']}', 
		'{$_POST['logro1']}', '{$_POST['social1']}', '{$_POST['cognitivo1']}', 
		'{$_POST['personal1']}', '{$_POST['logro2']}', '{$_POST['social2']}', '{$_POST['cognitivo2']}', 
		'{$_POST['personal2']}', '{$_POST['logro3']}', '{$_POST['social3']}', '{$_POST['cognitivo3']}', 
		'{$_POST['personal3']}')";
		//INGRESA el sql
		
		if ($query = mysqli_query(db_conexion::db_conectar(),$sql)) {
			echo "se registro la materia satisfactoriamente ";
			//$_SESSION['rol_v'] = 1; //por ahora ponemos el numero directo							
			echo "<a href='../pag/materias.php?rolv=1'>Regresar A Materias</a>";
				//realiza la consulta
				//crea las variables session que permaneces desde qno se destruya la session
		
			}else {
				echo "error no se pudo ingresar la materia en la base error 24022020747";
			}				

		}
		else{
		echo "la materia ya existe "."<a href='../pag/registro_materia.php?rolv=1'>intentar con otro codigo</a>";
	}
}

function registro_curso(){
	$sql = "select numero_curso from cursos where numero_curso = '{$_POST['numero_curso']}' ";
	
	$query = mysqli_query(db_conexion::db_conectar(),$sql);
	$registro = mysqli_fetch_array($query);

	


	//crea el comando sql a enviar
	//echo "sql= ".$sql;
	//echo " query= ".$query;
	//realiza la consulta a la base con el comando sql
	//realiza un array con todos los usuario para verificar que
	//no este aun registrado
	//echo "registro: ".$registro;

	if (!$registro){
		$sql = "insert into cursos (nombre_curso, numero_curso, id_director, id_jornada, id_periodo) values ('{$_POST['nombre_curso']}','{$_POST['numero_curso']}','{$_POST['director']}','{$_POST['jornada']}','{$_POST['periodo']}')";
		//INGRESA el sql
		
		if ($query = mysqli_query(db_conexion::db_conectar(),$sql)) {
			echo "se registro el curso satisfactoriamente ";
			//$_SESSION['rol_v'] = 1; //por ahora ponemos el numero directo							
			echo "<a href='../pag/cursos.php?rolv=1'>Regresar Cursos</a>";
				//realiza la consulta
				//crea las variables session que permaneces desde qno se destruya la session
		
			}else {
				echo "error no se pudo ingresar el curso en la base error #250220201238";
			}				

		}
		else{
		echo "el curso ya existe "."<a href='../pag/registro_curso.php?rolv=1'>intentar con otro numero de curso</a>";
	}
}

function registro_coordinador(){
	$sql = "select codigo_profesor from coordinadores where codigo_profesor = '{$_GET['codigo_profe']}' ";
	//echo "sql= ".$sql;
	$query = mysqli_query(db_conexion::db_conectar(),$sql);
	$registro = mysqli_fetch_array($query);

	$sql2 = "select id_anio from anios where habil = 1 ";
	//echo "sql2= ".$sql2;
	
	$query2 = mysqli_query(db_conexion::db_conectar(),$sql2);
	$registro2 = mysqli_fetch_array($query2);
	//echo "registro2 = ".$registro2;


	if (!$registro){
		$sql3 = "insert into coordinadores (codigo_profesor, id_anio) values ('{$_GET['codigo_profe']}','{$registro2['id_anio']}')";
		//INGRESA el sql
		
		if ($query3 = mysqli_query(db_conexion::db_conectar(),$sql3)) {
			echo "se registro el coordinador satisfactoriamente ";
			//$_SESSION['rol_v'] = 1; //por ahora ponemos el numero directo							
			echo "<a href='../pag/coordinadores.php?rolv=1'>Ir a Coordinadores</a>";
				//realiza la consulta
				//crea las variables session que permaneces desde qno se destruya la session
		
			}else {
				echo "error no se pudo ingresar el curso en la base error #24022020838";
			}				

		}
		else{
		echo "el profesor ya esta asignado como coordinador "."<a href='../pag/registro_coor.php?rolv=1'>intentar con otro profesor</a>";
	}
}

function registro_director(){
		$sql = "select codigo_profesor from directores where codigo_profesor = '{$_GET['codigo_profe']}' ";
		//echo "sql= ".$sql;
		$query = mysqli_query(db_conexion::db_conectar(),$sql);
		$registro = mysqli_fetch_array($query);
	
	
		if (!$registro){
			$sql3 = "insert into directores (codigo_profesor) values ('{$_GET['codigo_profe']}')";
			//INGRESA el sql
			
			if ($query3 = mysqli_query(db_conexion::db_conectar(),$sql3)) {
				echo "se registro el director satisfactoriamente ";
				//$_SESSION['rol_v'] = 1; //por ahora ponemos el numero directo							
				echo "<a href='../pag/directores.php?rolv=1'>Ir a Directores</a>";
					//realiza la consulta
					//crea las variables session que permaneces desde qno se destruya la session
			
				}else {
					echo "error no se pudo ingresar el curso en la base error #26022020415";
				}				
	
			}
			else{
			echo "el profesor ya esta asignado como director "."<a href='../pag/registro_director.php?rolv=1'>intentar con otro profesor</a>";
		}
}

function registro_materia_curso(){
	/*en esta funcion realizamos el registro en la tabla materia_curso y automaticamente
	lo agregamos en profe_materia_curso, si falla el registro de profe_materia_curso,
	automaticamente se borra el registro de materia_curso recien hecho*/

	$id_materia2=$_GET['id_mat'];
	$id_curso2=$_GET['id_cur2'];
	$id_co_pro2=$_GET['id_co_pro'];
	$id_pro_ma2=$_GET['id_pro_ma'];

	//echo "id_materia= ".$id_materia2;
	//echo '<br>';
	//echo "id_curso= ".$id_curso2;
	//echo '<br>';	
	//echo "id_codigo_profesor= ".$id_co_pro2;
	
	$sql_c = "select id_materia_curso from materia_curso where id_materia = $id_materia2 and id_curso = $id_curso2";
	//echo "sql= ".$sql;
	$query_c = mysqli_query(db_conexion::db_conectar(),$sql_c);
	$registro_c = mysqli_fetch_array($query_c);


	if (!$registro_c){
		$sql3 = "insert into materia_curso (id_materia, id_curso) values ($id_materia2, $id_curso2)";
		//INGRESA el sql
		
		if ($query3 = mysqli_query(db_conexion::db_conectar(),$sql3)) {
			
			//este comando prueba si existe el campo recien creado en la tabla materia_curso
			$sql_con = "select id_materia_curso from materia_curso where id_materia = $id_materia2 and id_curso = $id_curso2";
				//echo "sql= ".$sql;
			$query_con = mysqli_query(db_conexion::db_conectar(),$sql_con);
			$registro_con = mysqli_fetch_array($query_con);
			if($registro_con){
						// echo "registro con 0= ".$registro_con[0];
						//esta linea inserta un registro en profe_materia_curso
						$sql_pm = "insert into profe_mate_curso (id_materia_curso, id_profe_materia) values ($registro_con[0], $id_pro_ma2)";
						if ($query_pm = mysqli_query(db_conexion::db_conectar(),$sql_pm)) {				
			
							echo "se agrego la materia al curso satisfactoriamente ";
							//$_SESSION['rol_v'] = 1; //por ahora ponemos el numero directo							
							echo "<a href='../pag/cursos.php?accion=1'>Ir a Cursos</a>";
								//realiza la consulta
								//crea las variables sesion que permaneces desde qno se destruya la session
						}else {
				echo "error no se pudo agregar la materia, error en la materia_curso #26022020412";				
			}
		}
		else{
			$sql_borra= "DELETE FROM materia_curso WHERE id_materia = '{$id_materia2}' and id_curso = '{$id_curso2}';";
				//esta linea elimina el registro porque se creo en materia_curso pero no en profe_materia_curso
			if ($query4 = mysqli_query(db_conexion::db_conectar(),$sql_borra)) {
					echo "error se creo la materia, pero se elimino automaticamente por no tener un profesor adjunto error  #2019081001 de usuarios_c.php";
				}
				else{
					echo "error se creo el registro en materia_curso pero no en profe_materia_curso, #2019081002 de usuarios_c.php";			
				}
			}
		
		}
		else{
			echo "error al insertar registro en materia curso #2019081003";
		}
	}
	else{
		echo "la materia ya está asignada a este curso "."<a href='../pag/cursos.php?accion=1'>intenta de nuevo</a>";
		}
}

function registro_resultados(){
	$id_mate=$_POST['id_ma3'];
	$id_profe=$_POST['cod_pro6'];
	$id_cur=$_POST['id_cur5'];

	//codigo para hallar id_profe_materia
	$sql_id_profe_materia1="
	SELECT id_profe_materia
	from profe_materia
	where codigo_profesor = ".$id_profe." and id_materia = ".$id_mate."
	";
	$query_profe_materia1 = mysqli_query(db_conexion::db_conectar(),$sql_id_profe_materia1);
	$registro_profe_materia1 = mysqli_fetch_array($query_profe_materia1);
	$id_profe_materia= $registro_profe_materia1[0];
	echo "id profe materia = ".$id_profe_materia;

	//codigo para obtener id_curso_materia
	$sql_id_curso_materia = "
	select id_materia_curso
	from materia_curso
	where id_curso = ".$id_cur." and id_materia = ".$id_mate."; 
	"; 
	$query_curso_materia = mysqli_query(db_conexion::db_conectar(),$sql_id_curso_materia);
	$registro_curso_materia = mysqli_fetch_array($query_curso_materia);
	$id_curso_materia= $registro_curso_materia[0];
	echo "id curso materia = ".$id_curso_materia;

	//codigo para obtener profe_materia_curso
	$sql_profe_materi_curso="
	select id_profe_materia_curso 
	from profe_mate_curso
	where id_profe_materia = ".$id_profe_materia." and id_materia_curso = ".$id_curso_materia."
	";
	$query_profe_materi_curso = mysqli_query(db_conexion::db_conectar(),$sql_profe_materi_curso);
	$registro_profe_materi_curso = mysqli_fetch_array($query_profe_materi_curso);
	$id_profe_materi_curso = $registro_profe_materi_curso[0];
	echo "id profe curso materia = ".$id_profe_materi_curso;


	$sql_e1 = "
    
	";
	

//abajo
}
?>