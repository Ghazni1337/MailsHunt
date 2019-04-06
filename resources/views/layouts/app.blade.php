<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta http-equiv="Content-Type" content="text/html" charset=utf-8">
    <meta name="description" content="MailsHunt is the leading solution to find and verify professional email addresses. Start using MailsHunt and connect with the people that matter for your business." />
    <meta name="keywords" content="maildump, mail dump, mail-dump, maildump verifier, maildump-verifier, maildump finder, maildump-finder, extract email addresses, collect email addresses, validate email addresses, find emails, email leads, email marketing, hunter.io, emailhunter, anymailfinder, FindAnyEmail, devro labs, devrolabs" />
    <meta name="news_keywords" content="maildump, mail dump, mail-dump, maildump verifier, maildump-verifier, maildump finder, maildump-finder, extract email addresses, collect email addresses, validate email addresses, find emails, email leads, email marketing, hunter.io, emailhunter, anymailfinder, FindAnyEmail, devro labs, devrolabs" />
    <meta name="application-name" content="MailsHunt"/>
    <meta content="index,follow,archive" name="robots">
    <meta content="en" name="language">
    <link href="https://mailshunt.com/" rel="canonical">
    <link href="https://mailshunt.com/" rel="shortlink">
    <link href="{{ asset('image/fv.png') }}" rel="image_src">

    <link rel="alternate" href="https://mailshunt.com/" hreflang="x-default"><link rel="alternate" href="https://mailshunt.com/" hreflang="en"><link rel="alternate" href="https://mailshunt.com/" hreflang="en-au"><link rel="alternate" href="https://mailshunt.com/" hreflang="en-br"><link rel="alternate" href="https://mailshunt.com/" hreflang="en-ca"><link rel="alternate" href="https://mailshunt.com/" hreflang="en-de"><link rel="alternate" href="https://mailshunt.com/" hreflang="en-gb"><link rel="alternate" href="https://mailshunt.com/" hreflang="en-in"><link rel="alternate" href="https://mailshunt.com/" hreflang="en-nl"><link rel="alternate" href="https://mailshunt.com/" hreflang="en-us">

    <meta class="swiftype" name="path" data-type="enum" content="/">
    <meta class="swiftype" name="search_filters" data-type="enum" content="home">
    <meta class="swiftype" name="title" data-type="string" content="Find email addresses in seconds • MailsHunt">
    <meta class="swiftype" name="description" data-type="string" content="MailsHunt is the leading solution to find and verify professional email addresses. Start using MailsHunt and connect with the people that matter for your business.">
    <meta class="swiftype" name="image" data-type="enum" content="{{ asset('image/fv.png') }}">

    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Find email addresses in seconds • MailsHunt" />
    <meta property="og:url" content="https://mailshunt.com/" />
    <meta property="og:site_name" content="MailsHunt" />
    <meta property="og:description" content="MailsHunt is the leading solution to find and verify professional email addresses. Start using MailsHunt and connect with the people that matter for your business.">
    <meta property="og:image" content="{{ asset('image/fv.png') }}">

    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="Find email addresses in seconds • MailsHunt" />
    <meta name="twitter:domain" content="mailshunt.com"/>
    <meta name="twitter:description" content="MailsHunt is the leading solution to find and verify professional email addresses. Start using MailsHunt and connect with the people that matter for your business." />
    <meta name="twitter:image" content="{{ asset('image/fv.png') }}" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{csrf_token()}}">

    <link rel="shortcut icon" href="{{ asset('image/icon.png') }}"/>
    <link rel="icon" href="{{ asset('image/icon.png') }}">
    @section('title')
        <title>Find email addresses in seconds • MailsHunt</title>

    @show

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-137606439-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-137606439-1');
    </script>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @section('css')

    @show
    <style>
        body {
            font-family: 'Quicksand', sans-serif;
            font-weight: 500;
        }
        .nav-link:hover {
            color: #000 !important;
        }
        .navbar-nav {
            font-size: large;
            font-weight: bold;
        }
        .sitemap {
            text-decoration: none !important;
            color: black;
        }
        .footer-basic-centered{
             box-sizing: border-box;
             width: 100%;
             text-align: center;
            margin-top: 100px;
         }
        .social {
            color: black;
            padding-right: 35px;
        }
    </style>


</head>
<body>
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img height="50px" src="{{ asset('image/icon.png') }}" alt="AtlMails Logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/domain-search"><img src="{{ asset('image/search.png') }}" height="30px" alt="Search MailsHunt"> Search</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/email-finder"><img src="{{ asset('image/find.png') }}" height="30px" alt="Finder MailsHunt"> Finder</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/email-verifier"><img src="{{ asset('image/approval.png') }}" height="30px" alt="Verifier MailsHunt"> Verifier</a>
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" target="_blank" href="https://maildump.co/?ref=mailspre">APPS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/shop">SHOP</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/faq">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/support">SUPPORT</a>
                    </li>
                    <!-- Authentication Links -->

                </ul>
            </div>
        </div>
    </nav>

    <div>
        @section('content')

        @show
    </div>

    <footer class="footer-basic-centered">
        <hr>
        <div class="container-fluid" style="margin: 30px 0 !important;">
            <div class="row">
                <div class="col-md-4">
                    <p class="footer-company-name">© Copyright 2019 MailsHunt - All Rights Reserved</p>
                </div>
                <div class="col-md-4">
                    <a class="social" target="_blank" href="https://www.facebook.com/devrolabs"><i class="fab fa-facebook-f fa-2x"></i></a> <a class="social" target="_blank" href="https://twitter.com/DevroLABS"><i class="fab fa-twitter fa-2x"></i></a>
                    <a class="social" target="_blank" href="https://github.com/devrolabs"><i class="fab fa-github fa-2x"></i></a> <a style="color: black" target="_blank" href="https://www.linkedin.com/company/devrolabs"><i class="fab fa-linkedin-in fa-2x"></i></a>
                </div>
                <div class="col-md-4">
                    <p style="margin-bottom: 0px !important;">MailsHunt by <a target="_blank" style="color: inherit; text-decoration: inherit;" href="https://devrolabs.com"><strong>Devro LABS</strong></a></p>
                </div>
            </div>
        </div>
    </footer>
    @section('js')

    @show
</body>
</html>