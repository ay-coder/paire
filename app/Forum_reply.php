<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Forum_reply extends Model
{

    public function Forum()
    {
        return $this->belongsTo(Forum::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Notification()
    {
        return $this->hasMany(Notification::class);
    }

    public function insertAction($request)
    {

        $forumReply = new Forum_reply();
        $forumReply->forum_id = $request->input('forum-id');
        $forumReply->user_id = Auth::user()->id;
        $forumReply->content = $request->input('content');

        if($forumReply->save())
        {
            $notifications = new Notification();
            $lastInsertId = $forumReply->id;
            return $notifications->insetAction($lastInsertId);
            /*$request->session()->flash('success', 'Reply has been made.');
            return redirect('forum');*/

        }
        else{
            $request->session()->flash('error', 'Error posting Reply.');
            return redirect('forum');
        }
    }
}
