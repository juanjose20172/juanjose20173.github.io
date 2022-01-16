<?php
// esta pagina reenvia a la pagina principal
header("Content-Type: text/html;charset=utf-8");
$aviso=0;
require_once 'conexion/conexion.php';
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
	<link rel="stylesheet" href="css/css4.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- build:css css/css.css build/css-->
     <link rel="stylesheet" href="node_modules/materialize-css/dist/css/materialize.min.css">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <link rel="stylesheet" href="css/css4.css">
    <!-- endbuild -->   
        <!-- importamos el css-->
	<title>Directorio</title>
	<! titulo de la pagina->
</head>
<body>
	<div class="navbar-fixed" >
    <nav class="col s12 m6 l6 xl12">
      <div class="">
        <ul class="">
		<li>Directorio</li>
		<li><a href="https://drive.google.com/file/d/18KaU81FBKRm5oT9sKyJ5unOYDdRFT24G/view?usp=sharing" class="waves-effect waves-light btn #81c784 green lighten-2">APP<i class="material-icons left">android</i></a></li>		
        </ul>
      </div>
    </nav>
  </div>

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
		<form id="estilo_buscador2" class="col s12 m6 l5 xl5" action="pag/inicio_dir.php" method="POST">
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
				<img class="responsive-img center" src="assets/img/computadores4.jpg" alt=""></a>	
			</div>
		</div>
		<!-- termina propaganda -->

		
		<div id="categoria">
			<!-- <a href='pag/sangil2.php' class="waves-effect waves-light btn #ff8a65 deep-orange lighten-2"><i class="material-icons left">apps</i>Todas las categorías</a> -->
		</div>
		
		<!-- empieza div que define columnas en la tabla, esta definiendo tambien las categorias-->	
		<div class="row" id="cont_prin">
		<div class="col s12 l8 xl8 ">
			<a id='menu_princi' href='pag/inicio_dir.php?accion=1&busqueda=alimentos' class="waves-effect waves-light btn #ff8a65 deep-orange lighten-2"><i class="material-icons left">restaurant_menu
			</i>Alimentos</a>				
			<a id='menu_princi' href='pag/inicio_dir.php?accion=1&busqueda=salud' class="waves-effect waves-light btn #ff8a65 deep-orange lighten-2"><i class="material-icons left">favorite_border</i>Salud</a>
			<a id='menu_princi' href='pag/inicio_dir.php?accion=1&busqueda=restaurantes - comidas' class="waves-effect waves-light btn #ff8a65 deep-orange lighten-2"><i class="material-icons left">restaurant
			</i>Restaurantes - comidas</a>	
			<a id='menu_princi' href='pag/inicio_dir.php?accion=1&busqueda=domicilio' class="waves-effect waves-light btn #ff8a65 deep-orange lighten-2"><i class="material-icons left">motorcycle</i>Domicilios</a>					
			<a id='menu_princi' href='pag/inicio_dir.php?accion=1&busqueda=supermercados' class="waves-effect waves-light btn #ff8a65 deep-orange lighten-2"><i class="material-icons left">shopping_cart</i>Supermercados</a>		
			<a id='menu_princi' href='pag/inicio_dir.php?accion=1&busqueda=panaderias - cafeterias' class="waves-effect waves-light btn #ff8a65 deep-orange lighten-2"><i class="material-icons left">free_breakfast
			</i>Panaderías - Cafeterías</a>		
			<a id='menu_princi' href='pag/inicio_dir.php?accion=1&busqueda=servicios' class="waves-effect waves-light btn #ff8a65 deep-orange lighten-2"><i class="material-icons left">record_voice_over</i>Servicios</a>		
			<a id='menu_princi' href='pag/inicio_dir.php?accion=1&busqueda=educacion' class="waves-effect waves-light btn #ff8a65 deep-orange lighten-2"><i class="material-icons left">school</i>Educación</a>		
			<a id='menu_princi' href='pag/inicio_dir.php?accion=1&busqueda=otros' class="waves-effect waves-light btn #ff8a65 deep-orange lighten-2"><i class="material-icons left">redo</i>Otros</a>			
			</div>
		</div>
	<br>		
     <!-- build:js main.js build/scripts -->
<script src="/node_modules/jquery/dist/jquery.min.js"></script>
<script src="/node_modules/materialize-css/dist/js/materialize.min.js"></script>  
<script src="main.js"></script>
<!-- endbuild -->
</body>
</html>