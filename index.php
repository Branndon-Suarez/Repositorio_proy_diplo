<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de notas</title>
</head>
<body>
    <h1>INICIO DE SESIÓN</h1>
    <form action="USUARIOS/Controladores/login.php" method="post"> 
        <label for="usuario">Usuario</label><br>
        <input type="text" name="usuario" placeholder="Digite el ID de su usuario" autocomplete="off" required><br><br>

        <label for="contrasena">Contraseña</label><br>
        <input type="password" name="contrasena" placeholder="Digite la contraseña" autocomplete="off" required><br><br>

        <input type="submit" value="Iniciar Sesión">
    
    </form>
</body>
</html>