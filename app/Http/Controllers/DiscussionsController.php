<?php

namespace DiscussIt\Http\Controllers;

use DiscussIt\Reply;
use Illuminate\Http\Request;
use DiscussIt\Discussion;
use DiscussIt\Http\Requests\CreateDiscussionsRequest;

class DiscussionsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only(['create', 'store', 'update', 'edit', 'destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        return view('discussions.index', [
            'discussions' => Discussion::filterByChannels()->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('discussions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateDiscussionsRequest $request
     * @return void
     */
    public function store(CreateDiscussionsRequest $request)
    {
        $data = $request->only(['title', 'content', 'channel_id']);
        $data['slug'] = str_slug($request->title);
        auth()->user()->discussions()->create($data);
        session()->flash('success', 'Discussion created successfully');
        return redirect()->route('discussions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Discussion $discussion
     * @return void
     */
    public function show(Discussion $discussion)
    {
        return view('discussions.show', ['discussion' => $discussion]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return void
     */
    public function destroy($id)
    {
        //
    }

    /**
     * @param Discussion $discussion
     * @param Reply $reply
     * Notify the owner of the reply that their reply was voted the best
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reply(Discussion $discussion, Reply $reply)
    {
        $discussion->markAsBestReply($reply);
        session()->flash('success', 'Marked As Best Reply');
        return redirect()->back();
    }
}
