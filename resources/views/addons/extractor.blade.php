@extends('layouts.app')

@section('title')
    <title>Email Extractor Extension</title>
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
                <img src="{{ asset('image/md2.png') }}" alt="maildump" class="rounded img-fluid mx-auto d-block"/>
            </div>
            <div class="col-md-6">
                <p class="des">Collecting email addresses, it’s not hard & time-consuming anymore and this time it is
                    free for you. Collect more email addresses and get more leads with Mail Dump!</p>
                <p class="des">MailDump is a Powerful Automated Email Addresses Extraction Tool for Chrome and Firefox.
                    It uses very unique and powerful algorithms to extract email addresses from web pages. All of them
                    filter through those algorithms.</p>
                <p class="des">MailDump goes through with every web page it visits and extracts email addresses from
                    those web pages. It also saves them to the user’s account.</p>
                <p class="des">The user can export current email addresses as well as saved email addresses at any
                    time. </p>
                <p class="des">Mail Dump has very unique Auto Crawl feature, it can crawl given URLs list or current
                    page domain and export extract email addresses when crawling process is finished. So you can go to
                    any website you desire to crawl and just press ‘Crawl Current Domain’ within several minutes it will
                    dump your mail list.</p>
                <p class="des"><strong>Now Available On</strong></p>
                <div class="row">
                    <div class="col-md-6">
                        <a target="_blank"
                           href="https://chrome.google.com/webstore/detail/mail-dump/npahnkjblgdfffkgogokpmeplpdoccib"><img
                                    src="{{ asset('image/chrome.png') }}" alt="maildump"
                                    class="rounded img-fluid mx-auto d-block"/></a>
                    </div>
                    <div class="col-md-6">
                        <a target="_blank" href="https://addons.mozilla.org/en-US/firefox/addon/mail-dump/"><img
                                    src="{{ asset('image/firefox.png') }}" alt="maildump"
                                    class="rounded img-fluid mx-auto d-block"/></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
