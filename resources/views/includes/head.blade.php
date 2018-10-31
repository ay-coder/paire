<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>@yield('pageTitle','') | The F Factor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('metaDescription')">
    <meta name="keywords" content="@yield('metaKeywords')">
    <meta name="author" content="@yield('metaAuthor')">
    <!-- Favicon icon -->
    {{ Html::favicon( 'images/favicon.ico' ) }}

    {!! Html::style('css/bootstrap.min.css') !!}
    {!! Html::style('css/bootstrap-grid.min.css') !!}
    {!! Html::style('css/fonts.css') !!}
    {!! Html::style('css/style.css') !!}
    {!! Html::style('css/media.css') !!}


    {{--<script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>--}}
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    @yield('addNewCss')

</head>