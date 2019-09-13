@extends('layouts.app')

@section('title')
    <title>Email Extractor Extension</title>
@stop

@section('description')
    <meta name="description" content="Email Extractor is a Powerful Automated Email Addresses Extraction Tool for Chrome and Firefox. It uses powerful algorithms to extract email addresses from web pages."/>
@stop

@section('css')
    <style>

    </style>
@stop

@section('content')
    <div class="container addons text-center">
        <mark>Email Extractor</mark>
        <h4>Extract the email addresses behind any webpage.</h4>
        <div class="row">
            <div class="col-md-4">
                <img src="{{ asset('image/email-extractor.png') }}" alt="Email Extractor" class="rounded img-fluid mx-auto d-block"/>
            </div>
            <div class="col-md-6">
                <p class="des">Collecting email addresses, it’s not hard & time-consuming anymore and this time it is free for you. Collect more email addresses and get more leads with Email Extractor!</p>
                <p class="des">Email Extractor is a Powerful Automated Email Addresses Extraction Tool for Chrome and Firefox. It uses very unique and powerful algorithms to extract email addresses from web pages. All of them filter through those algorithms.</p>
                <p class="des">Email Extractor goes through with every web page it visits and extracts email addresses from those web pages. It also saves them to the user’s account.</p>
                <p class="des">The user can export current email addresses as well as saved email addresses at any time.</p>
                <p class="des">Email Extractor has very unique Crawl Bot feature, it can crawl given URLs list and export extract email addresses when crawling process is finished.</p>
                <p class="des"><strong>Now Available On</strong></p>
                <div class="row">
                    <div class="col-md-6">
                        <a target="_blank"
                           href="https://chrome.google.com/webstore/detail/mail-dump/npahnkjblgdfffkgogokpmeplpdoccib"><img
                                    src="{{ asset('image/chrome.png') }}" alt="email-extractor-chrome"
                                    class="rounded img-fluid mx-auto d-block"/></a>
                    </div>
                    <div class="col-md-6">
                        <a target="_blank" href="https://addons.mozilla.org/en-US/firefox/addon/mailshunt-email-extractor/"><img
                                    src="{{ asset('image/firefox.png') }}" alt="email-extractor-firefox"
                                    class="rounded img-fluid mx-auto d-block"/></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
