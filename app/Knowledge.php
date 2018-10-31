<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Knowledge extends Model
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
        $name = 'knowledge-milestone-'.$request->input('knowledge').'-' . time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('images\knowledge');
        $image->move($destinationPath, $name);
        $knowledge = new Knowledge();
        $knowledge->featured_image = $name;
        $knowledge->milestone_id = $request->input('milestone');
        $knowledge->link = $request->input('link');
        $knowledge->title = $request->input('title');

        if($knowledge->save())
        {
            return redirect('knowledge')->with('success', 'A Knowledgebase has been Created.');
        }
        else{
            return redirect('knowledge')->with('error', 'Problem with making new Knowledgebase.');
        }
    }

    public function updateAction($request,$knowledge)
    {
        if($request->hasFile('featuredImage')) {
            $image = $request->file('featuredImage');
            $name = 'knowledge-milestone-'.$request->input('knowledge').'-' . time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('images\knowledge');
            $image->move($destinationPath, $name);
        }
        else{
            $name = $request->input('oldImage');
        }

        $knowledgeObject = Knowledge::find($knowledge->id);
        $knowledgeObject->featured_image = $name;
        $knowledgeObject->milestone_id = $request->input('milestone');
        $knowledgeObject->link = $request->input('link');
        $knowledgeObject->title = $request->input('title');

        if($knowledgeObject->save())
        {
            return redirect('knowledge')->with('success', 'A Knowledgebase has been Updated.');
        }
        else{
            return redirect('knowledge')->with('error', 'Problem with updating a Knowledgebase.');
        }
    }

    public function deleteAction($request)
    {
        $knowledge = Knowledge::find($request->id);
        $knowledge->runSoftDelete();
        if($knowledge->trashed()) {
            return redirect('knowledge')->with('success', 'A Knowledgebase has been deleted.');
        }
        else{
            return redirect('knowledge')->with('error','Oh, we are sorry, something went wrong.');
        }
    }
}
