<?php

namespace DiscussIt\Http\Controllers;

use DiscussIt\Discussion;
use DiscussIt\Http\Requests\CreateRepliesRequest;
use DiscussIt\Notifications\NewReplyAdded;
use Illuminate\Http\Request;

class RepliesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRepliesRequest $request
     * @param Discussion $discussion
     * @return void
     */
    public function store(CreateRepliesRequest $request, Discussion $discussion)
    {
        $data = $request->only('reply');
        $data['user_id'] = auth()->user()->id;

        $discussion->replies()->create($data);

        #SEND NOTIFICATION
        if (!$discussion->author->id === auth()->user()->id) {
            $discussion->author->notify(new NewReplyAdded($discussion));
        }

        session()->flash('success', 'Reply Added');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
