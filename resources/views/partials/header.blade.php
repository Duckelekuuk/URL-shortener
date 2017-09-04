<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>@yield('title')</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <link rel="stylesheet" href="{{ mix('/css/app.css') }}">

        <script>
            window.Laravel = {csrfToken: '{{ csrf_token() }}'}
            window.inferno = {host: '{{ url("/") }}/'}
        </script>
    </head>