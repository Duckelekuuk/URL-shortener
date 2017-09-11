@extends('base')

@section('title', 'Home')

@section('content')
    <div class="page-head">
        <img class="img-responsive center-block page-head-image" src="{{ asset('img/logo.png') }}">
        <h1 class="text-center page-title">URL shortener</h1>
        <h5 class="text-center subtitle">short.duckelekuuk.com</h5>
    </div>
    <create-link></create-link>
    <div class="footer navbar-fixed-bottom">
        <div class="text-center">Duco Lindner © 2017</div>
    </div>
@endsection