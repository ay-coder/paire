<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('metaDescription')">
    <meta name="keywords" content="@yield('metaKeywords')">
    <meta name="author" content="@yield('metaAuthor')">
    <!-- Favicon icon -->
    {{ Html::favicon( 'admin/images/favicon.ico' ) }}
    <title>@yield('pageTitle','FOF')| The F Factor</title>
    <!-- Custom CSS -->
    {!! Html::style('admin/css/style.min.css') !!}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    @yield('addNewCss')
</head>