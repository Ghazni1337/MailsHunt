@extends('layouts.app')

@section('title')
    <title>Email Verifier - Verify any email address</title>
@stop

@section('description')
    <meta name="description" content="The most complete email checker. The Email Verifier does a complete check of the email address to let you send your emails with complete confidence. Never get bounces anymore."/>
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

        .verifier-result-details {
            color: #737373;
            font-weight: 600;
            padding-top: 30px;
        }
        .verifier-detail {
            padding: 10px 28px;
            border-bottom: 1px solid #e6e6e6;
            background: #fafbfb;
            font-size: 14px;
        }
        .pull-right {
            text-transform: uppercase;
            float: right;
        }

        .red {
            color: #000000;
        }
    </style>
@stop

@section('content')
    <div class="container">
        <div class="col-md-8 offset-md-2 text-center info">
            <h1><img src="{{ asset('image/approval.png') }}" height="50px" alt="Email Verifier"> Email Verifier</h1>
            <h4>The Email Verifier does a complete check of the email address to let you send your emails with complete confidence.</h4>
        </div>
        @include('ads.ad_bar')
        <div class="row">
            <div class="col-md-8 offset-md-2" style="margin-top: 20px;">
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
                    <h4 style="margin-bottom: 20px">Email Verifier</h4>
                    <form id="target" action="/email-verifier" method="POST">
                        @csrf
                        <div class="form-group">
                            <div class="input-group input-group-lg">
                                <div id="captcha">
                                    {!! Anhskohbo\NoCaptcha\Facades\NoCaptcha::display(['data-callback' => 'submit']) !!}
                                    {!! Anhskohbo\NoCaptcha\Facades\NoCaptcha::renderJs() !!}
                                </div>
                                <input type="email" name="email" class="form-control form-control-lg"
                                       placeholder="janedoe@company.com"
                                       value="{{ isset($email) ? $email : old('email') }}" required>
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary btn-block btn-lg">
                                        <strong>Verify</strong></button>
                                </div>
                            </div>
                        </div>
                    </form>
                    @if(isset($verify))
                        <div class="verifier-result-details">
                            <div class="row">
                                @if($verify['status'] == "INVALID")
                                    <div class="col-md-1">
                                        <svg style="color: red; width: 40px" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times-circle" class="svg-inline--fa fa-times-circle fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm121.6 313.1c4.7 4.7 4.7 12.3 0 17L338 377.6c-4.7 4.7-12.3 4.7-17 0L256 312l-65.1 65.6c-4.7 4.7-12.3 4.7-17 0L134.4 338c-4.7-4.7-4.7-12.3 0-17l65.6-65-65.6-65.1c-4.7-4.7-4.7-12.3 0-17l39.6-39.6c4.7-4.7 12.3-4.7 17 0l65 65.7 65.1-65.6c4.7-4.7 12.3-4.7 17 0l39.6 39.6c4.7 4.7 4.7 12.3 0 17L312 256l65.6 65.1z"></path></svg>
                                    </div>
                                    <div class="col-md-11">
                                        <h3 style="color: black">{{$verify['status']}}</h3>
                                        <p>The email address can't receive emails.</p>
                                    </div>
                                @elseif($verify['status'] == "CATCH-ALL")
                                    <div class="col-md-1">
                                        <svg style="color: yellow; width: 40px" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="exclamation-circle" class="svg-inline--fa fa-exclamation-circle fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M504 256c0 136.997-111.043 248-248 248S8 392.997 8 256C8 119.083 119.043 8 256 8s248 111.083 248 248zm-248 50c-25.405 0-46 20.595-46 46s20.595 46 46 46 46-20.595 46-46-20.595-46-46-46zm-43.673-165.346l7.418 136c.347 6.364 5.609 11.346 11.982 11.346h48.546c6.373 0 11.635-4.982 11.982-11.346l7.418-136c.375-6.874-5.098-12.654-11.982-12.654h-63.383c-6.884 0-12.356 5.78-11.981 12.654z"></path></svg>
                                    </div>
                                    <div class="col-md-11">
                                        <h3 style="color: black">{{$verify['status']}}</h3>
                                        <p>The email server has a catch-all policy that accepts all the email
                                            addresses.</p>
                                    </div>
                                @elseif($verify['status'] == "BLOCKED")
                                    <div class="col-md-1">
                                        <svg style="color: yellow; width: 40px" aria-hidden="true" focusable="false"
                                             data-prefix="fas" data-icon="exclamation-circle"
                                             class="svg-inline--fa fa-exclamation-circle fa-w-16" role="img"
                                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <path fill="currentColor"
                                                  d="M504 256c0 136.997-111.043 248-248 248S8 392.997 8 256C8 119.083 119.043 8 256 8s248 111.083 248 248zm-248 50c-25.405 0-46 20.595-46 46s20.595 46 46 46 46-20.595 46-46-20.595-46-46-46zm-43.673-165.346l7.418 136c.347 6.364 5.609 11.346 11.982 11.346h48.546c6.373 0 11.635-4.982 11.982-11.346l7.418-136c.375-6.874-5.098-12.654-11.982-12.654h-63.383c-6.884 0-12.356 5.78-11.981 12.654z"></path>
                                        </svg>
                                    </div>
                                    <div class="col-md-11">
                                        <h3 style="color: black">{{$verify['status']}}</h3>
                                        <p>The email server prevented us from performing the verification.</p>
                                    </div>
                                @elseif($verify['status'] == "DISPOSABLE")
                                    <div class="col-md-1">
                                        <svg style="color: yellow; width: 40px" aria-hidden="true" focusable="false"
                                             data-prefix="fas" data-icon="exclamation-circle"
                                             class="svg-inline--fa fa-exclamation-circle fa-w-16" role="img"
                                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <path fill="currentColor"
                                                  d="M504 256c0 136.997-111.043 248-248 248S8 392.997 8 256C8 119.083 119.043 8 256 8s248 111.083 248 248zm-248 50c-25.405 0-46 20.595-46 46s20.595 46 46 46 46-20.595 46-46-20.595-46-46-46zm-43.673-165.346l7.418 136c.347 6.364 5.609 11.346 11.982 11.346h48.546c6.373 0 11.635-4.982 11.982-11.346l7.418-136c.375-6.874-5.098-12.654-11.982-12.654h-63.383c-6.884 0-12.356 5.78-11.981 12.654z"></path>
                                        </svg>
                                    </div>
                                    <div class="col-md-11">
                                        <h3 style="color: black">{{$verify['status']}}</h3>
                                        <p>The email address has a domain name used for temporary email addresses.</p>
                                    </div>
                                @else
                                    <div class="col-md-1">
                                        <svg style="color: green; width: 40px" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check-circle" class="svg-inline--fa fa-check-circle fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"></path></svg>
                                    </div>
                                    <div class="col-md-11">
                                        <h3 style="color: black">{{$verify['status']}}</h3>
                                        <p>The email address can receive emails.</p>
                                    </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="verifier-detail">
                                        Email Format
                                        <div class="pull-right"><div class="red">@if($verify['valid_format']) VALID @else INVALID @endif</div></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="verifier-detail">
                                        Email Type
                                        <div class="pull-right">
                                            <div class="red">@if($verify['email_type']) ROLE-BASED @else
                                                    PROFESSIONAL @endif</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="verifier-detail">
                                        Server Status
                                        <div class="pull-right"><div class="red">@if($verify['server_status']) VALID @else INVALID @endif</div></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="verifier-detail">
                                        Email Status
                                        <div class="pull-right">
                                            <div class="red">
                                                @switch($verify['email_status'])
                                                    @case(0)
                                                    VALID
                                                    @break
                                                    @case(1)
                                                    CATCH-ALL
                                                    @break
                                                    @case(2)
                                                    BLOCKED
                                                    @break
                                                    @default
                                                    INVALID
                                                    @break
                                                @endswitch
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="verifier-detail">
                                        Webmail
                                        <div class="pull-right">
                                            <div class="red">@if($verify['webmail']) TRUE @else FALSE @endif</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="verifier-detail">
                                        Disposable
                                        <div class="pull-right">
                                            <div class="red">@if($verify['disposable']) TRUE @else FALSE @endif</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <p>Enter an email address to check its accuracy.</p>
                    @endif
                </div>
            </div>
        </div>
        @include('ads.ad_bottom')
    </div>

    @if(!isset($verify))
        <div class="container desc">
            <div class="row">
                <div class="col-md-10 offset-md-1 text-center">
                    <mark>EMAIL VERIFIER</mark>
                    <h4>Verify the deliverability of any email address.</h4>
                    <p>
                        This email verification tool actually connects to the mail server
                        and checks whether the mailbox exists or not. Email Checker is a simple tool for verifying an
                        email address. It's free and quite easy to use. Just enter the email address and hit the verify
                        button. Then it tells you whether the email address is real or not. It extracts the MX records
                        from the email address and connects to the mail server (over SMTP and also simulates sending a
                        message) to make sure the mailbox really exists for that user/address. As it uses our unique set
                        of data, the Email Verifier can return a result even where other standard verification tools
                        fail. Our validation process has multiple treads: email format, domain information, server
                        status, and email type. We constantly strive to enhance our email verifier techniques, and
                        improving our services for you is our top priority in order to offer you an optimal experience
                        to verify an email address online. We have helped countless numbers of email list brokers, email
                        marketers, data centers, call centers, and lead generation groups by checking the email
                        addresses. Let us help check your email lists and reduce your bounce rate during your next
                        marketing campaign.
                    </p>
                </div>
            </div>
        </div>

        <div class="extra" style="background-color: #e1e1e1;">
            <div class="container desc">
                <div class="row text-center">
                    <div class="col-md-6">
                        <mark>EMAIL VERIFIER EXTENSION</mark>
                        <h4>Check email addresses online as you browse websites and validate them on the fly</h4>
                        <p>
                            The free email verification tool is a simple cloud-based tool that checks if a mailbox
                            really exists or not. Email Verifier allows users to not only validate an email address but
                            also validate email addresses in bulk, whilst they browse websites. The Email Verifier
                            removes invalid email addresses and reduces bounce rates, so you don't have to waste your
                            time and money on sending emails to non-existent email addresses.
                        </p>
                        <a href="/addons/email-verifier">→ Use Email Verifier Add-On</a>
                    </div>
                    <div class="col-md-6">
                        <mark>EMAIL VERIFIER API</mark>
                        <h4>Prevent bounced emails and low-quality users with free professional-grade email verifier
                            API</h4>
                        <p>
                            The API was built with the intention of providing software engineers and businesses with a
                            simple and easy to use solution to bounced emails. Whether you're a developer writing an
                            application that requires the registration of new valid users or a business with a large
                            mailing list, We can handle the heavy lifting of verifying the validity of your email
                            addresses so that you can make a confident decision.
                        </p>
                        <a href="/email-verifier-api">→ Use Email Verifier API</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container faq">
            <div class="col-md-12">
                <h2>Common questions about the Email Verifier</h2>
                <h3>Who is it for?</h3>
                <div class="faq-reply">
                    <p>
                        Everyone who sends email in whatever volume (from 1 to millions). Sending an email to an address
                        that doesn't exist results in a "hard bounce". Our email checker helps you by removing the
                        invalid email address from your mailing list and increasing future email deliverability.
                    </p>
                    <p>
                        By implementing our email verification technology, you can remove bad or invalid email addresses
                        from email campaigns before hitting the "send" button. Because bad email addresses have been
                        removed before sending, the amount of hard bounces is dramatically reduced thereby saving time,
                        effort and expense associated with processing invalid email addresses.
                    </p>
                </div>
                <h3>What is the use of the Email Verifier for online businesses?</h3>
                <div class="faq-reply">
                    <p>
                        As an online business, you want to attract new customers. You want to identify and nurture your
                        best customers and build meaningful business relationships. Unfortunately, not all customers
                        that arrive through your public-facing on-boarding process wish to engage with your business in
                        a meaningful way. Some typical use cases and traits of new clients that are of a lower quality
                        are:
                    </p>
                    <ul>
                        <li>
                            <b>Free trial abuse</b> - Does your business offer limited-time free trials of your product
                            or
                            service? If so, you might have noticed new leads signing up for multiple accounts rather
                            than engage with your paid options.
                        </li>
                        <li>
                            <b>Free content</b> - If your business offers digital content (e.g. e-books) in exchange for
                            an
                            email address, your customer may provide a temporary, one-time burner (or disposable) email
                            address.
                        </li>
                        <li>
                            <b>Fraud</b> - If your business accepts payments online, it is liable to settle charge-backs
                            due to
                            fraudulent transactions. When a customer is engaged in using stolen payment details to buy
                            from your business, the customer is unlikely to provide an email address that can be traced
                            or held accountable.
                        </li>
                        <li>
                            <b>“Bad data” in your CRM</b> - Bad (undeliverable) or junk (disposable/temporary/burner)
                            email
                            addresses in your back end systems need managing, pruning and updating at some point. This
                            maintenance activity takes resources away from what your business would rather be doing to
                            grow.
                        </li>
                    </ul>
                    <p>
                        If your company is having trouble signing up with burner/temporary/disposable email addresses,
                        you will be pleased to hear that our systems provide some of the most robust identification of
                        disposable email providers available anywhere. Unlike other providers who use simple static
                        lists of burner email providers, our systems go further and use sophisticated machine learning
                        algorithms to track more elusive disposable address providers.
                    </p>
                </div>
                <h3>Can a "valid" email address bounce?</h3>
                <div class="faq-reply">
                    <p>
                        The verifications are never totally sure, but we can guarantee that
                        more than 95% of "valid" email addresses won't bounce.
                    </p>
                </div>
                <h3>What does it mean when an email address is marked "catch-all"?</h3>
                <div class="faq-reply">
                    <p>
                        When you perform an Email Verification, the result might be "catch-all". Some email servers
                        accept all the email addresses on the same domain name, whether they have actually been created
                        or not. In this case, we can not make sure that the email address tested actually exists or just
                        return the "catch-all" status.
                    </p>
                </div>
                <h3>
                    Does it send an email to do the verification?
                </h3>
                <div class="faq-reply">
                    <p>
                        The email checker does the validation without sending an email, by
                        directly connecting to the SMTP server.
                    </p>
                </div>
                <h3>How much does it cost to use the Email Verifier?</h3>
                <div class="faq-reply">
                    <p>
                        It's absolutely free. In the near future, we are planning to launch our premium features.
                    </p>
                </div>
                <h3>What do you check for when verifying emails?</h3>
                <div class="faq-reply">
                    <p>
                        This is the list of the verifications we perform:
                    </p>
                    <ul>
                        <li>
                            Email Format: First, we verify the format of the email address is correct and looks like
                            "name@company.com".
                        </li>
                        <li>
                            Disposable Email Address: We check if the email address has a domain name used for temporary
                            email addresses.
                        </li>
                        <li>
                            Webmail Email Addresses: We verify if the email address uses a webmail like Gmail or Yahoo.
                        </li>
                        <li>
                            Presence of MX Records: We check if there are MX records on the domain. If there aren't, the
                            email address can't receive emails.
                        </li>
                        <li>
                            Presence of SMTP Server: We check if we are able to connect to the SMTP server (indicated in
                            MX records).
                        </li>
                        <li>
                            SMTP Check: We test the email address and see if it bounces or not, without sending an
                            email.
                        </li>
                        <li>
                            Accept-all Domain: We check if the server has a catch-all policy that accepts all the email
                            addresses.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
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
