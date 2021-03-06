@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>All Questions</h2>
                        <div class="ml-auto">
                            <a href="{{ route('questions.create') }}" class="btn btn-outline-secondary">Ask Questions</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @include('layouts._messages')
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
                            <div class="d-flex align-items-center">
                                <h3 class="mt-0"><a href="{{ $question->url }}">{{ $question->title }}</a></h3>
                                <div class="ml-auto">
                                    <a href="{{ route('questions.edit', $question->id) }}" class="btn btn-sm btn-outline-info">Edit</a>
                                    <form class="form-delete" action="{{ route('questions.destroy', $question->id) }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are your sure?')">Delete</button>
                                    </form>
                                </div>
                            </div>
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