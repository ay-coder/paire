<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Idea extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function Milestone()
    {
        return $this->belongsTo(Milestone::class);
    }

    public function insertAction($request)
    {
        $idea = new Idea();
        $idea->user_id = Auth::user()->id;
        $idea->milestone_id = $request->input('milestone');

        if ($request->input('description'))
            $idea->description = $request->input('description');

        if($request->hasFile('attachment')){
            $image = $request->file('attachment');
            $name = 'attachment-'. Auth::user()->id. '-' . $request->input('milestone') . '-' . time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('images\idea');
            $image->move($destinationPath, $name);
            $idea->attachment = $request->input('attachment');
        }

        if($request->input('link'))
            $idea->link = $request->input('link');

        if($idea->save()){
            $milestoneCompletion = new Milestone_completion();
            return $milestoneCompletion->insertAction($request);
        }
        else{
            return redirect('index')->with('error','Something went wrong while updating your Idea.');
        }

    }
}
