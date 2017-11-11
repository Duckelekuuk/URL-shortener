<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>@yield('title')</title>
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/favicon/apple-touch-icon.png') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon/favicon-32x32.png') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon/favicon-16x16.png') }}">
<link rel="manifest" href="{{ asset('img/favicon/manifest.json') }}">
<link rel="mask-icon" href="{{ asset('img/favicon/safari-pinned-tab.svg') }}" color="#5bbad5">
<meta name="theme-color" content="#222222">

<!-- Meta tags for SEO -->
<meta name="description" content="Easily shorten your long url with short.duckelekuuk.com. Creating a short link with a click of the button. Link your shareX to short.Duckelekuuk.com" />
<meta name="keywords" content="Url, Shortener, link, ShareX, Duco, Lindner, Duckelekuuk, short" />
<meta name="author" content="Duckelekuuk">
<meta name="robots" content="index, nofollow" />

<link rel="stylesheet" href="{{ mix('/css/app.css') }}">

<script>
    window.Laravel = {
        csrfToken: '{{ csrf_token() }}',
        appName: '{{ env('APP_NAME') }}'
    }
</script>