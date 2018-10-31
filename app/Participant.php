<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Participant extends Model
{
    public function Competition()
    {
        return $this->belongsTo(Competition::class);
    }
    public function insertAction($request)
    {
        $participation = new Participant();
        $participation->user_id = Auth::user()->id;
        $participation->date_of_participant = date('Y-m-d H:i:s');;
        $competition = Competition::with('milestone')->where('milestone_id','=',$request->input('milestone'));
        $competition = Milestone::find($request->input('milestone'));
        //dd($competition->competition_id);
        $participation->competition_id = $competition->competition_id;

        if($participation->save())
        {
            return redirect()->back()->with('success','Thank you for your participation in this competition.');
        }
        else{
            return redirect()->back()->with('error','There is something went wrong while saving Participation');
        }
    }
}
