<?php
use App\Http\Controllers\ForumController;

?>
@extends('fof2')
@section('pageTitle','User Profile')
@section('content2')
    <div class="row">
        <div class="col-sm-12 profilediv">
            <div class="row">
                <div class="col-sm-4">
                    <div class="profilepic">
                        @if(Auth::user()->profile_pic == null)
                            @php $userImage = 'default_avatar.png' @endphp
                        @else
                            @php $userImage = Auth::user()->profile_pic @endphp
                        @endif
                        <img src="{!! asset('images').'/users/'.$userImage !!}" alt="">
                    </div>
                    <div class="profilename"><label>{!! Auth::user()->firstName.' '.Auth::user()->lastName !!}</label>
                    </div>
                    <div class="profilebtn">
                        <a href="{{ route('logout') }}" class="" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <button class="btn btn-orage-outline">LOGOUT</button>
                        </a>
                        <a href="{!! route('editProfileUser') !!}">
                        <button class="btn btn-primary hoveroutline">EDIT</button>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="row">
                        <div class="col-sm-6">
                            <label>Current Milestone</label>
                            <div class="profileinfo">@php $SubmittedMilestones = \App\Milestone_completion::with('milestone')->where('user_id','=',Auth::user()->id)->orderBy('created_at','desc')->first() @endphp
                                {!! $SubmittedMilestones->milestone->name !!}
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label>Since</label>
                            <div class="profileinfo">
                                @php
                                    $forumController = ForumController::calculate_time_span(Auth::user()->created_at);
                                    echo $forumController;
                                @endphp
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <label>Next Milestone</label>
                            <div class="profileinfo">Name of the milestone</div>
                        </div>
                        <div class="col-sm-6">
                            <label>Application Progress</label>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0"
                                     aria-valuemax="100" style="width:75%">
                                    <span class="sr-only">75%</span>
                                </div>
                            </div>
                            <label>Application Progress</label>
                        </div>
                        <div class="col-sm-6">
                            <label>Final Deadline</label>
                            <div class="profileinfo">@php $deadLine = \App\Competition::where('status',1)->first(); @endphp
                                {!! date('d M Y',strtotime($deadLine->end)) !!}
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label>Badges</label>
                            <div class="profileinfo badges">
                                @php
                                    $milestoneBadges = \App\Competition::with('milestone')
                                    ->join('milestones', 'milestones.competition_id', '=', 'competitions.id')
                                    ->where('competitions.status','=',1)
                                    ->get();
                                    $completedMilestones = \App\Competition::with('milestone')
                                    ->join('milestones','milestones.competition_id','=','competitions.id')
                                    ->join('milestone_completions','milestone_completions.milestone_id','=','milestones.id')
                                    ->where('competitions.status','=',1)
                                    ->where('milestone_completions.user_id','=',Auth::user()->id)
                                    ->get();
                                    $completedCount  = count($completedMilestones);
                                $totalBadgesCount = count($milestoneBadges);
                                @endphp
                                @for($i=1;$i <= $totalBadgesCount;$i++)
                                    {{--<img src="images/badge-ac.png" alt="Badge">
                                    <img src="images/badge-ac.png" alt="Badge">
                                    <img src="images/badge-dc.png" alt="Badge">--}}
                                    @if($i <= $completedCount)
                                        <img src="images/badge-ac.png" alt="Badge">
                                    @else
                                        <img src="images/badge-dc.png" alt="Badge">
                                    @endif
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <h2>Tools</h2>
        </div>
        <div class="col-sm-12">
            <div class="row">
                @foreach($tools as $tool)
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="milestonebox toolsbox">
                            {{--{!! dd($tool->featured_image) !!}--}}
                            <a href="//{!! $tool->link !!}">
                                <p class="image">
                                    <img src="{!! asset('images').'/tool/'.$tool->featured_image !!}" alt="">
                                </p>
                                <p class="toolstext">{!! $tool->description !!}</p>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@section('knowledgeSection')
    <div class="knowledgediv">
        <div class="container">
            <div class="row">
                <div class="col-sm-12"><h2>Knowledge</h2></div>
            </div>
            <div class="row">
                @php $k=1;@endphp
                @foreach($knowledges as $knowledge)
                    @if($k==1)
                        <div class="col-md-8 col-sm-12">
                            @else
                                <div class="col-md-4 col-sm-6 col-xsm-12">
                                    @endif
                                    <div class="imgpost">
                                        <a href="//{!! $knowledge->link !!}">
                                            <img src="{!! asset('images').'/knowledge/'.$knowledge->featured_image !!}"
                                                 alt="{!! $knowledge->title !!}">
                                            <span>{!! $knowledge->title !!}</span>
                                        </a>
                                    </div>
                                </div>
                                @php $k++ @endphp
                                @endforeach
                        </div>
                        <div class="row">
                            <div class="col-sm-12"><h2>Forums</h2></div>
                        </div>
                        <div class="row">
                            @php $forumCount = count($forums);@endphp
                            @php $f=1;@endphp
                            @foreach($forums as $forum)
                                @if($f==1 || $f==$forumCount)
                                    <div class="col-md-6 col-sm-12">
                                        <div class="imgpost">
                                            <a href="form/{!! $forum->id !!}">
                                                <img src="{!! asset('images').'/image1.png' !!}" alt="">
                                                <span>{!! $forum->topic !!}</span>
                                            </a>
                                        </div>
                                    </div>
                                @else
                                    <div class="col-md-4 col-sm-6 col-xsm-12">
                                        <div class="imgpost">
                                            <a href="form/{!! $forum->id !!}">
                                                <img src="{!! asset('images').'/image2.png' !!}" alt="">
                                                <span>{!! $forum->topic !!}</span>
                                            </a>
                                        </div>
                                    </div>
                                @endif
                                @php @endphp
                            @endforeach
                        </div>
            </div>
        </div>
@stop

@stop
