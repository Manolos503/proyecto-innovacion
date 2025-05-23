@extends('layouts.base')

@php
    $breadcrumbs = [
        ['title' => 'Orientación Vocacional', 'url' => route('index')],
    ];
    $pageTitle = 'Evaluación';
@endphp

@section('content')
    <div class="d-flex flex-column gap-1">
        <h3 class="fw-bold text-danger-emphasis mb-0">Evaluación vocacional</h3>
    </div>

    <div class="container py-5 d-flex flex-column" style="height: 80vh;">
        <!-- Chat Scrollable -->
        <div id="chat-history" class="flex-grow-1 overflow-auto d-flex flex-column gap-3 py-4" style="scroll-behavior: smooth;">
        </div>
        <!-- Pregunta y botones abajo -->
        <div id="question-container" class="d-flex flex-column gap-3 justify-content-center pt-3 border-top">
            <div class="p-3 rounded shadow-sm d-inline-block text-bot align-self-start">
                <p id="question-text" class="mb-0 fw-bold">Cargando...</p>
            </div>
            <div class="d-flex justify-content-center gap-4 mt-3">
                <button onclick="answer(true)" class="btn btn-orange btn-lg px-5 py-3 fw-bold">Sí</button>
                <button onclick="answer(false)" class="btn btn-yellow btn-lg px-5 py-3 fw-bold">No</button>
            </div>
        </div>
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

    <script>
        let questions = @json($questions);
        let currentQuestionIndex = 0;

        function showQuestion() {
            const questionText = document.getElementById('question-text');
            questionText.textContent = ''; // Limpia texto anterior

            if (currentQuestionIndex < questions.length) {
                const q = questions[currentQuestionIndex];
                let index = 0;

                const typeWriter = setInterval(() => {
                    if (index < q.description.length) {
                        questionText.textContent += q.description.charAt(index);
                        index++;
                    } else {
                        clearInterval(typeWriter);
                    }
                }, 30); // velocidad ajustable

            } else {
                questionText.textContent = '¡Gracias por completar el test!';
                document.querySelectorAll('button').forEach(btn => btn.style.display = 'none');
            }
        }

        function answer(selection) {
            const question = questions[currentQuestionIndex];
            const chatHistory = document.getElementById('chat-history');

            // Bot (pregunta)
            const botMsg = document.createElement('div');
            botMsg.className = 'p-3 rounded shadow-sm d-inline-block text-bot align-self-start';
            botMsg.innerHTML = `<p class="mb-0 fw-bold">${question.description}</p>`;
            chatHistory.appendChild(botMsg);

           // Usuario (respuesta)
            const userMsg = document.createElement('div');
            userMsg.className = `p-3 rounded shadow-sm d-inline-block text-user align-self-end ${
                selection ? 'btn btn-orange btn-lg px-5 py-3 fw-bold' : 'btn btn-yellow btn-lg px-5 py-3 fw-bold'
            }`;
            userMsg.innerHTML = `<p class="mb-0">${selection ? 'Sí' : 'No'}</p>`;
            chatHistory.appendChild(userMsg);
            
            chatHistory.scrollTop = chatHistory.scrollHeight;

            fetch('{{ route("test.save") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                body: JSON.stringify({
                    question_id: question.id,
                    selection: selection
                })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    currentQuestionIndex++;
                    showQuestion();
                } else {
                    alert('Error al guardar respuesta.');
                    console.error(data.errors);
                }
            })
            .catch(error => {
                console.error('Fetch error:', error);
                alert('Error de conexión al servidor.');
            });
        }

        showQuestion();
    </script>

@endsection
