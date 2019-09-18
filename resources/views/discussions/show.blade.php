@extends('layouts.app')

@section('content')
    <div class="card">

        @include('partials.discussions-header')

        <div class="card-body">
            <div class="text-center font-weight-bold">
                {{ $discussion->title }}
            </div>

            <hr>

            {!! $discussion->content !!}
        </div>
    </div>
@endsection
