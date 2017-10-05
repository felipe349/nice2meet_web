<!DOCTYPE html>
<html>
    <head>
        <!-- TITLE -->
        <title>@yield('title', 'Nice2Meet')</title>
        
        <!-- METAS -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta http-equiv="Cache-Control: max-age=3600, must-revalidate"/>
        <!-- COLOR THEME BAR -->
        <meta name="theme-color" content="#f37021" />
        <meta name="mobile-web-app-capable" content="yes">
        <link rel="icon" sizes="192x192" href='/assets/dist/images/favicon.png'>
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="#f37021">
        <meta name="apple-mobile-web-app-title" content='Painel Admin - KBRTEC'>
        <link rel="apple-touch-startup-image" href='/assets/dist/images/icon.png'>
        <link rel="apple-touch-icon" href='/assets/dist/images/icon.png'>
        <link rel="shortcut icon" href='/assets/dist/images/favicon.png' type="image/x-icon" />
        <!-- /METAS -->
        <!-- FONT AWESOME -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <!-- MAIN -->
        <link rel="stylesheet" href="/assets/dist/css/main.min.css" type="text/css" />
        <link rel="stylesheet" href="/assets/dist/css/style.css" type="text/css" />

        <!-- FANCYBOX -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" type="text/css" />
        
        @yield('css-section')
    </head>
    
    <body class="body">
        @if(\Auth::guard('admin')->check())
            @include('admin.includes.header')
        @else
            @include('parceiro.includes.header-logout')
        @endif
        
        @yield('content')
        
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="/assets/dist/js/validateForm.min.js"></script>
        <script type="text/javascript" src="/assets/dist/js/main.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
        @yield('js-section')
    </body>
</html>