<?php

namespace App\Http\Controllers;

use App\Milestone;
use App\Tool;
use Illuminate\Http\Request;

class ToolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tools = Tool::with('milestone')->get();
        return view('toolIndex',compact('tools'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $milestones = Milestone::all();
        return view('tool',compact('milestones'));
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
            'link' => 'required',
            'description' => 'required',
            'featuredImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:max_width=5000,max_height=5000,min_height=200,min_width=200'
        ]);
        $tool = new Tool();
        return $tool->insertAction($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tool  $tool
     * @return \Illuminate\Http\Response
     */
    public function show(Tool $tool)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tool  $tool
     * @return \Illuminate\Http\Response
     */
    public function edit(Tool $tool)
    {
        dd($tool);
        $toolData = Tool::find($tool->id);
        $milestones = Milestone::all();
        return view('toolEdit',compact('toolData','milestones'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tool  $tool
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tool $tool)
    {
        $this->validate($request,[
            'milestone' => 'required',
            'link' => 'required',
            'description' => 'required'
        ]);
        if($request->hasFile('featuredImage')){
            $this->validate($request,[
                'featuredImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:max_width=5000,max_height=5000,min_height=200,min_width=200',
                'oldImage' => 'required'
            ]);
        }
        $toolData = new Tool();
        return $toolData->updateAction($request,$tool);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tool  $tool
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tool $tool)
    {
        $toolObject = new Tool();
        return $toolObject->deleteAction($tool);
    }
}
