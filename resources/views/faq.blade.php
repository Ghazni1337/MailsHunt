@extends('layouts.app')

@section('title')
    <title>FAQ AltMails</title>
@stop

@section('css')
    <style>
        .faq-nav {
            flex-direction: column;
            margin: 0 0 32px;
            border-radius: 2px;
            border: 1px solid #ddd;
            box-shadow: 0 1px 5px rgba(85, 85, 85, 0.15);
        }

        .faq-nav .nav-link {
            position: relative;
            display: block;
            margin: 0;
            padding: 13px 16px;
            background-color: #fff;
            border: 0;
            border-bottom: 1px solid #ddd;
            border-radius: 0;
            color: #616161;
            transition: background-color 0.2s ease;
        }

        .faq-nav .nav-link:hover {
            background-color: #f6f6f6;
        }

        .faq-nav .nav-link.active {
            background-color: #f6f6f6;
            font-weight: 700;
            color: rgba(0, 0, 0, .87);
        }

        .faq-nav .nav-link:last-of-type {
            border-bottom-left-radius: 2px;
            border-bottom-right-radius: 2px;
            border-bottom: 0;
        }

        .faq-nav .nav-link i.mdi {
            margin-right: 5px;
            font-size: 18px;
            position: relative;
        }

        .tab-content {
            box-shadow: 0 1px 5px rgba(85, 85, 85, 0.15);
        }

        .tab-content .card {
            border-radius: 0;
        }

        .tab-content .card-header {
            padding: 15px 16px;
            border-radius: 0;
            background-color: #f6f6f6;
        }

        .tab-content .card-header h5 {
            margin: 0;
        }

        .tab-content .card-header h5 button {
            display: block;
            width: 100%;
            padding: 0;
            border: 0;
            font-weight: 500;
            font-size: 18px;
            color: rgba(0, 0, 0, .87);
            text-align: left;
            white-space: normal;
        }

        .tab-content .card-header h5 button:hover, .tab-content .card-header h5 button:focus, .tab-content .card-header h5 button:active, .tab-content .card-header h5 button:hover:active {
            text-decoration: none;
        }

        .tab-content .card-body p {
            /*color: #616161;*/
            font-size: 16px;
        }

        .tab-content .card-body p:last-of-type {
            margin: 0;
        }

        .accordion > .card:not(:first-child) {
            border-top: 0;
        }

        .collapse.show .card-body {
            border-bottom: 1px solid rgba(0, 0, 0, .125);
        }

        h1 {
            text-align: center;
            color: #103742;
            padding: 40px 0;
        }
    </style>
@stop

