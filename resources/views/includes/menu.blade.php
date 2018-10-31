<div class="mainmenu">
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="index">
            {!! Form::image('images/logo.png','logo', array('class'=>'','alt'=>'The F Factor'))  !!}
            {{--<img src="images/logo.png" alt="The F Factor"/>--}}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                    class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{ (Request::is('index') || Request::is('/') || Request::is('home') ? 'active' : '') }}">
                    <a class="nav-link" href="index">HOME</a></li>
                <li class="nav-item {{ (Request::is('about') ? 'active' : '') }}"><a class="nav-link" href="about">ABOUT
                        US</a></li>
                @if(Auth::check())
                    <li class="nav-item {{ (Request::is('forums') ? 'active' : '') }}"><a class="nav-link" href="forum">FORUMS</a>
                    </li>
                    <li class="nav-item notificationicon"><a class="nav-link" href="notifications">NOTIFICATIONS</a>
                    </li>
                @endif
                <li class="nav-item {{ (Request::is('contact') ? 'active' : '') }}"><a class="nav-link" href="contact">CONTACT</a>
                @if(Auth::check())
                    @if(Auth::user()->profile_pic == null)
                        @php $userImage = 'default_avatar.png' @endphp
                    @else
                        @php $userImage = Auth::user()->profile_pic @endphp
                    @endif
                    <li class="nav-item userphoto"><a class="nav-link" href="profile">
                            <img src="{!! asset('images').'/users/'.$userImage !!}" alt=""> {!! Auth::user()->firstName !!}</a></li>
                    @endif
                    </li>
            </ul>
            @if (Auth::check())

            @else
                <form class="form-inline my-2 my-lg-0 navbtn loginbtn">
                    <a class="btn btn-outline-primary my-2 my-sm-0" href="login" title="LOGIN">LOGIN</a>
                    <a class="btn my-2 my-sm-0 btn btn-primary" href="signup" title="SING UP">SING UP</a>
                </form>
            @endif
        </div>
    </nav>
</div>