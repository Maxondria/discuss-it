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

            @if($discussion->bestReply)

                <div class="card bg-success my-5" style="color: white">
                    <div class="card-header bg-primary d-flex justify-content-between">

                        <div>
                            <img width="40px" height="40px" style="border-radius: 50%"
                                 src="{{ Gravatar::src($discussion->bestReply->author->email) }}" alt="">

                            <strong class="ml-2"> {{ $discussion->bestReply->author->name }} </strong>
                        </div>

                        <div>
                            <strong>BEST REPLY</strong>
                        </div>

                    </div>

                    <div class="card-body">
                        {!! $discussion->bestReply->reply !!}
                    </div>

                    @endif
                </div>

        </div>

        @foreach($discussion->replies()->paginate(3) as $reply)
            <div class="card my-3">
                <div class="card-header">
                    <div class="d-flex justify-content-between">

                        <div>

                            <img src="{{ Gravatar::src($reply->author->email) }}" width="40px" height="40px"
                                 style="border-radius: 50%" alt="User Image">
                            <strong class="ml-2">{{ $reply->author->name }}</strong>
                        </div>

                        <div>
                            @auth

                                @if($discussion->bestReply->id !== $reply->id)

                                    @if(auth()->user()->id === $discussion->user_id)
                                        <form
                                            action="{{ route('discussions.best-reply', [
                                'discussion' => $discussion->slug,
                                'reply'=>$reply->id
                                ]) }}"
                                            method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-primary">Mark As Best Reply
                                            </button>
                                        </form>
                                    @endif

                                @endif

                            @endauth

                        </div>

                    </div>
                </div>
                <div class="card-body">
                <span style="color: darkgreen">
                    {!! $reply->reply !!}
                </span>
                </div>
            </div>
        @endforeach
        {{ $discussion->replies()->paginate(3)->links() }}

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
