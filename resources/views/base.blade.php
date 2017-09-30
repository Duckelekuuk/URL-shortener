<!DOCTYPE html>
<html>
    <head>
        @include('partials.header')
    </head>
    <body id="body" class="@yield('body-class')">
        @include('partials.body')
    </body>
    @include('partials.footer')
</html>