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
        <div class="container">
            <div class="text-center">
                <h5>Duco Lindner © 2017</h5>
            </div>
            <div class="text-center">
                <ul class="list-inline">
                    <li><a href="https://twitter.com/duckelekuuk" target="_blank"><i class="fa fa-twitter fa-2x" aria-hidden="true"></i></a></li>
                    <li><a href="https://github.com/duckelekuuk" target="_blank"><i class="fa fa-github fa-2x" aria-hidden="true"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection