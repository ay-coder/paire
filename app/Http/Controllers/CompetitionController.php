<?php

namespace App\Http\Controllers;

use App\Competition;
use App\Coreconfig;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CompetitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $competitions = Competition::all();
        return view('competitionIndex',compact('competitions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('competition');
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
            'name' => 'required',
            'description' => 'required',
            'status' => 'required',
            'start' => 'required|date',
            'end' => 'required|date|after_or_equal:start'
        ]);
        $competition = new Competition();
        return $competition->insertAction($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Competition  $competition
     * @return \Illuminate\Http\Response
     */
    public function show(Competition $competition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Competition  $competition
     * @return \Illuminate\Http\Response
     */
    public function edit(Competition $competition)
    {
        return view('competitionEdit',compact('competition'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Competition  $competition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Competition $competition)
    {
        $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
            'status' => 'required',
            'start' => 'required|date',
            'end' => 'required|date|after_or_equal:start'
        ]);
        $competitionData = new Competition();
        return $competitionData->updateAction($request,$competition);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Competition  $competition
     * @return \Illuminate\Http\Response
     */
    public function destroy(Competition $competition)
    {
        $competitionObject = new Competition();
        return $competitionObject->deleteAction($competition);
    }

    static function checkCompetition()
    {
        $competitions = Competition::select('end','name','description')->where('status','=',1)->first();
        if(count($competitions)) {
            $end = Carbon::parse($competitions->end);
            $today = Carbon::now();
            if ($end->diffInDays($today) == 0) {
                $configData = Coreconfig::all();
                $homepageData = $configData;
                return $homepageData;
            } else {
                $homepageData = $competitions;
                return $homepageData;
            }
        }
        else{
            $configData = Coreconfig::all();
            $homepageData = [];
            $homepageData[] = Coreconfig::select('value')->where('key','like','%'.'homepage_heading'.'%')->first();
            $homepageData[] = Coreconfig::select('value')->where('key','like','%'.'homepage_description'.'%')->first();
            return $homepageData;
        }
    }

    static function isCompetitionAvailable()
    {
        $competitions = Competition::where('status','=',1)->get();
        if(count($competitions)){
            return true;
        }
        else{
            return false;
        }
    }
}
