<?php
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT * FROM estudiantes WHERE id = ?;");
$sentencia->execute([$id]);
$estudiante = $sentencia->fetch(PDO::FETCH_OBJ);
if($estudiante === FALSE){
	echo "¡No existe algun estudiante con ese ID!";
	exit();
}

#Si el estudiante existe:
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Actualizar Estudiante</title>
</head>
<body>
	<form method="post" action="guardarDatosEditados.php">
		<input type="hidden" name="id" value="<?php echo $estudiante->id; ?>">

		<label for="nombre">Nombre:</label>
		<br>
		<input value="<?php echo $estudiante->nombre ?>" name="nombre" required type="text" id="nombre" placeholder="Escribe tu nombre...">
		<br><br>
		<label for="apellidos">Apellidos:</label>
		<br>
		<input value="<?php echo $estudiante->apellidos ?>" name="apellidos" required type="text" id="apellidos" placeholder="Escribe tus apellidos...">
		<br><br>
		<label for="sexo">Género</label>
		<select name="sexo" required name="sexo" id="sexo">
			<option value="">--Selecciona--</option>
			<option <?php echo $estudiante->sexo === 'M' ? "selected='selected'": "" ?> value="M">Masculino</option>
			<option <?php echo $estudiante->sexo === 'F' ? "selected='selected'": "" ?> value="F">Femenino</option>
		</select>
		<br><br><input type="submit" value="Guardar cambios">
	</form>
</body>
</html>