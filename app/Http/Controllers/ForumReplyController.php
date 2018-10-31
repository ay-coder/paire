<?php

namespace App\Http\Controllers;

use App\Forum;
use App\Forum_reply;
use Illuminate\Http\Request;

class ForumReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forums = Forum::with('forum_reply','User')->get();
        return view('forums',compact('forums'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'forum-id' => 'required',
            'content' => 'required'
        ]);
        $forumReply = new Forum_reply();
        $forumReply->insertAction($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Forum_reply  $forum_reply
     * @return \Illuminate\Http\Response
     */
    public function show(Forum_reply $forum_reply)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Forum_reply  $forum_reply
     * @return \Illuminate\Http\Response
     */
    public function edit(Forum_reply $forum_reply)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Forum_reply  $forum_reply
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Forum_reply $forum_reply)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Forum_reply  $forum_reply
     * @return \Illuminate\Http\Response
     */
    public function destroy(Forum_reply $forum_reply)
    {
        //
    }
}
