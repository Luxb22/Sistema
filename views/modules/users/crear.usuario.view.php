<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Crear Usuario</title>
</head>
<body>
    <h1>Crear Nuevo Usuario</h1>
    <form action="" method="POST">
        <label for="nombre">Codigo del Rol:</label>
        <input type="text" name="rolCode" required>
        <br><br>
        <label for="nombre">Nombre del Usuario:</label>
        <input type="text" name="userName" required>
        <br><br>
        <label for="apellido">Apellido del Usuario:</label>
        <input type="text" name="userLastname" required>
        <br><br>
        <label for="id">Cedula del Usuario:</label>
        <input type="number" name="userId" required>
        <br><br>
        <label for="email">Email del Usuario:</label>
        <input type="email" name="userMail" required>
        <br><br>
        <label for="telefono">Telefono del Usuario:</label>
        <input type="number" name="userPhone" required>
        <br><br>
        <label for="password">Clave del Usuario:</label>
        <input type="password" name="userPassword" required>
        <br><br>
        <select name="userStatus" id="userStatus">
            <option value ="1">Activo</option>
            <option value ="0">Inactivo</option>
        </select>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>