@extends('layouts.app')

@section('title')
    <title>Email Add-ons</title>
@stop

@section('description')
    <meta name="description" content="MailsHunt email add-ons are browser-based extensions which allow users to extract, find and verify email addresses while surfing the web."/>
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
                <p class="des">Collecting email addresses, it’s not hard & time-consuming anymore and this time it is free for you. Collect more email addresses and get more leads with Email Extractor!
                    Email Extractor is a Powerful Automated Email Addresses Extraction Tool for Chrome and Firefox. It uses very unique and powerful algorithms to extract email addresses from web pages. All of them filter through those algorithms.</p>
                <p class="des">Email Extractor goes through with every web page it visits and extracts email addresses from those web pages. It also saves them to the user’s account.</p>
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

    <div class="container addons text-center">
        <mark>Email Verifier</mark>
        <h4>Filter every email address before it sends.</h4>
        <div class="row">
            <div class="col-md-4">
                <img src="{{ asset('image/email-verifier.png') }}" alt="Email Verifier"
                     class="rounded img-fluid mx-auto d-block"/>
            </div>
            <div class="col-md-6">
                <p class="des">Email Verifier, a powerful tool that helps verify an email address or validate email addresses in bulk as you go, whilst you browse websites. The Email Verifier removes invalid email addresses and reduces bounce rates, so you don't have to waste your time and money on sending emails to non-existent email addresses.</p>
                <p class="des">Email Verifier operates from the cloud, therefore the average response time is just milliseconds and it operates behind an SSL layer too.</p>
                <p class="des"><strong>Now Available On</strong></p>
                <div class="row">
                    <div class="col-md-6">
                        <a target="_blank"
                           href="https://chrome.google.com/webstore/detail/maildump-verifier/hoflghcpbmgflojkghjopgodbhlpaeah"><img
                                    src="{{ asset('image/chrome.png') }}" alt="email-verifier-email-verifier-firefox"
                                    class="rounded img-fluid mx-auto d-block"/></a>
                    </div>
                    <div class="col-md-6">
                        <a target="_blank" href="https://addons.mozilla.org/en-US/firefox/addon/mailshunt-email-verifier/"><img
                                    src="{{ asset('image/firefox.png') }}" alt="email-verifier-firefox"
                                    class="rounded img-fluid mx-auto d-block"/></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                <p class="des"><strong>Now Available On</strong></p>
                <a target="_blank"
                   href="https://chrome.google.com/webstore/detail/maildump-finder/bngmobiiapgiphgfeiegibbmaoflfdoa"><img
                            src="{{ asset('image/chrome.png') }}" alt="email-finder-chrome"
                            class="rounded img-fluid mx-auto d-block"/></a>
            </div>
        </div>
    </div>
@stop
