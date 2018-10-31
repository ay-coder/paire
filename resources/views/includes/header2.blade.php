<body>
<div class="maindiv">
    <div class="{{ (Request::is('contact') ? 'homebanner' : 'loginmenu') }}">
        <div class="container">
            @include('includes.menu ')
        </div>