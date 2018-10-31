<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Competition extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function Milestone()
    {
        return $this->hasMany(Milestone::class);
    }

    public function Participation()
    {
        return $this->hasMany(Participant::class);
    }

    public function insertAction($request)
    {
        $competition = new Competition();
        $competition->name = $request->input('name');
        $competition->description = $request->input('description');
        $competition->start = $request->input('start');
        $competition->end = $request->input('end');
        $competition->status = $request->input('status');

        if($competition->save()){
            $request->session()->flash('success', 'Competition has been generated');
            return redirect('competition');
        }
        else{
            $request->session()->flash('error', 'Issue while generating competition.');
            return redirect('competition');
        }
    }

    public function updateAction($request,$competition)
    {
        $competitionData = Competition::find($competition->id);
        $competitionData->name = $request->input('name');
        $competitionData->description = $request->input('description');
        $competitionData->start = $request->input('start');
        $competitionData->end = $request->input('end');
        $competitionData->status = $request->input('status');

        if($competitionData->save()){
            $request->session()->flash('success', 'Competition has been updated');
            return redirect('competition');
        }
        else{
            $request->session()->flash('error', 'Issue while updating competition.');
            return redirect('competition');
        }
    }

    public function deleteAction($request)
    {
        $competition = Competition::find($request->id);
        $competition->runSoftDelete();
        if($competition->trashed()) {
            return redirect('competition')->with('success', 'A Competition has been deleted.');
        }
        else{
            return redirect('competition')->with('error','Oh, we are sorry, something went wrong.');
        }
    }
}
