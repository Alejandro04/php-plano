<?php
include_once "base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT * FROM estudiantes;");
$estudiantes = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Estudiantes</title>
	<style>
	table, th, td {
	    border: 1px solid black;
	}
	</style>
</head>
<body>
	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Apellidos</th>
				<th>Género</th>
				<th>Editar</th>
				<th>Eliminar</th>
			</tr>
		</thead>
		<tbody>

			<?php foreach($estudiantes as $est){ ?>
			<tr>
				<td><?php echo $est->id ?></td>
				<td><?php echo $est->nombre ?></td>
				<td><?php echo $est->apellidos ?></td>
				<td><?php echo $est->sexo ?></td>
				<td><a href="<?php echo "editar.php?id=" . $est->id?>">Editar</a></td>
				<td><a href="<?php echo "eliminar.php?id=" . $est->id?>">Eliminar</a></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</body>
</html>