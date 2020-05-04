@extends('layouts.app')

@section('title')
    <title>Email Finder - Find an email address by name</title>
@stop

@section('description')
    <meta name="description" content="The most accurate and complete email-finding tool. Type the name and the website to find anyone's email address."/>
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
            <h1><img src="{{ asset('image/find.png') }}" height="50px" alt="Search MailsHunt"> Email Finder</h1>
            <h4>The most accurate and complete email-finding tool. Type the name and the website to find anyone's email address.</h4>
        </div>
        <div class="row">
            <div class="col-lg-8 offset-lg-2" style="margin-top: 40px;">
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
                    <h4 style="margin-bottom: 20px">Email Finder</h4>
                    <form id="target" action="/email-finder" method="POST">
                        @csrf
                        <div class="form-group">
                            <div class="input-group">
                                <div id="captcha">
                                    {!! Anhskohbo\NoCaptcha\Facades\NoCaptcha::display(['data-callback' => 'submit']) !!}
                                    {!! Anhskohbo\NoCaptcha\Facades\NoCaptcha::renderJs() !!}
                                </div>
                                <input type="text" name="name" class="form-control form-control-lg"
                                       placeholder="Jon Snow"
                                       value="{{ isset($name) ? $name : old('name') }}" id="inlineFormInputGroup" required>
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><strong><i class="fas fa-at"></i></strong></div>
                                </div>
                                <input type="text" name="domain" class="form-control form-control-lg"
                                       placeholder="company.com"
                                       value="{{ isset($domain) ? $domain : old('domain') }}" id="inlineFormInputGroup" required>
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary btn-block btn-lg"><strong><i
                                                    class="fas fa-search"></i></strong></button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <p>Enter a full name and the domain name of the email address (for example "devrolabs.com").</p>
                </div>
            </div>
        </div>
    </div>

    @if(!isset($mails))
        <div class="container desc">
            <div class="row">
                <div class="col-md-8 offset-md-2 text-center">
                    <mark>EMAIL FINDER</mark>
                    <h4>Find the email address of any
                        professional.</h4>
                    <p style="font-size: 16px">The Email Finder is all you need to connect with any professional. Find
                        the email addresses of people who matter to you or your business. The Email Finder uses a large
                        number of data to find the proven or most probable email address of anyone within a second. Our
                        Email Finder is not only the easiest email address finding platform to use but also the most
                        innovative email address finder. In addition, Email Lookup helps you to get the verified
                        business email address directly and rapidly by name, and company domain. It uses many methods to
                        find emails—it searches several million records and cross-checks with the existing data in the
                        database and performs direct server validation.</p>
                </div>
            </div>
        </div>

        <div class="extra" style="background-color: #e1e1e1;">
            <div class="container desc">
                <div class="row text-center">
                    <div class="col-md-6">
                        <mark>EMAIL FINDER EXTENSION</mark>
                        <h4>Discover business email addresses for any Company</h4>
                        <p>
                            Email Finder is a Chrome Extension to discover business email addresses for any Domain Name
                            or any Company. The tool is very quick and easy to use. You just have to provide a domain
                            name (example: devrolabs.com) and hit the find button to start the finder. The Email Finder
                            Chrome Extension will crawl through every web page and search engines (use advanced search
                            queries) to collect relevant leads. Once it completes the total process extension will
                            automatically download a .csv file with the collected email addresses.
                        </p>
                        <a href="/addons/email-finder">→ Use Email Finder Chrome Extension</a>
                    </div>
                    <div class="col-md-6">
                        <mark>EMAIL VERIFIER</mark>
                        <h4>Looking to verify an email address</h4>
                        <p>
                            You need to be confident that the email addresses on your subscriber list are valid before
                            sending emails to your followers. With our tool, you can verify an email address without
                            sending an email. This helps you guard against a high bounce rate before even launching your
                            campaign. Emails sent to invalid addresses bounce back, which may lead to an account
                            suspension if the bounce rate is too high. The bounce rate should stay within the 10-15%
                            threshold. Our online free email verifier can check every email address you have and reduce
                            your bounce rate.
                        </p>
                        <a href="/email-verifier">→ Use Email Verifier</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container faq">
            <div class="col-md-12">
                <h2>Common questions about the Email Finder</h2>
                <h3>What is the accuracy of the Email Finder?</h3>
                <div class="faq-reply">
                    <p>Depending on the data we have we can have a very high degree of certainty while other email
                        addresses can have a higher risk. You can click the verifier icon next to every email to get
                        real-time verification.</p>
                </div>
                <h3>Are the email addresses guesses or actually found somewhere?</h3>
                <div class="faq-reply">
                    <p>
                        All the email addresses found in the Email Finder have public sources on the web. We don't guess
                        any email addresses nevertheless you can verifier every email address in real-time.
                    </p>
                </div>
            </div>
        </div>
    @endif

    @if(isset($mails))
        @include('email_widget', ['mails' => $mails])
    @endif

@stop

@section('js')
    <script>
        function submit() {
            $("#target").unbind('submit').submit();
        }

        $('#target').on('submit', function (e) {
            e.preventDefault();
            $('.errors').hide();
            $('#captcha').show();
        });
    </script>
@stop
