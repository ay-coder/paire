<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coreconfig extends Model
{
    public function updateAction($request)
    {

        $coreconfigHeading = Coreconfig::where('key','like','%'.'homepage_heading'.'%')->first();
        //dd($coreconfigHeading);
        $coreconfigHeading->value = $request->input('homepage_heading');
        $coreconfigHeading->save();

        $coreconfigDescription = Coreconfig::where('key','like','%'.'homepage_description'.'%')->first();
        $coreconfigDescription->value = $request->input('homepage_description');
        $coreconfigDescription->save();
        return redirect('config')->with('success', 'Your Configuration has been updated');
    }
}
