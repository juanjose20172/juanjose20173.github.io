<?php
header("Content-Type: text/html;charset=utf-8");
$aviso=0;
require_once '../conexion/conexion.php';
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
	<link rel="stylesheet" href="../css/css4.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- build:css css/css.css build/css-->
     <link rel="stylesheet" href="../node_modules/materialize-css/dist/css/materialize.min.css">
    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
    <link rel="stylesheet" href="../css/css4.css">
    <!-- endbuild -->   
        <!-- importamos el css-->
	<title>Directorio</title>
	<! titulo de la pagina->
</head>
<body>
<?php
	if(!empty($_GET)){
		//recibe las variables ya sea por post o por get para no fallar al recibir
		$accion=$_GET['accion'];
		$buscar=$_GET['busqueda'];
	  }
	else if(!empty($_POST)){
		$accion=$_POST['accion'];
		$buscar=$_POST['busqueda'];
		//echo "buscar= .".$buscar.".";
	  }
	  else{$accion=0;
	  }
	?>

	<div class="navbar-fixed" >
    <nav class="col s12 m6 l6 xl12">
      <div class="">
        <ul class="">
		<li><a href="?" class="waves-effect waves-light btn #01579b light-blue darken-4">Atras<i class="material-icons right">arrow_back</i></a></li>
		<li>Directorio</li>
		<li><a href="https://drive.google.com/file/d/18KaU81FBKRm5oT9sKyJ5unOYDdRFT24G/view?usp=sharing" class="waves-effect waves-light btn #81c784 green lighten-2">APP<i class="material-icons left">android</i></a></li>		
        </ul>
      </div>
    </nav>
  </div>

  

	  
