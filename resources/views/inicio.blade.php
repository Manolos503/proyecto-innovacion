
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Vocacional - ITCA FEPADE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #fff;
        }
        .btn-iniciar {
            background-color: #d56541;
            color: #fff;
            border: none;
        }
        .btn-iniciar:hover {
            background-color: #c25530;
        }
        .highlight-orange {
            color: #f29325;
        }
        .highlight-red {
            color: #a23225;
        }
    </style>
</head>
<body>
    @include('menu')
    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="border p-5 rounded shadow-sm w-1000" style="max-width: 1000px;">
            <div class="row align-items-center">
                <!-- Logo ITCA -->
                <div class="col-md-5 text-center">
                    <img src="{{ asset('../images/logoitca.png') }}" alt="Logo ITCA FEPADE" class="img-fluid" style="max-width: 200px;">
                </div>
                <!-- Texto de bienvenida -->
                <div class="col-md-7 text-center text-md-start">
                    <h3 class="mb-3">
                        <span class="highlight-red">¿Estás listo</span><br>
                        <span class="highlight-orange">para tu</span><br>
                        <span class="highlight-red">test vocacional?</span>
                    </h3>
                    <p class="mb-4">
                        ¿Tienes dudas sobre qué carrera estudiar? ¡No te preocupes! Realiza nuestro test vocacional y te ayudaremos a orientarte para elegir la carrera ideal para ti.
                    </p>
                    <a href="" class="btn btn-iniciar px-4 py-2">Iniciar</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>