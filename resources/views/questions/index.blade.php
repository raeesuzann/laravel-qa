@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Questions</div>

                <div class="card-body">
                    @foreach ($questions as $question)
                    <div class="media">
                        <div class="d-flex flex-column counters">
                            <div class="vote">
                                <strong>{{ $question->votes }}</strong> {{ trans_choice('questions.vote', $question->votes) }}
                            </div>
                            <div class="status {{ $question->status }}">
                                <strong>{{ $question->answers }}</strong> {{ trans_choice('questions.answer', $question->answers) }}
                            </div>
                            <div class="view">
                                {{ $question->votes . " " . trans_choice('questions.vote', $question->votes) }}
                            </div>
                        </div>
                        <div class="media-body">
                            <h3 class="mt-0"><a href="{{ $question->url }}">{{ $question->title }}</a></h3>
                            <p class="lead">
                                Asked by
                                <a href="{{ $question->user->url }}">{{ $question->user->name }}</a>
                                <small class="text-muted">{{ $question->created_date }}</small>
                            </p>
                            {{ str_limit($question->body, 250) }}
                        </div>
                    </div>
                    <hr>
                    @endforeach
                </div>
                <div class="mx-auto">
                    {{ $questions->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection