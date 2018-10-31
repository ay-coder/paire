<?php
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\MilestoneController;

?>
@php
    $data = CompetitionController::checkCompetition();
@endphp
@extends('fof')
@section('pageTitle','Welcome')
@section('content')
    <div class="homebannercont">
        <h2>
            @if(!is_array($data))
                {!! $data->name !!}
            @else
                {!! $data[0]->value !!}
            @endif
        </h2>
        <p>
            @if(!is_array($data))
                {!! $data->description !!}
            @else
                {!! $data[1]->value !!}
            @endif

        </p>
        <button class="btn btn-banner" type="button">GET IN TOUCH</button>
    </div>
    </div>
    </div>
    <div class="maincontbluebg">
        <div class="container">
            <div class="homnetext">
                <h1>Similique Sunt</h1>
                <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime
                    placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. </p>
            </div>
            <div class="homemilestones">
                @php $competitionStatus = CompetitionController::isCompetitionAvailable() @endphp
                @if($competitionStatus)

                    @php
                        $milestones = MilestoneController::getAllMilestones();
                    @endphp
                @if(count($milestones))
                        <div class="col-sm-12">
                            <h2>Milestones</h2>
                        </div>
                    <div class="col-sm-12">
                        <div class="row">
                            @foreach($milestones as $milestone)
                                <div class="col-lg-3 col-md-4 col-sm-12">
                                    <div class="milestonebox">
                                        <a href="{!! route('milestone.show',$milestone) !!}" title="{!! $milestone->name !!}"><h3>{!! $milestone->name !!}</h3></a>
                                        <p>{!! $milestone->description !!}</p>
                                        <p class="image"><img src="{!! asset('images').'/competition/'.$milestone->featured_image !!}"></p>
                                    </div>
                                </div>
                                @endforeach
                        </div>
                    </div>
                    @else
                    <div class="col-sm-12"><h2>Sorry No Milestones has been defined for the Competition at this moment.</h2></div>
                    @endif

                @else
                    <div class="col-sm-12"><h2>Sorry No Competition Available at this moment.</h2></div>
                @endif
            </div>
        </div>
    </div>
    <div class="maincontwhatebg">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h2>About Us</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-12 aboutimg"><span class=""><img src="images/about-img.jpg" alt=""/></span>
                </div>
                <div class="col-md-6 col-sm-12 abouttext">
                    <h4>Ut enim ad minima</h4>
                    <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed
                        quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat
                        voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit
                        laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui
                        in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat
                        quo voluptas nulla pariatur?"</p>
                </div>
            </div>
        </div>
    </div>
    <div class="footerdiv">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 footertext">
                    <h3>Get in touch</h3>
                    <h2>Vel illum qui dolorem eum fugiat</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</p>
                </div>
                <div class="col-md-6 col-sm-12 footerorm">
                    <form>
                        <div class="row">
                            <div class="col-sm-12">
                                <input type="text" placeholder="Your Name"/>
                            </div>
                            <div class="ccol-md-6 col-sm-12">
                                <input type="text" placeholder="Email Address"/>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <input type="text" placeholder="Contact Number"/>
                            </div>
                            <div class="col-sm-12">
                                <input type="text" placeholder="Subject"/>
                            </div>
                            <div class="col-sm-12">
                                <textarea placeholder="Description"></textarea>
                            </div>
                            <div class="col-sm-12">
                                <input type="button" value="Send Message"/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop