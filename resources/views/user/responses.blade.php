@extends('user.layouts.app')
@section('title', 'Responses')
@section('content')
<main class="container my-4 content-area">
    @if($responses->isNotEmpty())
        @php
            $displayedCategories = []; // Array to track displayed categories
        @endphp
        @foreach($responses as $key => $r)
            @php
                $categoryName = $r->question->category->name; // Get the category name
            @endphp
            
            @if(!in_array($categoryName, $displayedCategories)) {{-- Check if category has been displayed --}}
                <div class="row mt-2">
                    <div class="col-md-12">
                        <h5 class="bg-primary text-white p-2">Category : {{ $categoryName }}</h5>
                        @php
                            $displayedCategories[] = $categoryName; // Add to displayed categories
                        @endphp
                    </div>
                </div>
            @endif

            <div class="row">
                <div class="col-md-12">
                    <h6>Question {{ $key + 1 }}: {{ $r->question->question }}</h6>
                    <p>Selected Answer  {{ $key + 1 }}: {{ $r->choice->choice_text }}</p>
                </div>
            </div>
        @endforeach
    @endif
</main>
@endsection
