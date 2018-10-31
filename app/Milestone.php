<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Milestone extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function Competition()
    {
        return $this->belongsTo(Competition::class);
    }

    public function Knowledge()
    {
        return $this->hasMany(Knowledge::class);
    }

    public function Tool()
    {
        return $this->hasMany(Tool::class);
    }

    public function Idea()
    {
        return $this->hasMany(Idea::class);
    }

    public function MilestoneCompletion()
    {
        return $this->hasMany(Milestone_completion::class);
    }

    public function insertAction($request)
    {
        $image = $request->file('featuredImage');
        $name = 'milestone-competition-'.$request->input('competition').'-' . time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('images\competition');
        $image->move($destinationPath, $name);
        $milestone = new Milestone();
        $milestone->featured_image = $name;
        $milestone->competition_id = $request->input('competition');
        $milestone->name = $request->input('name');
        $milestone->description = $request->input('description');

        if($milestone->save())
        {
            return redirect('milestone')->with('success', 'A Milestone has been Created.');
        }
        else{
            return redirect('milestone')->with('error', 'Problem with making new milestone');
        }
    }

    public function updateAction($request,$milestone)
    {
        if($request->hasFile('featuredImage')) {
            $image = $request->file('featuredImage');
            $name = 'milestone-competition-' . $request->input('competition') . '-' . time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('images\competition');
            $image->move($destinationPath, $name);
        }
        else{
            $name = $request->input('oldImage');
        }

        $milestoneObject = Milestone::find($milestone->id);
        $milestoneObject->featured_image = $name;
        $milestoneObject->competition_id = $request->input('competition');
        $milestoneObject->name = $request->input('name');
        $milestoneObject->description = $request->input('description');

        if($milestoneObject->save())
        {
            return redirect('milestone')->with('success', 'A Milestone has been Updated.');
        }
        else{
            return redirect('milestone')->with('error', 'Problem with updating a Milestone.');
        }
    }

    public function deleteAction($request)
    {
        $milestone = Milestone::find($request->id);
        $milestone->runSoftDelete();
        if($milestone->trashed()) {
            return redirect('milestone')->with('success', 'A Milestone has been deleted.');
        }
        else{
            return redirect('milestone')->with('error','Oh, we are sorry, something went wrong.');
        }
    }

}
