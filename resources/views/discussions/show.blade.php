@extends('layouts.app')

@section('content')
    <div class="card mb-2">

        @include('partials.discussions-header')

        <div class="card-body">
            <div class="text-center font-weight-bold">
                {{ $discussion->title }}
            </div>

            <hr>

            {!! $discussion->content !!}
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            Add A Reply
        </div>

        <div class="card-body">

            @auth

                <form action="{{ route('replies.store', $discussion->slug) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input id="reply" type="hidden" name="reply">
                        <trix-editor input="reply"></trix-editor>
                    </div>

                    <button type="submit" class="btn btn-success btn-sm my-2">
                        Create Reply
                    </button>
                </form>

            @else

                <a href="{{ route('login') }}" class="btn btn-info">
                    Sign In To Add A Reply
                </a>

            @endauth

        </div>
    </div>
@endsection


@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.css">
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.js"></script>
@endsection
