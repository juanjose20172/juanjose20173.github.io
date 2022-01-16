<?php 
 //requiere la conexion para poder conextarse a la base de datos y hacer la consulta
 	require_once "../conexion/conexion.php";
 	//obtiene el id_dep como variable intval
 	$dep = intval($_GET['id_dep']);
 	//hace la consulta con el numero $dep
 	$sql_ciu= "select id_ciudad, nombre, id_departamento from ciudades where id_departamento = '$dep'";
 	//hace la conexion con la consulta sql_ciu
 	$result_ciu = mysqli_query(db_conexion::db_conectar(),$sql_ciu);
 	
 	echo "<select id='cajones_login' name ='ciu' class='cargar_ciu_select'>";
 	//hace el recorrido a la tabla, lo guarda en el array todo dentro del select
 	while ($datos = mysqli_fetch_array($result_ciu)){
 		echo "<option value='{$datos['id_ciudad']}' class='cargar_ciu_nombre'>{$datos['nombre']}</option>";
 	}
 	echo "</select>";
  ?>