<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tool extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function Milestone()
    {
        return $this->belongsTo(Milestone::class);
    }

    public function insertAction($request)
    {
        $image = $request->file('featuredImage');
        $name = 'tool-milestone-'.$request->input('tool').'-' . time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('images\tool');
        $image->move($destinationPath, $name);
        $tool = new Tool();
        $tool->featured_image = $name;
        $tool->milestone_id = $request->input('milestone');
        $tool->link = $request->input('link');
        $tool->description = $request->input('description');

        if($tool->save())
        {
            return redirect('tool')->with('success', 'A Tool has been Created.');
        }
        else{
            return redirect('tool')->with('error', 'Problem with making new tool');
        }
    }

    public function updateAction($request,$tool)
    {
        if($request->hasFile('featuredImage')) {
            $image = $request->file('featuredImage');
            $name = 'tool-milestone-'.$request->input('tool').'-' . time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('images\tool');
            $image->move($destinationPath, $name);
        }
        else{
            $name = $request->input('oldImage');
        }

        $toolObject = Tool::find($tool->id);
        $toolObject->featured_image = $name;
        $toolObject->milestone_id = $request->input('milestone');
        $toolObject->link = $request->input('link');
        $toolObject->description = $request->input('description');

        if($toolObject->save())
        {
            return redirect('tool')->with('success', 'A Tool has been Updated.');
        }
        else{
            return redirect('tool')->with('error', 'Problem with updating a Tool.');
        }
    }

    public function deleteAction($request)
    {
        $tool = Tool::find($request->id);
        $tool->runSoftDelete();
        if($tool->trashed()) {
            return redirect('tool')->with('success', 'A Tool has been deleted.');
        }
        else{
            return redirect('tool')->with('error','Oh, we are sorry, something went wrong.');
        }
    }
}