<?php
 	if ($accion<>1 && $accion<>2) {
?>
<div>
		<div id="visitas">Visitas</div>
		<div style="width:155px; float:left; height:44px; margin-left:5px;" id="sfc9wxw6yw11xpcykfyxb3ln6kjf6dcy2mc"></div><script type="text/javascript" src="https://counter3.stat.ovh/private/counter.js?c=9wxw6yw11xpcykfyxb3ln6kjf6dcy2mc&down=async" async></script><noscript><a href="https://www.contadorvisitasgratis.com" title="contador de visitas para web"><img src="https://counter3.stat.ovh/private/contadorvisitasgratis.php?c=9wxw6yw11xpcykfyxb3ln6kjf6dcy2mc" border="0" title="contador de visitas para web" alt="contador de visitas para web"></a></noscript>
		<script type="text/javascript" src="https://counter3.stat.ovh/private/counter.js?c=f7bakfzk4gpcktxzh3rursq43jp6tk3b&down=async" async></script>
		<noscript><a href="?" title=""><img src="https://counter3.stat.ovh/private/contadorvisitasgratis.php?c=f7bakfzk4gpcktxzh3rursq43jp6tk3b" border="0" title="" alt=""></a></noscript>
		</div>

		<div id="estilo_let">
		<h4>Directorio - San Gil</h4>		
		</div>
		<div id="estilo_let">
			<h6><b>Seleccione Categoria o busque aqui</b></h6>		
		</div>
		
		<!-- inicia formulario -->
		
		<div class="row" id="estilo_buscador1">
		<form id="estilo_buscador2" class="col s12 m6 l5 xl5" action="inicio_dir.php" method="POST">
		  <div class="row">
			<div class="input-field col s8">
			  <i id="bajar_icono1" class="material-icons prefix">send</i>
			  <input id="icon_prefix" type="text" name="busqueda" class="validate" required>
			  <label id="estilo_buscador3" for="icon_prefix">Buscar producto</label>
			</div>
			<div class="input-field col s3">
				<input type="hidden" name="accion" value="2">			
				<button id="bajar_boton1" class="btn waves-effect waves-light" type="submit" name="action">
				<i class="material-icons right">search</i>
				</button>
		  </div>
		</div>
		</form>
	  </div>
		<!-- termina formulario -->

		<!-- empieza propaganda -->
		<div class="row">
			<div class="center #ef5350 black lighten-1" id="estilo10">
				<a id="letra1" href="https://api.whatsapp.com/send?phone=573173198265&text=Hola quiero preguntar por arreglo de un computador %0A %0A ->Mensaje enviado a través del directorio San Gil - https://directoriosangil.000webhostapp.com">Publicidad
				<img class="responsive-img center" src="../assets/img/computadores4.jpg" alt=""></a>	
			</div>
		</div>
		<!-- termina propaganda -->

		
		<div id="categoria">
		<!--	<a href='sangil2.php' class="waves-effect waves-light btn #ff8a65 deep-orange lighten-2"><i class="material-icons left">apps</i>Todas las categorías</a> -->
		</div>
		
		<!-- empieza div que define columnas en la tabla-->	
		<div class="row" id="cont_prin">
		<div class="col s12 l8 xl8 ">
			<a id='menu_princi' href='inicio_dir.php?accion=1&busqueda=alimentos' class="waves-effect waves-light btn #ff8a65 deep-orange lighten-2"><i class="material-icons left">restaurant_menu
			</i>Alimentos</a>				
			<a id='menu_princi' href='inicio_dir.php?accion=1&busqueda=salud' class="waves-effect waves-light btn #ff8a65 deep-orange lighten-2"><i class="material-icons left">favorite_border</i>Salud</a>
			<a id='menu_princi' href='inicio_dir.php?accion=1&busqueda=restaurantes - comidas' class="waves-effect waves-light btn #ff8a65 deep-orange lighten-2"><i class="material-icons left">restaurant
			</i>Restaurantes - comidas</a>	
			<a id='menu_princi' href='inicio_dir.php?accion=1&busqueda=domicilio' class="waves-effect waves-light btn #ff8a65 deep-orange lighten-2"><i class="material-icons left">motorcycle</i>Domicilios</a>					
			<a id='menu_princi' href='inicio_dir.php?accion=1&busqueda=supermercados' class="waves-effect waves-light btn #ff8a65 deep-orange lighten-2"><i class="material-icons left">shopping_cart</i>Supermercados</a>		
			<a id='menu_princi' href='inicio_dir.php?accion=1&busqueda=panaderias - cafeterias' class="waves-effect waves-light btn #ff8a65 deep-orange lighten-2"><i class="material-icons left">free_breakfast
			</i>Panaderías - Cafeterías</a>		
			<a id='menu_princi' href='inicio_dir.php?accion=1&busqueda=servicios' class="waves-effect waves-light btn #ff8a65 deep-orange lighten-2"><i class="material-icons left">record_voice_over</i>Servicios</a>		
			<a id='menu_princi' href='inicio_dir.php?accion=1&busqueda=educacion' class="waves-effect waves-light btn #ff8a65 deep-orange lighten-2"><i class="material-icons left">school</i>Educación</a>		
			<a id='menu_princi' href='inicio_dir.php?accion=1&busqueda=otros' class="waves-effect waves-light btn #ff8a65 deep-orange lighten-2"><i class="material-icons left">redo</i>Otros</a>			
			</div>
		</div>
<!-- termina div que ubica columnas de la tabla-->

	<br><br>
	<?php
	//termina if <> 1
	 } else if ($accion==1){
		 //echo "entro accion 1";
		 //inicia condicional accion = 1
		 require_once '../conexion/conexion.php';
		 //paquete  para ingreso de datos
		 $sql_di = "
		 select nombre, direccion, barrio, whatsapp, producto
		 from directorio
		 where filtro2 = '{$buscar}';
		 "; 
		 $result_di=mysqli_query(db_conexion::db_conectar(),$sql_di);
		 echo "
		 <div class='row'><br>
			 <div class='col s12 center'>
				 resultado(s) de busqueda con <b>'".$buscar."'</b>
			 </div>
		 </div>

		 <div id='btn_registro_p' class='row'><br>
			<div class='col s12 center'>
				<a href='https://forms.gle/9pTPGbRWmGGseyZ58' class='waves-effect waves-light btn-small #01579b light-blue darken-4'><i class='material-icons left'>chrome_reader_mode</i>Registrar mi producto</a>				
			</div>
		 <br><br><br>			
	 </div>
	 ";		 
	 ?>	
		 
		 <div id="flecha_derecha" class="centered">
		 		 <img class="responsive-img" src="../assets/img/izquierda.jpg" alt="">
		 </div>
			 <!-- inicia seccion de lista -->
			 <table class="striped centered responsive-table">
			 <thead>
			   <tr>
			   <th><b id="estilo_responsivo">Producto</b> </th>
			   <th><b id="estilo_responsivo2">Whatsapp</b></th>				 
			   <th><b id="estilo_responsivo">Nombre</b></th>
			   <th><b id="estilo_responsivo2">Barrio</b></th>
			   <th><b id="estilo_responsivo">Direccion</b></th>
				 				     
			   </tr>
			 </thead>
	 
			 <tbody>
			 <?php
			 while ($datos_di = mysqli_fetch_array($result_di)) {
			 $telefono_aut=$datos_di['whatsapp'];
			 $nombre_aut=$datos_di['nombre'];			 
				 //ingresa codigo html automaticamente usando el while e imprimiendo el array de cada dato result o conexion con la base
				 echo "
				 <tr>
	 <!-- esto es comentario asigna cada dato de la tabla-->
	 				 <td id='estilo2'><b>{$datos_di['producto']}</b></td></div>
	                 <td><u><a href='https://api.whatsapp.com/send?phone=57".$telefono_aut."&text=Hola ".$nombre_aut." venden productos a domicilio? %0A %0A ->Mensaje enviado a través de https://directoriosangil.000webhostapp.com/'><img class='responsive-img' src='../assets/img/icono3.png'>{$datos_di['whatsapp']}</a></u></td>
					 <td>{$datos_di['nombre']}</td>
					 <td>{$datos_di['barrio']}</td>
					 <td>{$datos_di['direccion']}</td>
					 
					 
				 ";
			  
				 //coge los datos del usuario y se los reenvia a este mismo archivo con la variable accion = 2 para 
				 //que llenar los campos automaticamente de la tabla editar
				 //despues envia lo mismo pero para el caso de eliminar
			 //'../controladores/usuarios_c.php?accion=4&ide={$datos['id_usuario']}'
			 echo "
			 </tr>
			 ";
			 }
			 ?>
				 	</tbody>
				 </table>
				 <div id="btn_registro_c" class='row'><br>
					<div class='col s12 center'>
						<a href="https://forms.gle/9pTPGbRWmGGseyZ58" class="waves-effect waves-light btn-small #01579b light-blue darken-4"><i class="material-icons left">chrome_reader_mode</i>Registrar mi producto</a>				
				 </div>
<?php
//aqui empieza la condicional accion = 2
	//termina if <> 1
			 } else if ($accion==2){
				// echo "entro accion 2";
		 //inicia esta seccion despues borrar
		 require_once '../conexion/conexion.php';
		 //paquete  para ingreso de datos
		 //$bus = $_GET['busqueda'];
		// echo "bus = ".$bus;
		
		$buscar2 = "%".$buscar."%";
		//echo "buscar 2 = ".$buscar2;
		
		//comprobacion si la busqueda tiene algun dato para responder que no hay
		//nada encontrado y para no mostrar la tabla
		$sql_com = "
		select count(nombre)
		from directorio
		where producto like '{$buscar2}'
		or filtro like '{$buscar2}';
		 ";

		$result_com=mysqli_query(db_conexion::db_conectar(),$sql_com);
		$datos_com = mysqli_fetch_array($result_com);
		//echo "datos_com= ".$datos_com[0];
		$resultado_com=$datos_com[0];

		if($resultado_com==0){
			$aviso = 1;
			echo "
			<h1><div class='row'><br>
				<div class='col s12 center'>
					<h5>la busqueda no tiene resultados con <b>'".$buscar."'</b></h5>
				</div>
			</div>
			</h1>
		";	
		}else{
			$sql_bus="
			select nombre, direccion, barrio, whatsapp, producto, filtro
			from directorio
		   where producto like '{$buscar2}'
		   or filtro like '{$buscar2}';
			";
			$result_bus=mysqli_query(db_conexion::db_conectar(),$sql_bus);			
		
		}
								if ($aviso<>1){
	echo "
		<div class='row'><br>
			<div class='col s12 center'>
				".$resultado_com." resultado(s) de busqueda con <b>'".$buscar."'</b>
			</div>
		</div>
		
		<div id='btn_registro_p' class='row'><br>
			<div class='col s12 center'>
			<a href='https://forms.gle/9pTPGbRWmGGseyZ58' class='waves-effect waves-light btn-small #01579b light-blue darken-4'><i class='material-icons left'>chrome_reader_mode</i>Registrar mi producto</a>				
			</div>
			<br><br><br>			
		</div>
	";		 
									 
	 ?>	
	 <div id="flecha_derecha" class="centered">
		 <img class="responsive-img" src="../assets/img/izquierda.jpg" alt="">
	</div>
			 <!-- inicia seccion de lista -->
			 <table class="striped centered responsive-table">
			 <thead>
			   <tr>
			     <th><b id="estilo_responsivo">Producto</b> </th>
				 <th><b id="estilo_responsivo2">Whatsapp</b></th>				 
				 <th><b id="estilo_responsivo">Nombre</b></th>
				 <th><b id="estilo_responsivo2">Barrio</b></th>
				 <th><b id="estilo_responsivo">Direccion</b></th>
				 
				     
			   </tr>
			 </thead>
	
			 <tbody>
			 <?php while ($datos_bo = mysqli_fetch_array($result_bus)) {
				$telefono_aut=$datos_bo['whatsapp'];
				$nombre_aut=$datos_bo['nombre'];
				 //ingresa codigo html automaticamente usando el while e imprimiendo el array de cada dato result o conexion con la base
				 echo "
				 <tr>
	 <!-- esto es comentario asigna cada dato de la tabla-->
	 				 <td id='estilo2'><b>{$datos_bo['producto']}</td>
					  <td><u><a href='https://api.whatsapp.com/send?phone=57".$telefono_aut."&text=Hola ".$nombre_aut." venden productos a domicilio? %0A %0A ->Mensaje enviado a través de https://directoriosangil.000webhostapp.com/'><img class='responsive-img' src='../assets/img/icono3.png'>{$datos_bo['whatsapp']}</a></u></td>
					 <td>{$datos_bo['nombre']}</td>
					 <td>{$datos_bo['barrio']}</td>
					 <td>{$datos_bo['direccion']}</td> 	 
				 ";
			  
				 //coge los datos del usuario y se los reenvia a este mismo archivo con la variable accion = 2 para 
				 //que llenar los campos automaticamente de la tabla editar
				 //despues envia lo mismo pero para el caso de eliminar
			 //'../controladores/usuarios_c.php?accion=4&ide={$datos['id_usuario']}'
			 echo "
			 </tr>
			 ";
			 }
			}
			 ?>
				 	</tbody>
				 </table>
				 <br>
				 <div id="btn_registro_c" class='row'><br>
					<div class='col s12 center'>
						<a href="https://forms.gle/9pTPGbRWmGGseyZ58" class="waves-effect waves-light btn-small #01579b light-blue darken-4"><i class="material-icons left">chrome_reader_mode</i>Registrar mi producto</a>				
					</div>
			 <?php
			 }
			 ?>
			 <!-- color rojo : #ef5350 blue lighten-1   -->



	

        <!-- build:js main.js build/scripts -->
<script src="/node_modules/jquery/dist/jquery.min.js"></script>
<script src="/node_modules/materialize-css/dist/js/materialize.min.js"></script>  
<script src="main.js"></script>
<!-- endbuild -->
</body>
</html>