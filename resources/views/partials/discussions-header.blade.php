<div class="card-header">
    <div class="d-flex justify-content-between">

        <div>
{{--            {{ Gravatar::src($discussion->author->email) }}--}}
            <img src="" width="40px" height="40px"
                 style="border-radius: 50%" alt="Gravatar Remember">
            <strong class="ml-2">{{ $discussion->author->name }}</strong>
        </div>

        <div>
            <a href="{{ route('discussions.show', $discussion->slug) }}"
               class="btn btn-success btn-sm">View</a>
        </div>

    </div>
</div>
