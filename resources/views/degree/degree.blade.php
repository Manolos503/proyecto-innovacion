@extends('layouts.base')

@php
    $breadcrumbs = [
        ['title' => 'Orientación Vocacional', 'url' => route('index')],
    ];
    $pageTitle = 'Carreras';
@endphp

@section('content')
    <div class="d-flex flex-column gap-1">
        <h3 class="fw-bold text-danger-emphasis mb-0">Carreras</h3>
        <p class="mb-0">
           Bienvenido a la sección de carreras, donde podrás explorar las distintas opciones que ofrece ITCA-FEPADE.
        </p>
    </div>
          
    <div class="container mt-4">
        <div class="row search-box">
            <div class="col-md-6 offset-md-3">
                <input type="text" id="searchInput" class="form-control" placeholder="Buscar carrera...">
            </div>
        </div>

        <h2 class="">Escuela de Ingeniería</h2>
        <div class="card mb-3 career-card">
            <div class="card-body">
                <h5 class="card-title">Carreras</h5>
                <ul>
                    <li>Técnico en Ingeniería Civil</li>
                    <li>Técnico en Ingeniería Eléctrica</li>
                    <li>Técnico en Ingeniería Mecánica</li>
                </ul>
            </div>
        </div>

        <h2 class="school-title">Escuela de Tecnología de la Información</h2>
        <div class="card mb-3 career-card">
            <div class="card-body">
                <h5 class="card-title">Carreras</h5>
                <ul>
                    <li>Técnico en Ingeniería en Computación</li>
                    <li>Técnico en Desarrollo de Software</li>
                    <li>Técnico en Redes Informáticas</li>
                </ul>
            </div>
        </div>

        <h2 class="school-title">Escuela de Ciencias Empresariales</h2>
        <div class="card mb-3 career-card">
            <div class="card-body">
                <h5 class="card-title">Carreras</h5>
                <ul>
                    <li>Técnico en Administración de Empresas</li>
                    <li>Técnico en Contaduría</li>
                    <li>Técnico en Mercadeo</li>
                </ul>
            </div>
        </div>

        <h2 class="school-title">Escuela de Idiomas</h2>
        <div class="card mb-3 career-card">
            <div class="card-body">
                <h5 class="card-title">Carreras</h5>
                <ul>
                    <li>Técnico en Inglés</li>
                    <li>Técnico en Traducción Inglés-Español</li>
                </ul>
            </div>
        </div>
    </div>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function normalizeText(text) {
            return text.normalize('NFD').replace(/[\u0300-\u036f]/g, "").toLowerCase();
        }

        document.getElementById('searchInput').addEventListener('input', function () {
            const searchValue = normalizeText(this.value);
            const cards = document.querySelectorAll('.career-card');

            cards.forEach(card => {
                const listItems = card.querySelectorAll('li');
                let cardHasMatch = false;

                listItems.forEach(item => {
                    const itemText = normalizeText(item.textContent);
                    const matches = itemText.includes(searchValue);
                    item.style.display = matches ? 'list-item' : 'none';
                    if (matches) cardHasMatch = true;
                });

                card.style.display = cardHasMatch ? 'block' : 'none';
            });
        });
    </script>
    <footer class="text-white text-center mt-5 py-3" style="background-color:rgb(189, 48, 1);">
        © {{ date('Y') }} ITCA-FEPADE - Sede Santa Tecla. Todos los derechos reservados.
    </footer>
@endsection

