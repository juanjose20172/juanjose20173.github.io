<?php
session_start();
if (!isset($_SESSION['usuario_n']))header('location:../index.php');
	require_once '../conexion/conexion.php';
//	echo "nombre: ".$_SESSION['usuario_n'];
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
	<title>Registro Materias</title>
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
			<h1 id="h1_index">Registro Materias</h1>
		</div>
	</div>
	<!-- termina titulo -->

	<!-- inicia toda la tabla -->
	<div class="row">
      <div class="col s4 push-s4">

	<table id="mitabla" class="table center-align col-s2">
		<! con un *tr pasamos de renglon hacia abajo en la tabla
		*con un td pasamos un cuadro hacia la derecha en la table->
			<thead>
			<! *este es el encabezado de la tabla->
				<tr>
					<th id="log_index">Ingrese los datos</th>
				</tr>
			</thead>
			<tbody>
			<tr>
					<td><input type="text" name="codigo" id=""
					placeholder="ingrese codigo de la materia" required>
					</td>
				</tr>
				<tr>
					<td><input type="text" name="nombre_materia" id=""
					placeholder="ingrese nombre de la materia" required>
					</td>
				</tr>
				<tr>
					<td>
                        <textarea id="" name="logro1" cols="40" rows="5" 
                        placeholder="Digite el logro N.1"></textarea>
                    </td>
				</tr>
				<tr>
					<td>
                    <textarea id="" name="social1" cols="40" rows="5" 
                        placeholder="Digite Social N.1"></textarea>
					</td>
                </tr>
                <tr>
					<td>
                    <textarea id="" name="cognitivo1" cols="40" rows="5" 
                        placeholder="Digite Cognitivo N.1"></textarea>
					</td>
                </tr>
                <tr>
					<td>
                    <textarea id="" name="personal1" cols="40" rows="5" 
                        placeholder="Digite Personal N.1"></textarea>
					</td>
                </tr> 
                <tr>
					<td>
                        <textarea id="" name="logro2" cols="40" rows="5" 
                        placeholder="Digite el logro N.2"></textarea>
                    </td>
				</tr>
				<tr>
					<td>
                    <textarea id="" name="social2" cols="40" rows="5" 
                        placeholder="Digite Social N.2"></textarea>
					</td>
                </tr>
                <tr>
					<td>
                    <textarea id="" name="cognitivo2" cols="40" rows="5" 
                        placeholder="Digite Cognitivo N.2"></textarea>
					</td>
                </tr>
                <tr>
					<td>
                    <textarea id="" name="personal2" cols="40" rows="5" 
                        placeholder="Digite Personal N.2"></textarea>
					</td>
                </tr> 
                <tr>
					<td>
                        <textarea id="" name="logro3" cols="40" rows="5" 
                        placeholder="Digite el logro N.3"></textarea>
                    </td>
				</tr>
				<tr>
					<td>
                    <textarea id="" name="social3" cols="40" rows="5" 
                        placeholder="Digite Social N.3"></textarea>
					</td>
                </tr>
                <tr>
					<td>
                    <textarea id="" name="cognitivo3" cols="40" rows="5" 
                        placeholder="Digite Cognitivo N.3"></textarea>
					</td>
                </tr>       
                <tr>
					<td>
                    <textarea id="" name="personal3" cols="40" rows="5" 
                        placeholder="Digite Personal N.3"></textarea>
					</td>
                </tr> 
			</tbody>
		</table>
		<br>
		<div class="row">
			<div class="col s3 push-s4">
				<a class="waves-effect waves-light btn">
					<i class="material-icons left"></i>
						<input type="submit" value="Registrar Materia" name="s1" >
				</a>
			</div>
		</div>
				
			<input type="hidden" name="accion" value="5">				
	</form>
		<article class="article_registro">
			
			<a class="waves-effect waves-light btn-small #e57373 red lighten-2" href="materias.php" title="" id="btn_reg_registro">
				<i class="material-icons left"></i>Atras</a>
			</a>	
			<a class="waves-effect waves-light btn-small #e57373 red lighten-2" href="inicio.php" title="" id="btn_reg_registro">
				<i class="material-icons left"></i>Menu</a>
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