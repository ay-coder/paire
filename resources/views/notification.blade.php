<?php
use App\Http\Controllers\ForumController;

?>
@extends('fof2')
@section('pageTitle','Notification')
@section('content2')
    <div class="forumspage">
        <div class="col-sm-12">
            <h2>Notifications</h2>
            {!! Form::open(array('url' => 'notifications','class' => '', 'id' => '')) !!}
            <button class="btn my-2 my-sm-0 btn clearbtn" type="submit">
                CLEAR ALL
            </button>
            {!! Form::close() !!}
        </div>
        <div class="formscont">
            {{--{!! dd($notifications) !!}--}}
            @if(!count($notifications))
                <div class="col-sm-12 forumreplydiv">
                    <div class="row">
                        <div class="noticircletext centertext">Hurray! All notification caught up!</div>
                    </div>
                </div>
            @else
                @foreach($notifications as $notification)
                    <div class="col-sm-12 forumreplydiv">
                        <div class="row">
                            <div class="circleicon">
                                <img src="{!! asset('images').'/'.'notification_circle.png' !!}" alt="circle">
                            </div>
                            <div class="noticircletext">
                                <div class="notititle">{!! $notification->User->firstName.' '.$notification->User->lastName !!}</div>
                                <div class="fotmtext">{!! $notification->Forum_reply->content !!}</div>
                                <div class="replytime">
                                    @php
                                        $notificationTime = ForumController::calculate_time_span($notification->created_at);
                                        echo $notificationTime;
                                    @endphp
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

        </div>
    </div>

@stop