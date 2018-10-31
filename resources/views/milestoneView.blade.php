@extends('fof2')
@section('pageTitle','View Milestone')
@section('customWrapperClass2','milestonebg')
@section('content2')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                    <div class="milestonecontbg">
                        <div class="milestonecontwithimg">
                            <h1>{!! $milestone->name !!}</h1>
                            <div class="milestoneimg"><img
                                        src="{!! asset('images').'/competition/'.$milestone->featured_image !!}"
                                        alt="{!! $milestone->name !!}"></div>
                            <p>{!! $milestone->description !!}</p>
                        </div>
                        @if(count($milestoneCompletion))
                            <div class="thankyou">
                                Thanks for submitting your details for Milestone! Your application is now complete for this Milestone! You’ll be notified of the results at the end of the.
                            </div>
                        @else
                        <div class="submitidea">
                            <h4>Submit Your Idea</h4>
                            {!! Form::open(array('url' => 'idea.store','class' => '', 'id' => '','files' => true)) !!}
                            {{ Form::hidden('milestone', $milestone->id, array('id' => 'milestone_id')) }}
                            <div class="row">
                                <div class="col-sm-12">
                                    <label for="description">Enter Your Text</label>
                                    <textarea name="description" id="description"></textarea>
                                </div>
                                <div class="col-sm-6">
                                    <label for="link">Enter URL link</label>
                                    <input type="text" id="link" name="link">
                                </div>
                                <div class="col-sm-6">
                                    <label for="attachment">Attach File</label>
                                    <input type="file" id="attachment" name="attachment">
                                </div>
                                <div class="col-sm-12 formbtns">
                                    <button class="btn btn-orange" type="submit">SUBMIT</button>
                                    <button class="btn btn-outline" type="reset">CANCEL</button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                            @endif
                    </div>
            </div>
            @if(count($milestone->Tool))
                <div class="col-sm-12"><h2>Tools</h2></div>
                <div class="col-sm-12">
                    <div class="row">
                        @php $tools = $milestone->tool @endphp
                        @foreach($tools as $tool)
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="milestonebox toolsbox">
                                    <a href="{!! $tool->link !!}" title="{!! $tool->link !!}">
                                        <p class="image">
                                            <img src="{!! asset('images/').'/tool/'.$tool->featured_image !!}"
                                                 alt="{!! $tool->link !!}"/>
                                        </p>
                                        <p class="toolstext">{!! $tool->description !!}</p>
                                    </a>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            @else
                <div class="col-sm-12"><h2>No Tools has been defined.</h2></div>
            @endif

        </div>
    </div>
    <div class="knowledgediv">
        <div class="container">
            @if(count($milestone->knowledge))
                <div class="row">
                    <div class="col-sm-12"><h2>Knowledge</h2></div>
                </div>
                <div class="row">
                    @php $knowledgeBases = $milestone->knowledge; $i=1@endphp
                    @foreach($knowledgeBases as $knowledgeBasis)
                        <div class="{!! ($i==1)? 'col-sm-8' : 'col-sm-4' !!}">
                            <div class="imgpost">
                                <a href="{!! $knowledgeBasis->link !!}">
                                    <img src="{!! asset('images').'/knowledge/'.$knowledgeBasis->featured_image !!}"
                                         alt="{!! $knowledgeBasis->title !!}"/>
                                    <span>{!! $knowledgeBasis->title !!}</span>
                                </a>
                            </div>
                        </div>
                        @php $i++ @endphp
                    @endforeach
                </div>
            @else
                <div class="row"><h2>Sorry! No Knowledge Section has been defined.</h2></div>
            @endif
        </div>
    </div>
@stop