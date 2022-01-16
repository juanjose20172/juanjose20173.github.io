<?php
 class db_conexion{
 	//clase que realiza la verdadera conexion con la bd

 	function __construct(){
 		//siempre toda clase lleva un constructor en este case
 		//es hacer ña conexion con la funcion db_conectar
 		$this->db_conectar();
 	}

 	function __destruct(){
 		//tpda clase debe tener un destructor,
 		//en este caso el destuctor cierra la base
 		$this->db_cerrar();
 	}

 	function db_conectar(){
 		//importar parametros de conexion
 		require_once 'parametros.php';
 		//conectamos
 		$conexion = mysqli_connect(SERVIDOR,USUARIO,CLAVE,BASE_DATOS) OR die ('no se pudo realizar la conexion'.mysql_error()); 
		//convierte las tildes bien
		
		 //retorna conexion
 		return $conexion;
 		echo "parce retorna la conexion";
 	}

 	function db_cerrar(){
 		//cierra la conexion
 		mysqli_close($this->db_conexion);
 		echo "parce cierra la conexion.php";
 	}
 }
 ?>