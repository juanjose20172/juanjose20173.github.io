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
    <title>Directores</title>
</head>
<body>
<table>
		<caption>Cursos</caption>
		<thead>
			<tr>
				<th>Seleccione una opcion</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>
                    <a href="?">Listar Cursos</a>
                </td>
            </tr>
            <tr>
				<td>
                <a href="registro_director.php">Registrar Director</a>                    
                </td>
            </tr>
            <tr>
				<td>
                <a href="?">Editar Curso</a>                    
                </td>
            </tr>
            <tr>
				<td>
                <a href="?">Eliminar Curso</a>                    
                </td>
            </tr>
		</tbody>
	</table>
</body>
</html>