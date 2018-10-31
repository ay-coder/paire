<?php

namespace App\Http\Controllers;

use App\Coreconfig;
use Illuminate\Http\Request;

class CoreconfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'homepage_heading' => 'required',
            'homepage_description' => 'required'
        ]);
        $coreConfig = new Coreconfig();
        return $coreConfig->updateAction($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Coreconfig  $coreconfig
     * @return \Illuminate\Http\Response
     */
    public function show(Coreconfig $coreconfig)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Coreconfig  $coreconfig
     * @return \Illuminate\Http\Response
     */
    public function edit(Coreconfig $coreconfig)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Coreconfig  $coreconfig
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coreconfig $coreconfig)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Coreconfig  $coreconfig
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coreconfig $coreconfig)
    {
        //
    }
}
