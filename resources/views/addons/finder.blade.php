@extends('layouts.app')

@section('title')
    <title>Email Finder Extension</title>
@stop

@section('description')
    <meta name="description" content="Email Finder is a Chrome Extension to discover business email addresses for any Domain Name or any Company."/>
@stop

@section('css')
    <style>

    </style>
@stop

@section('content')
    <div class="container addons text-center">
        <mark>Email Finder</mark>
        <h4>Discover business email addresses for any Company.</h4>
        <div class="row">
            <div class="col-md-4">
                <img src="{{ asset('image/email-finder.png') }}" alt="Email Finder"
                     class="rounded img-fluid mx-auto d-block"/>
            </div>
            <div class="col-md-6">
                <p class="des">Email Finder is a Chrome Extension to discover business email addresses for any Domain Name or any Company.</p>
                <p class="des">The tool is very quick and easy to use. <br>
                    How it works: <br>
                    Step 1: You provide a domain name (example: devrolabs.com) <br>
                    Step 2: Email Finder searches for email addresses from this domain <br>
                    Step 3: It'll automatically download a CSV file contain collected email addresses</p>
                <p class="des">It also used secure cloud storage to store all of the email addresses and the user can download it any time they want.</p>
                <p class="des"><strong>Now Available On</strong></p>
                <a target="_blank"
                   href="https://chrome.google.com/webstore/detail/maildump-finder/bngmobiiapgiphgfeiegibbmaoflfdoa"><img
                            src="{{ asset('image/chrome.png') }}" alt="email-finder-chrome"
                            class="rounded img-fluid mx-auto d-block"/></a>
            </div>
        </div>
    </div>
@stop
