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
    <title>Document</title>
</head>
<body>
<table>
		<caption>Materias</caption>
		<thead>
			<tr>
				<th>Seleccione una opcion</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>
                    <a href="?">Listar Materias</a>
                </td>
            </tr>
            <tr>
				<td>
                <a href="registro_materia.php">Registrar Materia</a>                    
                </td>
            </tr>
            <tr>
				<td>
                <a href="?">Editar Materia</a>                    
                </td>
            </tr>
            <tr>
				<td>
                <a href="?">Eliminar Materia</a>                    
                </td>
            </tr>
		</tbody>
	</table>
</body>
</html>