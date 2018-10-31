<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Forum extends Model
{
    protected $dates = ['deleted_at'];
    use SoftDeletes;

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Forum_reply()
    {
        return $this->hasMany(Forum_reply::class);
    }

    public function Reaction()
    {
        return $this->hasMany(Reaction::class);
    }

    public function insertAction($request)
    {
        $forum = new Forum();
        $forum->topic = $request->input('topic');
        $forum->user_id = Auth::user()->id;
        $forum->description = $request->input('description');
        $forum->status = 1;
        $forum->likes = 0;
        $forum->dislikes = 0;

        if($forum->save())
        {
            $request->session()->flash('success', 'Forum has been created.');
            return redirect('forum');
        }
        else{
            $request->session()->flash('error', 'Error saving Forum.');
            return redirect('forum');
        }
    }
}
