@extends('layouts.app')

@section('title')
    <title>Domain Search - Find email addresses from a domain name</title>
@stop

@section('description')
    <meta name="description" content="The most powerful email-finding tool. The Domain Search lists all the email addresses of people who are working in a particular company."/>
@stop

@section('css')
    <style>
        .error-msg {
            color: #FA7C72;
            border-radius: 1rem;
            border: 1px solid #FA7C72;
            font-size: 18px;
            padding: 5px 10px;
        }
    </style>
@stop

@section('content')
    <div class="container">
        <div class="col-md-8 offset-md-2 text-center info">
            <h1><img src="{{ asset('image/search.png') }}" height="50px" alt="Search MailsHunt"> Domain Search</h1>
            <h4>The most powerful email-finding tool which is able to list all the email addresses of people who are working in a particular company.</h4>
        </div>
        <div class="row">
            <div class="col-md-8 offset-md-2" style="margin-top: 40px;">
                <div class="jumbotron">
                    <div class="errors">
                        @if ($errors->any())
                            <div style="text-align: center; line-height: 40px;">
                                @foreach ($errors->all() as $error)
                                    <p class="text-center error-msg"><i class="fa fa-exclamation-circle"
                                                                        aria-hidden="true"></i> {{$error}}</p>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <h4 style="margin-bottom: 20px">Domain Search</h4>
                    <form id="target" action="/domain-search" method="POST">
                        @csrf
                        <div class="form-group">
                            <div class="input-group input-group-lg">
                                <input type="text" name="domain" class="form-control form-control-lg"
                                       placeholder="company.com"
                                       value="{{ isset($domain) ? $domain : old('domain') }}" required>
                                <div class="input-group-append">
                                    <button id="submit" type="submit" class="btn btn-defalt btn-block btn-lg">Find email addresses</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <p>Enter a domain name to find email addresses.</p>
                </div>
            </div>
        </div>
    </div>



    @if(!isset($mails))
    <div class="container desc">
        <div class="row">
            <div class="col-md-8 offset-md-2 text-center">
                <mark>DOMAIN SEARCH</mark>
                <h4>Get the email addresses behind any
                    website.</h4>
                <p style="font-size: 16px">The Domain Search is perfect to quickly find who to contact in business. It
                    lists all the email addresses publicly available on the web. The Domain Search lists all the email
                    addresses of people who are working in a particular company. Use powerful algorithms to filter
                    relevant email addresses from more than 20 millions of email addresses. It's the most powerful
                    email-finding tool you ever found. This email search is an advanced search feature that allows you
                    to find employees' emails from their companies' domains.</p>
            </div>
        </div>
    </div>

    <div class="extra" style="background-color: #e1e1e1;">
        <div class="container desc">
            <div class="row text-center">
                <div class="col-md-6">
                    <mark>EMAIL EXTRACTOR EXTENSION</mark>
                    <h4>Extract the email addresses behind any webpage while you browse the web</h4>
                    <p>
                        Email Extractor is a powerful email extraction extension for Chrome and Firefox. The extension
                        automatically fetches valid email IDs from the web page, you can copy-paste particular email ids
                        you need or export all of them to a text or CSV file. It also saves them to the user’s private
                        cloud storage.
                    </p>
                    <a href="/addons/email-extractor">→ Use Email Extractor Add-On</a>
                </div>
                <div class="col-md-6">
                    <mark>EMAIL FINDER</mark>
                    <h4>Find anyone’s business email address by name and company domain</h4>
                    <p>
                        The Email Finder allows you to find anyone's email address given the company domain and name of
                        your target lead. Hours of contact research are shrunk to milliseconds. We harvest and process
                        millions of public data daily to offer a fast and reliable Email Finder for any business or
                        market.
                    </p>
                    <a href="/email-verifier">→ Use Email Finder</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container faq">
        <div class="col-md-12">
            <h2>Common questions about the Email Search</h2>
            <h3>How accurate are the email addresses returned in the Domain Search?</h3>
            <div class="faq-reply">
                <p>
                    The email addresses returned can have two different states:
                </p>
                <ul>
                    <li>
                        Verified email addresses: we could recently validate the email address is working.
                    </li>
                    <li>
                        Other email addresses: They have not been verified recently, but every email address is returned
                        with the verifier option.
                    </li>
                </ul>
                <p>
                    You can click the verifier icon next to every email to get real-time verification.
                </p>
            </div>
            <h3>Where does the data come from?</h3>
            <div class="faq-reply">
                <p>
                    All the email addresses found in the Domain Search have public sources on the web.
                </p>
            </div>
            <h3>How can I find the email address of someone if I already have their names?</h3>
            <div class="faq-reply">
                <p>
                    To find the email address from a name, you can use the <a href="/email-verifier">Email Finder</a>.
                </p>
            </div>
        </div>
    </div>
    @endif


    @if(isset($mails))
        @include('email_widget', ['mails' => $mails, 'mailCount' => $mailCount])
    @endif

@stop

@section('js')
    <script>
        if (screen.width <= 425) {
            $("#submit").text("Search");
        }
    </script>
@stop
