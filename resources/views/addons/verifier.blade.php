@extends('layouts.app')

@section('title')
    <title>Email Verifier Extension</title>
@stop

@section('description')
    <meta name="description" content="Email Verifier, a powerful tool that helps verify an email address or validate email addresses in bulk as you go, whilst you browse websites."/>
@stop

@section('css')
    <style>

    </style>
@stop

@section('content')
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
                <p class="des">
                    Our email verification process includes: <br>

                    - Deliverable State <br>
                    - Format Validation <br>
                    - Disposable Emails Identification <br>
                    - Checking Server Status <br>
                    - Role Emails Identification <br>
                    - Checking Free Emails <br>
                    - Displaying User of Email <br>
                    - Displaying Domain of Email <br>
                </p>
                <p class="des">Email Verifier allows you to verify a list of email addresses by choosing the Bulk Option, it will automatically download a CSV file which contains results of your verification.</p>
                <p class="des"><strong>Now Available On</strong></p>
                <div class="row">
                    <div class="col-md-6">
                        <a target="_blank"
                           href="https://chrome.google.com/webstore/detail/maildump-verifier/hoflghcpbmgflojkghjopgodbhlpaeah"><img
                                    src="{{ asset('image/chrome.png') }}" alt="email-verifier-chrome"
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
@stop
