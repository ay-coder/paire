<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Notification extends Model
{
    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function Forum_reply()
    {
        return $this->belongsTo(Forum_reply::class);
    }
    public function insetAction($lastInsertId)
    {
        $notification = new Notification();
        $notification->user_id = Auth::user()->id;
        $notification->forum_reply_id = $lastInsertId;
        $notification->status = 0;
        if($notification->save())
        {
            return redirect('forum');
        }
    }

    public function readAll()
    {
        $userId = Auth::user()->id ;
        $notifications = Notification::where([['user_id',$userId],['status',0]])
            ->update([
                'status' => 1
            ]);
        return redirect('notifications');
    }
}
