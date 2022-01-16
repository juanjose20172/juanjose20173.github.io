<?php
session_start();
if (!isset($_SESSION['usuario_n']))header('location:../index.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Seleccion_registro</title>
</head>
<body>
<table>
		<caption>Registro</caption>
		<thead>
			<tr>
				<th>Seleccione una opcion</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>
                    <a href="registro_profesor.php">Registrar Profesor</a>
                </td>
            </tr>
            <tr>
				<td>
                <a href="registro_materia.php">Registrar Estudiante</a>                    
                </td>
            </tr>
            <tr>
				<td>
                <a href="?">Resgistrar Personal</a>                    
                </td>
            </tr>
         
		</tbody>
	</table>
</body>
</html>