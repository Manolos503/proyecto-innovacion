<!DOCTYPE html>
<html>
<head>
    <title>Saludo con Rasa</title>
</head>
<body>
    <h1>Formulario de saludo</h1>

    <form action="{{ url('/enviar-nombre') }}" method="POST">
        @csrf
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        <button type="submit">Enviar</button>
    </form>

    @if(isset($saludo))
        <h2>{{ $saludo }}</h2>
    @endif
</body>
</html>