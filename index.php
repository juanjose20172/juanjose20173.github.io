<?php 
if(session_start()){
	//verificamos que si hay sesion la destruya
	session_destroy();
}
session_start();
//iniciamos sesion
 ?>

<?php 
//requerimos parametros de la base de datos como variable universal
require_once __DIR__.'/conexion/parametros.php';
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="css/css2.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- build:css css/css.css build/css-->
     <link rel="stylesheet" href="node_modules/materialize-css/dist/css/materialize.min.css">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <link rel="stylesheet" href="css/css.css">
    
    <!-- endbuild -->

    <! importamos el css->
	<title>Loguin</title>
	<! titulo de la pagina->
</head>
<body>
		<nav>
			<ul>
				<li><a href="?" title="">Inicio</a></li>
				<li><a href="pag/registro.php" title="">Registro</a></li>
			</ul>
		</nav>
<section class="section_index">
 	<div class="div_h1">
 		<h1 id="h1_index">Acceso al evento conferencias programadas</h1>
 	</div>
<form action="controladores/usuarios_c.php" method="POST">
<! todas las respuestas post van a esta direccion form es formulario ->
    
<div class="container"
    <div class="div_index">
            <table id="mitabla" class="table">
                <thead>
                    <tr>
                        <th id="log_index">Ingreso</th>
                        <! titulo de la tabla->
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <input type="text" name="cedula" id="mi_imput_index" placeholder="ingrese su nombre" required>
                        <! campo tipo texto se reconoce como nombre en el $_Post, campo requerido y de fondo dice ingrese su nombre->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="password" name="contra" id="mi_imput_index" placeholder="ingrese contraseña" required>		<! campo tipo contraseña->	
                        </td>				
                    </tr>
                </tbody>
            </table>
        <br>	
                <input type="submit" value="Entrar" name="s1" id="s1_index">
                <! un boton el name no importa el value es el nombre isible este no se envia en el post->	
                <input type="hidden" name="accion" value="2">
                <! variable invisible aqui se utiliza para para enviar el valor de 2 a usuarios.php->	
        </form>
                <a href="pag/registro.php" title="" class="a_index"> registrate</a>
                <! un a es un texto con un link al oprimirlo->
        </div> 
</div>
    <!-- build:js main.js build/scripts -->
<script src="../node_modules/jquery/dist/jquery.min.js"></script>
<script src="../node_modules/materialize-css/dist/js/materialize.min.js"></script>  
<script src="main.js"></script>
<!-- endbuild -->

</section>
</body>
</html>