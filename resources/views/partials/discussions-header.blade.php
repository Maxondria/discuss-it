<div class="card-header">
    <div class="d-flex justify-content-between">

        <div>

            <img src="{{ Gravatar::src($discussion->author->email) }}" width="40px" height="40px"
                 style="border-radius: 50%" alt="User Image">
            <strong class="ml-2">{{ $discussion->author->name }}</strong>
        </div>

        <div>
            <a href="{{ route('discussions.show', $discussion->slug) }}"
               class="btn btn-success btn-sm">View</a>
        </div>

    </div>
</div>
