<?php 
if (session_start()) {
	//verificamos que si hay sesion la destruya
    session_destroy();
}
session_start();
//iniciamos sesion
?>

<?php 
//requerimos parametros de la base de datos como variable universal
require_once __DIR__ . '/conexion/parametros.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="css/css.css">
    <meta name="viewport" content="width=device-width, initial-scale=0.5"/>
    <meta content="width=device-width, initial-scale=0.5, maximum-scale=0.5, user-scalable=0" name="viewport" />

    <!-- build:css css/css.css build/css-->
     <link rel="stylesheet" href="node_modules/materialize-css/dist/css/materialize.min.css">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    
    <!-- endbuild -->

    <!-- importamos el css-->
	<title>Ingreso</title>
	<! titulo de la pagina->
</head>
<body>
		<nav>
			<ul>
				<li><a href="?" title="">Inicio</a></li>
			<!--	<li><a href="pag/registro.php" title="">Registro</a></li> quitamos esta linea porque solo pueden registrar los coordinadores-->
			</ul>
		</nav>
<section class="section_index">

<form action="controladores/usuarios_c.php" method="POST">
<! todas las respuestas post van a esta direccion form es formulario ->
    
<!-- contenedor general toda la pagina-->
<div class="container">
<div class="div_h1">
 		<h1 id="h1_index" class="center-align">Ingreso de Usuario</h1>
 	</div>
    <div class="div_index">

    <!-- calcula el tamaño de la tabla -->
    <div class="container"><! inicia container 3->
    <div class="container">  <! inicia container 4->
    <div class="row">
        
       
    <table id="mitabla" class="table center-align col-s4">
                <thead>
                    <tr>
                        <th id="log_index">Ingreso</th>
                        <! titulo de la tabla->
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="input-field">
                            <input type="text" name="cedula" id="mi_imput_index" placeholder="ingrese numero de usuario" required>
                        <! campo tipo texto se reconoce como nombre en el $_Post, campo requerido y de fondo dice ingrese su nombre->
                            </div>
                           
                        </td>
                    </tr>
                    <tr>
                        
                        <td>
                            <input type="password" name="contra" id="mi_imput_index" placeholder="ingrese contraseña" required>		<! campo tipo contraseña->	
                        </td>				
                    </tr>
                </tbody>
            </table>
            </div>  
</div>
</div>
    </div>
            
        <br>	
        <!--inicia container 2-->
        <div class="center">
                <input type="submit" value="Entrar" name="s1" id="s1_index" >
                <! un boton el name no importa el value es el nombre isible este no se envia en el post->	
                <input type="hidden" name="accion" value="2">
                <! variable invisible aqui se utiliza para para enviar el valor de 2 a usuarios.php->	
        </form>
             <!--   <a href="pag/registro.php" title="" class="a_index"> registrate</a> -->
                <! un a es un texto con un link al oprimirlo->
        </div> 
        <! termina container 2->
        </div>   <! termina container 3->
</div>   <! termina container 4->
<!-- fin del contenedor general-->

<!-- empieza labels -->

<!-- termina labels -->

<!-- inicio carouse -->
<div class="carousel carousel-slider">
    <a class="carousel-item" href="#one!"><img src="https://lorempixel.com/800/400/food/1"></a>
    <a class="carousel-item" href="#two!"><img src="https://lorempixel.com/800/400/food/2"></a>
    <a class="carousel-item" href="#three!"><img src="https://lorempixel.com/800/400/food/3"></a>
    <a class="carousel-item" href="#four!"><img src="https://lorempixel.com/800/400/food/4"></a>
  </div>
<!-- termina carousel -->

<?php
echo md5(101);
?>


    <!-- build:js main.js build/scripts -->
<script src="../node_modules/jquery/dist/jquery.min.js"></script>
<script src="../node_modules/materialize-css/dist/js/materialize.min.js"></script>  
<script src="main.js"></script>
<!-- endbuild -->

</section>
</body>
</html>