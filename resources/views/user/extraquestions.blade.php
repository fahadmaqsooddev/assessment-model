@extends('user.layouts.app')
@section('title', 'Dashboard')
@section('content')
    <!-- Content -->
    <main class="container my-4 content-area">
        <h1>Survey Questions</h1>
        
        <!-- Slider for percentage -->
        <form id="survey-form" action="{{ url('/resextra') }}" method="POST">
            @csrf
            <div id="questions-container2">
                @if(Session::has('msg'))
                    <div class="alert alert-success">{{ Session::get('msg') }}</div>
                @endif
                @if($questions)
                    @foreach($questions as $key => $q)
                        <div class="question-container2" id="question{{$key}}">
                            <h6>Question {{ $key + 1 }}: {{ $q->question }}</h6>
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="questions[{{ $q->id }}] " value="{{ $q->id }}">
                            <div class="form-group">
                                @if($q->question_type == "text")
                                    <input type="text" name="answers[{{ $q->id }}]" class="form-control" required>
                                @elseif($q->question_type == "range")
                                    <input type="range" name="answers[{{ $q->id }}]" min="{{ $q->min_range }}" max="{{ $q->max_range }}" class="form-range" value="{{ $q->min_range }}" required>
                                    <span id="range-value{{$key}}"></span>
                                @endif
                            </div> 
                        </div>
                    @endforeach
                @else
                    <div class="alert alert-warning">No questions available.</div>
                @endif
            </div>

            <button type="submit" class="btn btn-primary mt-3">Submit Survey</button>
        </form>
    </main>

    <!-- Bootstrap JS and Dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

    <script>
        // Update range value display
        document.querySelectorAll('input[type="range"]').forEach((input) => {
            const display = document.createElement('span');
            display.textContent = input.value;
            input.parentElement.appendChild(display);

            input.addEventListener('input', () => {
                display.textContent = input.value;
            });
        });
    </script>
@endsection
