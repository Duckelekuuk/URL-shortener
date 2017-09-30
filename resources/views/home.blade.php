@extends('base')

@section('title', 'Home')

@section('body-class', !$darkTheme ? 'light-theme' : '')

@section('content')
    <div class="page-head">
        <img class="img-responsive center-block page-head-image" src="{{ asset('img/logo.png') }}">
        <h1 class="text-center page-title">URL shortener</h1>
        <h5 class="text-center subtitle">short.duckelekuuk.com</h5>
    </div>

    <change-theme></change-theme>

    <create-share-x image="{{ asset('img/ShareX_Logo.png') }}" name="{{ env("APP_NAME") }}" url="{{ route("api.create") }}"></create-share-x>

    <create-link></create-link>

    <div class="footer navbar-fixed-bottom">
        <div class="text-center">Duco Lindner © 2017</div>
    </div>
@endsection