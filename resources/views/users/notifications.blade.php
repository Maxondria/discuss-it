@extends('layouts.app')

@section('content')

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Notifications</div>

            <div class="card-body">
                <ul class="list-group">

                    @foreach($notifications as $notification)

                        <li class="list-group-item">
                            @if($notification->type === 'DiscussIt\Notifications\NewReplyAdded')
                                A new reply was added to your discussion:

                                <strong
                                    style="color: darkgreen">{{ $notification->data['discussion']['title'] }}</strong>

                                <a href="{{ route('discussions.show', $notification->data['discussion']['slug']) }}"
                                   style="width: 30%" class="btn btn-sm btn-info text-center float-right">
                                    View Discussion
                                </a>
                            @endif
                        </li>

                    @endforeach

                </ul>
            </div>
        </div>
    </div>

@endsection
