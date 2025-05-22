@extends('layouts.base')

@section('content')
    <div class="d-flex flex-column gap-1">
        <h3 class="fw-bold text-danger-emphasis mb-0">Evaluación vocacional</h3>
    </div>

    @if(count($questions)>0)
        <ul class="py-5 d-flex flex-column gap-3 align-items-start">
            @foreach($questions as $question)
                <div class="p-3 rounded shadow-sm d-inline-block text-bot">
                    <p class="mb-0 fw-bold">{{ $question['description'] }}</p>
                </div>
            @endforeach
        </ul>
    @else
        <p class="text-muted mt-3">No hay preguntas disponibles.</p>
    @endif    
    
    <div class="d-flex justify-content-center gap-4 mt-5">
        <a href="#" class="btn btn-orange btn-lg px-5 py-3 fw-bold">Sí</a>
        <a href="#" class="btn btn-yellow btn-lg px-5 py-3 fw-bold">No</a>
    </div>

    
    <x-modal 
        id="welcomeModal"
        title="Información"
        :message="
            '
                A continuación, se te harán una serie de preguntas en las que deberás responder con <strong>Sí</strong> o <strong>No</strong>.<br>¡Suerte!
            '
        "
        button-text="Aceptar" 
    />
    
@endsection
