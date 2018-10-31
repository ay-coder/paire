@extends('fof2')
@section('pageTitle','View All milestones')
@section('content2')
    <div class="homemilestones">
        <div class="col-sm-12"><h2 class="centertext">Next Milestones</h2></div>
        <div class="col-sm-12"></div>
        @if(count($completedMilestones))
            <div class="col-sm-12"><h2 class="centertext">Completed Milestones</h2></div>
            <div class="col-sm-12">
                <div class="row">
                    @php $i=1; @endphp
                    @foreach($completedMilestones as $completedMilestone)
                        <div class="col-lg-3 col-md-4 col-sm-12 @if($i>4) collapse @endif "
                             @if($i > 4) id="moreCompletedMilestones" @endif>
                            <div class="milestonebox">
                                <a href="#">
                                    <h3>{!! $completedMilestone->milestone->name !!}</h3>
                                    <p>{!! $completedMilestone->milestone->description !!}</p>
                                    <p class="image">
                                        <img src="{!! asset('images').'/competition/'.$completedMilestone->milestone->featured_image !!}"
                                             alt="{!! $completedMilestone->milestone->name !!}">
                                    </p>
                                </a>
                            </div>
                        </div>
                        @php $i++; @endphp
                    @endforeach
                    {{--{!! dd($completedMilestones) !!}--}}
                    @if(count($completedMilestones) >4)
                        <div class="col-sm-12 centertext ">
                            <button class="btn btn-outline" data-toggle="collapse"
                                    data-target="#moreCompletedMilestones">
                                View All
                            </button>
                        </div>
                    @endif
                </div>
            </div>

        @endif
    </div>
@stop