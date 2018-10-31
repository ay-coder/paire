<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Reaction extends Model
{
    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Forum()
    {
        return $this->belongsTo(Forum::class);
    }

    public function insertAction($request, $likeOrDislike)
    {
        $reaction = new Reaction();
        $reaction->user_id = Auth::user()->id;
        $reaction->forum_id = $request->input('forumId');
        $reaction->reaction = $likeOrDislike;

        if ($reaction->save()) {
            return redirect('forum');
        } else {
            return redirect('forum');
        }
    }

    public function checkBeforeInsert($request)
    {
        $reactions = $request->input('reaction');
        ($reactions == 'like') ? $reaction = 1 : $reaction = 0;
        $reactionCheck = Reaction::where([
            ['user_id', Auth::user()->id],
            ['forum_id', $request->input('forumId')]])->first();
        if (count($reactionCheck) == 0) {
            $this->insertAction($request, $reaction);
        }
        else{
            Reaction::where('id',$reactionCheck->id)->update(['reaction'=>$reaction]);
            return redirect('forum');
        }
    }
}
