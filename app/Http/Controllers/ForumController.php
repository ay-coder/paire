<?php

namespace App\Http\Controllers;

use App\Forum;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forums = Forum::with('forum_reply','User','Reaction')->get();
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
            'topic' => 'required|min:2',
            'description' => 'required'
        ]);
        //dd($request);
        $forum = new Forum();
        return $forum->insertAction($request);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Forums  $forums
     * @return \Illuminate\Http\Response
     */
    public function show(Forums $forums)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Forums  $forums
     * @return \Illuminate\Http\Response
     */
    public function edit(Forums $forums)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Forums  $forums
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Forums $forums)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Forums  $forums
     * @return \Illuminate\Http\Response
     */
    public function destroy(Forums $forums)
    {
        //
    }
    static function calculate_time_span($date){
        $seconds  = strtotime(date('Y-m-d H:i:s')) - strtotime($date);

        $months = floor($seconds / (3600*24*30));
        $day = floor($seconds / (3600*24));
        $hours = floor($seconds / 3600);
        $mins = floor(($seconds - ($hours*3600)) / 60);
        $secs = floor($seconds % 60);

        /*if($seconds < 60)
            $time = $secs." seconds ago";
        else if($seconds < 60*60 )
            $time = $mins." min ago";
        else if($seconds < 24*60*60)
            $time = $hours." hours ago";
        else if($seconds < 24*60*60)
            $time = $day." day ago";
        else
            $time = $months." month ago";*/
        $time = $day." day(s) ago";
        return $time;
    }
}
