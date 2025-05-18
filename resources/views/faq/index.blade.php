@extends('layouts.base')

@section('content')
<div class="d-flex flex-column gap-1">
    <h3 class="display-6 fw-bold mb-0">Preguntas Frecuentes</h3>
    <p class="fs-6 mb-0">
      Bienvenido a la sección de preguntas frecuentes. Si no encuentras lo que buscas,
      puedes escribirnos al correo <strong>neftalihrramos@gmail.com</strong> y con gusto te atenderemos.
    </p>
</div>

<div class="accordion accordion-flush py-5" id="accordionFlushExample">
    @foreach ($faqs as $index => $faq)
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-heading{{ $index }}">
                <button class="accordion-button collapsed fw-bold" type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#flush-collapse{{ $index }}"
                        aria-expanded="false"
                        aria-controls="flush-collapse{{ $index }}">
                    {{ $faq['question'] }}
                </button>
            </h2>
            <div id="flush-collapse{{ $index }}"
                 class="accordion-collapse collapse"
                 aria-labelledby="flush-heading{{ $index }}"
                 data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    {{ $faq['answer'] }}
                </div>
            </div>
        </div>
    @endforeach
</div>


@endsection
