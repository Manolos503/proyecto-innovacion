<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Usuario no encontrado</title>
</head>
<body>
    <h1>Usuario no registrado</h1>
    <p>El correo <strong>{{ $email }}</strong> no está registrado en nuestra base de datos.</p>
    <p>Por favor contacta al administrador o solicita acceso.</p>
    <a href="{{ route('index') }}">Volver al inicio</a>
</body>
</html>