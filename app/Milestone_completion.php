<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Milestone_completion extends Model
{
    public function Milestone()
    {
        return $this->belongsTo(Milestone::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function insertAction($request)
    {
        $milestoneCompletion = new Milestone_completion();
        $milestoneCompletion->milestone_id = $request->input('milestone');
        $milestoneCompletion->user_id = Auth::user()->id;
        $milestoneCompletion->completion = date('Y-m-d H:i:s');
        if($milestoneCompletion->save())
        {
            $participation = new Participant();
            return $participation->insertAction($request);
        }
        else{
            return redirect()->back()->with('error','There is something wrong while saving MilestoneCompletion');
        }
    }
}
