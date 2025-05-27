@extends('layouts.base')

@section('content')
<div class="container mt-4">
    <h2 class="school-title">Información Institucional</h2>
    <div class="accordion" id="infoAccordion">

        <!-- Historia y compromiso -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingIntro">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseIntro" aria-expanded="true" aria-controls="collapseIntro">
                    Sobre ITCA-FEPADE
                </button>
            </h2>
            <div id="collapseIntro" class="accordion-collapse collapse show" aria-labelledby="headingIntro" data-bs-parent="#infoAccordion">
                <div class="accordion-body">
                    <p>
                        La Escuela Especializada en Ingeniería ITCA-FEPADE cuenta con una reconocida trayectoria académica, camino sustentado por el esfuerzo y la visión que dio paso a la concretización de su objetivo de fundación: impulsar la capacitación y el recurso humano de El Salvador.
                    </p>
                    <p>
                        Estamos comprometidos con la calidad académica, la empresarialidad y la pertinencia de nuestra oferta educativa, por ello, hemos desarrollado un modelo educativo que se caracteriza en la constante innovación del sistema de enseñanza aprendizaje, en la actualización de la tecnología y la formación del personal docente, con el fin que nuestros estudiantes obtengan las mejores oportunidades en el mercado laboral.
                    </p>
                    <p>
                        Día a día seguimos viendo más allá de las adversidades y nos comprometemos a trabajar en pro de la educación, orientada a la empleabilidad y la productividad, porque solo con una educación de calidad podemos garantizar el progreso de nuestro país.
                    </p>
                </div>
            </div>
        </div>

        <!-- Video -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingVideo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseVideo" aria-expanded="false" aria-controls="collapseVideo">
                    Video Institucional
                </button>
            </h2>
            <div id="collapseVideo" class="accordion-collapse collapse" aria-labelledby="headingVideo" data-bs-parent="#infoAccordion">
                <div class="accordion-body text-center">
                    <div class="ratio ratio-16x9">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/tY-G01WADnY?si=ZwgN8df_p5uKBtop" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>

        <!-- Misión, Visión y Valores -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingMvv">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMvv" aria-expanded="false" aria-controls="collapseMvv">
                    Misión, Visión y Valores
                </button>
            </h2>
            <div id="collapseMvv" class="accordion-collapse collapse" aria-labelledby="headingMvv" data-bs-parent="#infoAccordion">
                <div class="accordion-body">
                    <h5>Misión</h5>
                    <p>Formar profesionales integrales y competentes en las áreas tecnológicas que tengan demanda y oportunidad en el mercado local, regional y mundial tanto como trabajadores y como empresarios.</p>
                    <h5>Visión</h5>
                    <p>Ser una institución educativa líder en educación tecnológica a nivel nacional y regional, comprometida con la calidad, la empresarialidad y la pertinencia de nuestra oferta educativa.</p>
                    <h5>Valores</h5>
                    <ul>
                        <li>Excelencia</li>
                        <li>Integridad</li>
                        <li>Espiritualidad</li>
                        <li>Cooperación</li>
                        <li>Comunicación</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Métodos de Enseñanza -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingMetodo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMetodo" aria-expanded="false" aria-controls="collapseMetodo">
                    Métodos de Enseñanza
                </button>
            </h2>
            <div id="collapseMetodo" class="accordion-collapse collapse" aria-labelledby="headingMetodo" data-bs-parent="#infoAccordion">
                <div class="accordion-body">
                    <h5>“Aprender – haciendo”</h5>
                    <p>
                        El éxito de los profesionales de ITCA-FEPADE es el modelo “Aprender-Haciendo”, que combina la teoría con la práctica en talleres y laboratorios, y posteriormente en ambientes reales gracias a la vinculación Universidad – Empresa.
                    </p>
                    <h5>Enseñanza Dual</h5>
                    <p>
                        Implementado en 2006 con apoyo de la Cooperación Alemana, el Sistema Dual permite a los estudiantes combinar dos meses de teoría en ITCA y dos meses de práctica en empresas. Todos reciben becas y experiencia laboral real.
                    </p>
                </div>
            </div>
        </div>

    </div>
</div>

<footer class="text-white text-center mt-5 py-3" style="background-color:rgb(189, 48, 1);">
    © {{ date('Y') }} ITCA-FEPADE - Sede Santa Tecla. Todos los derechos reservados.
</footer>
@endsection