@section('content')
    <div class="container" style="padding-bottom: 60px">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h1>ATLMAILS FAQ</h1>

                <div class="tab-content" id="faq-tab-content">
                    <div class="tab-pane show active" id="tab1" role="tabpanel" aria-labelledby="tab1">
                        <div class="accordion" id="accordion-tab-1">
                            <div class="card">
                                <div class="card-header" id="accordion-tab-1-heading-1">
                                    <h5>
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                                data-target="#accordion-tab-1-content-1" aria-expanded="false"
                                                aria-controls="accordion-tab-1-content-1">How much does it cost to use AltMails?
                                        </button>
                                    </h5>
                                </div>
                                <div class="collapse show" id="accordion-tab-1-content-1"
                                     aria-labelledby="accordion-tab-1-heading-1" data-parent="#accordion-tab-1">
                                    <div class="card-body">
                                        <p>It's absolutely free. In the near future, we are planning to launch our PRO features.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="accordion-tab-1-heading-8">
                                    <h5>
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                                data-target="#accordion-tab-1-content-8" aria-expanded="false"
                                                aria-controls="accordion-tab-1-content-8">What does AltMails provide as a service?
                                        </button>
                                    </h5>
                                </div>
                                <div class="collapse" id="accordion-tab-1-content-8"
                                     aria-labelledby="accordion-tab-1-heading-8" data-parent="#accordion-tab-1">
                                    <div class="card-body">
                                        <p>AltMails main focus and aim is to provide a reliable, convenient and easy to use way of protecting your identity from spammers. With AltMails, you can:</p>
                                        <ul>
                                            <li>stop giving out your personal email address online.</li>
                                            <li>read your emails in your personal inbox while using our service as an extra layer of protection.</li>
                                            <li>Unsubscribe from the email address if it gets spammed.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="accordion-tab-1-heading-2">
                                    <h5>
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                                data-target="#accordion-tab-1-content-2" aria-expanded="false"
                                                aria-controls="accordion-tab-1-content-2">How does AltMails work?
                                        </button>
                                    </h5>
                                </div>
                                <div class="collapse" id="accordion-tab-1-content-2"
                                     aria-labelledby="accordion-tab-1-heading-2" data-parent="#accordion-tab-1">
                                    <div class="card-body">
                                        <p>It works by hiding your personal email address behind AltMails email address.</p>
                                        <p>AltMails helps you to protect your privacy by providing you with custom email addresses that can be used to forward all incoming emails to your personal account. The emails forwarded by our service are not stored. Anytime you're receiving unwanted emails, simply unsubscribe from the AltMails email address and you can create another AltMail again anytime.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="accordion-tab-1-heading-3">
                                    <h5>
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                                data-target="#accordion-tab-1-content-3" aria-expanded="false"
                                                aria-controls="accordion-tab-1-content-3">
                                            Can I have multiple AltMails addresses?
                                        </button>
                                    </h5>
                                </div>
                                <div class="collapse" id="accordion-tab-1-content-3"
                                     aria-labelledby="accordion-tab-1-heading-3" data-parent="#accordion-tab-1">
                                    <div class="card-body">
                                        <p>Absolutely. You can create any number of AltMails using the form which is on the home page.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="accordion-tab-1-heading-4">
                                    <h5>
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                                data-target="#accordion-tab-1-content-4" aria-expanded="false"
                                                aria-controls="accordion-tab-1-content-4">How do I unsubscribe from an AltMails email address?
                                        </button>
                                    </h5>
                                </div>
                                <div class="collapse" id="accordion-tab-1-content-4"
                                     aria-labelledby="accordion-tab-1-heading-4" data-parent="#accordion-tab-1">
                                    <div class="card-body">
                                        <p>Every time you receive a forwarding email from us. There is a link mention on the email body which you can use to unsubscribe from the AltMails email address.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="accordion-tab-1-heading-5">
                                    <h5>
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                                data-target="#accordion-tab-1-content-5" aria-expanded="false"
                                                aria-controls="accordion-tab-1-content-5">Does AltMails filter spam and viruses?
                                        </button>
                                    </h5>
                                </div>
                                <div class="collapse" id="accordion-tab-1-content-5"
                                     aria-labelledby="accordion-tab-1-heading-5" data-parent="#accordion-tab-1">
                                    <div class="card-body">
                                        <p>Yes. While AltMails is not meant to be an anti-spam service we do our best to filter out obvious spam and virus messages. Spam and virus messages will be rejected.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="accordion-tab-1-heading-6">
                                    <h5>
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                                data-target="#accordion-tab-1-content-6" aria-expanded="false"
                                                aria-controls="accordion-tab-1-content-6">Can I recover my emails later?
                                        </button>
                                    </h5>
                                </div>
                                <div class="collapse" id="accordion-tab-1-content-6"
                                     aria-labelledby="accordion-tab-1-heading-6" data-parent="#accordion-tab-1">
                                    <div class="card-body">
                                        <p>No. There is no way to recover because we don't store any of emails which process through our service.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="accordion-tab-1-heading-7">
                                    <h5>
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                                data-target="#accordion-tab-1-content-7" aria-expanded="false"
                                                aria-controls="accordion-tab-1-content-7">How is it protected and how is my privacy respected?
                                        </button>
                                    </h5>
                                </div>
                                <div class="collapse" id="accordion-tab-1-content-7"
                                     aria-labelledby="accordion-tab-1-heading-7" data-parent="#accordion-tab-1">
                                    <div class="card-body">
                                        <p>AtlMails does not have any access to your inbox or email account and does not store the emails forwarded to you. The messages or emails that AltMails has access to are the ones sent to us. We do not disclose or sell any of your data.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="accordion-tab-1-heading-9">
                                    <h5>
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                                data-target="#accordion-tab-1-content-9" aria-expanded="false"
                                                aria-controls="accordion-tab-1-content-9">I've not received any email through AltMails?
                                        </button>
                                    </h5>
                                </div>
                                <div class="collapse" id="accordion-tab-1-content-9"
                                     aria-labelledby="accordion-tab-1-heading-9" data-parent="#accordion-tab-1">
                                    <div class="card-body">
                                        <p>Check your spam folder. Sometimes AltMails emails get in there, especially if you are receiving a lot of them. Mark them as "not spam" if your email provider supports this feature.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
