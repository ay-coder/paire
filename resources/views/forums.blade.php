<?php
use App\Http\Controllers\ForumController;

?>
@extends('fof2')
@section('pageTitle','Forums')
@section('content2')
    <div class="forumspage">
        <div class="col-sm-12">
            <h2>New Data: Event Industry Trends</h2>
            <button class="btn my-2 my-sm-0 btn addforumsdiv" type="button" data-toggle="modal" data-target="#addTopic">
                ADD TOPIC
            </button>
        </div>
        <div class="formscont">

            @if($forums->count())
                @foreach($forums as $forum)
                    <div class="col-sm-12 forumsdiv">
                        <div class="row">
                            <div class="circleicon">
                                @php $profile = "circle1.png" @endphp
                                @isset(Auth::user()->profile_pic)
                                    @php $profile=Auth::user()->profile_pic @endphp
                                @endisset
                                <img src="{!! asset('images/').'/users/'.$profile !!}" alt="{!! Auth::user()->firstName !!}">
                            </div>
                            <div class="circletext">
                                <div class="formtitle">{!! $forum->topic !!}</div>
                                {{--{!! dd($forum->Reaction) !!}--}}
                                @php $like = $dislike = 0;@endphp
                                @foreach($forum->Reaction as $reaction)
                                    @if($reaction->reaction == 1)
                                        @php $like++ @endphp
                                    @else
                                        @php $dislike++ @endphp
                                        @endif
                                @endforeach
                                <div class="likeuttons">
                                    <form class="d-inline" method="post" action="reaction"
                                          id="like-{!! $forum->id !!}">@csrf{{ Form::hidden('forumId', $forum->id) }}{{ Form::hidden('reaction', 'like') }}<a href="javascript:void(0)" onclick="document.getElementById('like-{!! $forum->id !!}').submit();" class="like">{!! $like !!}</a></form><form class="d-inline" method="post" action="reaction" id="dislike-{!! $forum->id !!}">@csrf{{ Form::hidden('forumId', $forum->id) }}{{ Form::hidden('reaction', 'dislike') }}<a href="javascript:void(0)"onclick="document.getElementById('dislike-{!! $forum->id !!}').submit();" class="dislike">{!! $dislike !!}</a></form>
                                </div>
                                <div class="fotmtext">{!! $forum->description !!}</div>
                                <div class="reply">
                                    <a href="#"
                                       title="{!! count($forum->forum_reply) !!} Replied">{!! count($forum->forum_reply) !!}
                                        Replied</a>
                                </div>
                                @if(count($forum->forum_reply))
                                    @foreach($forum->forum_reply as $forumReply)
                                        <div class="replymsg">
                                            <div class="replyby">{!! $forum->User->firstName.' '.$forum->User->lastName !!}</div>
                                            <div class="replytext">{!! $forumReply->content !!}</div>
                                            <div class="replytime">
                                                @php
                                                    $forumController = ForumController::calculate_time_span($forumReply->created_at);
                                                    echo $forumController;
                                                @endphp
                                            </div>

                                        </div>
                                    @endforeach
                                @endif
                                {{--<div class="replymsg"></div>--}}
                            </div>
                            <div class="replyform">
                                {!! Form::open(array('url' => 'forumreply','class' => '', 'id' => '')) !!}
                                {{ Form::hidden('forum-id', $forum->id, array('id' => 'forumId')) }}
                                <textarea name="content"></textarea>
                                <div class="replyformbtn">
                                    <button type="reset" class="btn btn-orage-outline">CANCEL</button>
                                    <button type="submit" class="btn btn-primary hoveroutline">REPLY</button>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                @endforeach
                {{--<div class="col-sm-12 forumsdiv">
                    <div class="row">
                        <div class="circleicon"><img src="images/circle1.png" alt="circle"></div>
                        <div class="circletext">
                            <div class="formtitle">Write On Your Business Card</div>
                            <div class="likeuttons"><a href="#" class="like">22</a><a href="#" class="dislike">22</a>
                            </div>
                            <div class="fotmtext">Research in advertising is done in order to produce better
                                advertisements that are more efficient in motivating customers to buy a product or a
                                service. The research can be based on a particular advertising campaign or can be more
                                generalized and based on how advertisements create an effect on people’s mind.
                            </div>
                            <div class="reply"><a href="#" title="2 Replied">2 Replied</a></div>
                            <div class="replymsg">
                                <div class="replyby">Owen Daniels</div>
                                <div class="replytext">The research can be based on a particular advertising campaign or
                                    can be more generalized and based on how advertisements create an effect on people’s
                                    mind.
                                </div>
                                <div class="replytime">4 hrs ago</div>
                            </div>
                            <div class="replymsg">
                                <div class="replyby">Owen Daniels</div>
                                <div class="replytext">The research can be based on a particular advertising campaign or
                                    can be more generalized and based on how advertisements create an effect on people’s
                                    mind.
                                </div>
                                <div class="replytime">4 hrs ago</div>
                            </div>
                        </div>
                        <div class="replyform">
                            <textarea></textarea>
                            <div class="replyformbtn">
                                <button class="btn btn-orage-outline">CANCEL</button>
                                <button class="btn btn-primary hoveroutline">REPLY</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 forumreplydiv">
                    <div class="row">
                        <div class="circleicon"><img src="images/circle2.png" alt="circle"></div>
                        <div class="circletext">
                            <div class="formtitle">Astronomy Binoculars A Great Alternative</div>
                            <div class="likeuttons"><a href="#" class="like">22</a><a href="#" class="dislike">22</a>
                            </div>
                            <div class="fotmtext">Research in advertising is done in order to produce better
                                advertisements that are more efficient in motivating customers to buy a product or a
                                service. The research can be based on a particular advertising campaign or can be more
                                generalized and based on how advertisements create an effect on people’s mind.
                            </div>
                            <div class="reply"><a href="#" title="10 Replied">10 Replied</a><a href="#" title="Reply"
                                                                                               class="nobg">Reply</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 forumreplydiv">
                    <div class="row">
                        <div class="circleicon"><img src="images/circle3.png" alt="circle"></div>
                        <div class="circletext">
                            <div class="formtitle">Beyond The Naked Eye</div>
                            <div class="likeuttons"><a href="#" class="like">22</a><a href="#" class="dislike">22</a>
                            </div>
                            <div class="fotmtext">Research in advertising is done in order to produce better
                                advertisements that are more efficient in motivating customers to buy a product or a
                                service. The research can be based on a particular advertising campaign or can be more
                                generalized and based on how advertisements create an effect on people’s mind.
                            </div>
                            <div class="reply"><a href="#" title="8 Replied">8 Replied</a><a href="#" title="Reply"
                                                                                             class="nobg">Reply</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 forumreplydiv">
                    <div class="row">
                        <div class="circleicon"><img src="images/circle4.png" alt="circle"></div>
                        <div class="circletext">
                            <div class="formtitle">10 Easy Steps To Clearer Skin</div>
                            <div class="likeuttons"><a href="#" class="like">22</a><a href="#" class="dislike">22</a>
                            </div>
                            <div class="fotmtext">Research in advertising is done in order to produce better
                                advertisements that are more efficient in motivating customers to buy a product or a
                                service. The research can be based on a particular advertising campaign or can be more
                                generalized and based on how advertisements create an effect on people’s mind.
                            </div>
                            <div class="reply"><a href="#" title="8 Replied">8 Replied</a><a href="#" title="Reply"
                                                                                             class="nobg">Reply</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 forumreplydiv">
                    <div class="row">
                        <div class="circleicon"><img src="images/circle5.png" alt="circle"></div>
                        <div class="circletext">
                            <div class="formtitle">Party Jokes Startling But Unnecessary</div>
                            <div class="likeuttons"><a href="#" class="like">22</a><a href="#" class="dislike">22</a>
                            </div>
                            <div class="fotmtext">Research in advertising is done in order to produce better
                                advertisements that are more efficient in motivating customers to buy a product or a
                                service. The research can be based on a particular advertising campaign or can be more
                                generalized and based on how advertisements create an effect on people’s mind.
                            </div>
                            <div class="reply"><a href="#" title="8 Replied">8 Replied</a><a href="#" title="Reply"
                                                                                             class="nobg">Reply</a>
                            </div>
                        </div>
                    </div>
                </div>--}}
            @else
                <div class="col-sm-12 forumreplydiv">
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <h1>Oops! No forums Found! Pleaes add One</h1>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <div class="modal fade" id="addTopic" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="vertical-alignment-helper">
            <div class="modal-dialog vertical-align-center">
                <div class="modal-content">
                    {!! Form::open(array('url' => 'forum','class' => '', 'id' => '')) !!}
                    <div class="modal-header">Add Topic</div>
                    <div class="modal-body">
                        <div class="modelform">
                            <input type="text" placeholder="Enter your title" name="topic">
                            <textarea placeholder="Enter your message..." name="description"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="replyformbtn">
                            <button class="btn btn-orage-outline" data-dismiss="modal">CANCEL</button>
                            <button class="btn btn-primary hoveroutline">SUBMIT</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop
