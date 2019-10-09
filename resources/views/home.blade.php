@extends('layouts.app')

@section('css')
    <style>
        .btn-primary {
            font-family: 'Alegreya', serif;
             background-color: #7e57c2;
             border-color: #7e57c2;
        }
        .btn-primary:hover {
             background-color: #7e57c2;
             border-color: #7e57c2;
        }
        .info {
            font-family: 'Alegreya', serif;
            padding-top: 50px;
        }
        .extra {
            padding-top: 40px !important;
            padding-bottom: 30px;
        }
        .extra p {
            font-size: 16px;
            text-align: justify;
        }
        .desc {
            margin-top: 30px;
            margin-bottom: 30px;
        }
        .extra a {
            text-decoration: none;
            font-weight: bold;
            font-size: 17px;
            text-align: left !important;
        }
        .seo {
            font-family: 'Alegreya', serif;
            margin-bottom: -50px;
            padding: 40px 10px 0 10px;
        }
        .seo h1 {
            text-align: center;
            font-size: 20px;
        }
        .seo p {
            font-size: 16px;
            text-align: justify;
            margin-top: 20px;
        }
    </style>
@stop

@section('content')
    <div class="container">
        <div class="col-md-8 offset-md-2 text-center info">
            <h1>Find anyone's email address</h1>
            <h4>MailsHunt helps you to find anyone's email address and connect with the people that matter for your business.</h4>
        </div>
        <div class="row">
            <div class="col-md-8 offset-md-2" style="margin-top: 50px;">
                <div class="jumbotron">
                    <form id="target" action="/domain-search" method="POST">
                        @csrf
                        <div class="form-group">
                            <div class="input-group input-group-lg">
                                <input type="text" name="domain" class="form-control form-control-lg" placeholder="company.com" required>
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary btn-block btn-lg">Find email addresses</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <p>Enter a domain name to find email addresses.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container desc upper">
        <div class="row">
            <div class="col-md-8 offset-md-2 text-center">
                <mark>DOMAIN SEARCH</mark>
                <h4>Get the email addresses behind any
                    website.</h4>
                <p style="font-size: 16px">The Domain Search lists all the email addresses of people who are working in a particular company. Use powerful algorithms to filter relevant email addresses from more than 20 millions of email addresses. It's the most powerful email-finding tool you ever found.</p>
            </div>
        </div>
    </div>

    <div class="extra" style="background-color: #e1e1e1;">
        <div class="container desc">
            <div class="row text-center">
                <div class="col-md-6">
                    <mark>EMAIL FINDER</mark>
                    <h4>Easily find verified email addresses by name and domain</h4>
                    <p>The Email Finder allows you to find anyone's email address given the company domain and name of your target lead. Hours of contact research are shrunk to milliseconds. We harvest and process millions of public data daily to offer a fast and reliable Email Finder for any business or market.</p>
                    <a href="/email-finder">→ Use Email Finder</a>
                </div>
                <div class="col-md-6">
                    <mark>EMAIL VERIFIER</mark>
                    <h4>Validate email addresses in real-time to reach real people</h4>
                    <p>When emails are sent to invalid email addresses, they bounce. The more you bounce, your sender score will drop. You'll be trapped by spam filters and eventually blacklisted. MailsHunt makes sure every email you send, reaches a real person. This will increase your deliverability, open rate and revenue.</p>
                    <a href="/email-verifier">→ Use Email Verifier</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container seo">
        <h1>What is the free email finding tool?</h1>
        <p>
            Finding an email address is often the last piece of the puzzle. Often you know exactly who you want to reach
            out to but you're lacking contact information. An email address is literally worth it's weight in gold. Some
            prospects have their email publicly listed on one of their online profiles - they're easy. You need to do a
            little extra sleuthing to find email addresses for everyone else. To make that detective much easier, you
            can use MailsHunt email finding tools. It is also known by names like email finder tool free, find emails by
            name free, lead finders, free lead finder, lead finder software, email tracker, lead find pro, email
            hunting, find emails, look for emails, hunter emails, find email address by domain, find emails from domain,
            hunter, snovio, findanyone, email finder free, norbert, email generation, email hunter, email address
            finder, hunt email, emails hunter, people emails, lead email finder, e mail hunter, emails of businesses,
            email of company, free emails search.
        </p>
    </div>
@stop
