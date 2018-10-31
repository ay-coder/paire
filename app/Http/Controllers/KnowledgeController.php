<?php

namespace App\Http\Controllers;

use App\Knowledge;
use App\Milestone;
use Illuminate\Http\Request;

class KnowledgeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $knowledges = Knowledge::with('milestone')->get();
        return view('knowledgeIndex',compact('knowledges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $milestones = Milestone::all();
        return view('knowledge',compact('milestones'));
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
            'milestone' => 'required',
            'title' => 'required',
            'link' => 'required',
            'featuredImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:max_width=5000,max_height=5000,min_height=200,min_width=200'
        ]);
        $knowledge = new Knowledge();
        return $knowledge->insertAction($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Knowledge  $knowledge
     * @return \Illuminate\Http\Response
     */
    public function show(Knowledge $knowledge)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Knowledge  $knowledge
     * @return \Illuminate\Http\Response
     */
    public function edit(Knowledge $knowledge)
    {
        $knowledgeData = Knowledge::find($knowledge->id);
        $milestones = Milestone::all();
        return view('knowledgeEdit',compact('knowledgeData','milestones'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Knowledge  $knowledge
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Knowledge $knowledge)
    {
        $this->validate($request,[
            'milestone' => 'required',
            'title' => 'required',
            'link' => 'required',
        ]);
        if($request->hasFile('featuredImage')){
            $this->validate($request,[
                'featuredImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:max_width=5000,max_height=5000,min_height=200,min_width=200',
                'oldImage' => 'required'
            ]);
        }
        $knowledgeData = new Knowledge();
        return $knowledgeData->updateAction($request,$knowledge);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Knowledge  $knowledge
     * @return \Illuminate\Http\Response
     */
    public function destroy(Knowledge $knowledge)
    {
        $knowledgeObject = new Knowledge();
        return $knowledgeObject->deleteAction($knowledge);
    }
}
