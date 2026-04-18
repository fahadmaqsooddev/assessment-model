@extends('user.layouts.app')
@section('title','Dashboard')
@section('content')
    <!-- Content -->
    <main class="container my-4 content-area">
        <h1>Survey Questions</h1>
        
        <!-- Slider for percentage -->
        <div class="mb-4">
            <label for="progress-slider" class="form-label">Survey Progress:</label>
            <input type="range" class="slider" min="0" max="100" value="0" id="progress-slider" disabled>
            <div class="slider-label" id="progress-label">0%</div>
        </div>
        
        <form id="survey-form" action="{{ url('userdashboard') }}" method="POST">
            @csrf
            <div id="questions-container">
                @if(Session::has('msg'))
                    <div class="alert alert-success">{{ Session::get('msg') }}</div>
                @endif
                @if($questions)
                    @foreach($questions as $keys => $q)
                    <div class="question-container {{ $keys == 0 ? 'active' : '' }}" id="question{{$keys}}">
                        <h5>Question {{ $keys+1 }} : {{ $q->question }}</h5>
                         <input type="hidden" name="questions[]" value="{{ $q->id }}">
                        <div>
                           @if($q->choices)
                                @foreach($q->choices as $key=>$choice)
                                    <input type="radio" id="q{{$keys}}-o{{$key+1}}" name="answers[{{$keys}}]" value="{{ $choice->id }}">
                                    <label for="q{{$keys}}-o{{$key+1}}">{{ $choice->choice_text }}</label><br>
                                @endforeach
                            @endif
                        </div>
                        <div class="mt-3">
                            @if($keys > 0)
                                <button type="button" class="btn btn-secondary me-2" onclick="showPreviousQuestion()">Previous</button>
                            @endif

                            @if($keys < count($questions) - 1)
                                <button type="button" class="btn btn-primary" onclick="showNextQuestion()">Next</button>
                            @else
                                <button type="submit" class="btn btn-primary">Submit</button>
                            @endif
                        </div>
                    </div> 
                    @endforeach
                @endif
            </div>
        </form>
    </main>
@endsection

    <!-- Bootstrap JS and Dependencies -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
<script>
    // Variables
    let currentQuestion = 0;
    const totalQuestions = {{ $questions->count() }}; // Update based on the number of questions

    // Function to update the slider label
    function updateSliderLabel(value) {
        const slider = document.getElementById('progress-slider');
        const label = document.getElementById('progress-label');
        slider.value = value;
        label.textContent = value + '%';
    }

    // Function to check if an option is selected
    function isOptionSelected() {
        const currentQuestionContainer = document.getElementById(`question${currentQuestion}`);
        return currentQuestionContainer.querySelector('input[type="radio"]:checked') !== null;
    }

    // Function to enable or disable the Next button
    function toggleNextButton() {
        const nextButton = document.querySelector('.btn-primary'); // Select the "Next" button
        if (isOptionSelected()) {
            nextButton.disabled = false;
        } else {
            nextButton.disabled = true;
        }
    }

    // Function to show the next question
    function showNextQuestion() {
        if (isOptionSelected()) {
            document.getElementById(`question${currentQuestion}`).classList.remove('active');
            currentQuestion++;
            document.getElementById(`question${currentQuestion}`).classList.add('active');
            updateProgress();
        }
    }

    // Function to show the previous question
    function showPreviousQuestion() {
        if (currentQuestion > 0) {
            document.getElementById(`question${currentQuestion}`).classList.remove('active');
            currentQuestion--;
            document.getElementById(`question${currentQuestion}`).classList.add('active');
            updateProgress();
        }
    }

    // Function to update progress
    function updateProgress() {
        const percentage = Math.round(((currentQuestion) / totalQuestions) * 100);
        updateSliderLabel(percentage);
        toggleNextButton(); // Update button state on progress change
    }

    // Initial check on page load
    toggleNextButton();

    // Event listener for radio button changes to update the "Next" button state
    document.querySelectorAll('input[type="radio"]').forEach(radio => {
        radio.addEventListener('change', toggleNextButton);
    });
</script>

