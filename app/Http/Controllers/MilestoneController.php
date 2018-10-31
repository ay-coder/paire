<?php

namespace App\Http\Controllers;

use App\Competition;
use App\Milestone;
use App\Milestone_completion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MilestoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $milestones = Milestone::with('competition')->get();
        return view('milestoneIndex',compact('milestones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $competitions = Competition::all()->where('status',1);
        return view('milestone',compact('competitions'));
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
            'competition' => 'required',
            'name' => 'required',
            'description' => 'required',
            'featuredImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:max_width=5000,max_height=5000,min_height=200,min_width=200'
        ]);
        $milestone = new Milestone();
        return $milestone->insertAction($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Milestone  $milestone
     * @return \Illuminate\Http\Response
     */
    public function show(Milestone $milestone)
    {
        $milestone = Milestone::with('tool','knowledge')->find($milestone->id);
        $milestoneCompletion = Milestone_completion::where('milestone_id','=',$milestone->id)
            ->where('user_id','=',Auth::user()->id)->get();
//        dd($milestoneCompletion);

        if(count($milestone)){
            return view('milestoneView',compact('milestone','milestoneCompletion'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Milestone  $milestone
     * @return \Illuminate\Http\Response
     */
    public function edit(Milestone $milestone)
    {
        $milestoneData = Milestone::find($milestone->id);
        $competitions = Competition::all()->where('status',1);
        return view('milestoneEdit',compact('milestoneData','competitions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Milestone  $milestone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Milestone $milestone)
    {
        $this->validate($request,[
            'competition' => 'required',
            'name' => 'required',
            'description' => 'required'
        ]);
        if($request->hasFile('featuredImage')){
            $this->validate($request,[
                'featuredImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:max_width=5000,max_height=5000,min_height=200,min_width=200',
                'oldImage' => 'required'
            ]);
        }
        $milestoneData = new Milestone();
        return $milestoneData->updateAction($request,$milestone);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Milestone  $milestone
     * @return \Illuminate\Http\Response
     */
    public function destroy(Milestone $milestone)
    {
        $milestoneObject = new Milestone();
        return $milestoneObject->deleteAction($milestone);
    }

    public static function getAllMilestones()
    {
        $milestones = Milestone::whereHas('competition', function ($query){
            $query->where('status','=',0);
        })->get();
        return $milestones;
    }
}
