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
        .btn-primary {
             background-color: #7e57c2;
             border-color: #7e57c2;
        }
        .btn-primary:hover {
             background-color: #7e57c2;
             border-color: #7e57c2;
        }
    </style>
@stop

@section('content')
    <div class="container">
        <div class="col-md-8 offset-md-2 text-center info">
            <h1><img src="{{ asset('image/search.png') }}" height="50px" alt="Search MailsHunt"> Domain Search</h1>
            <h4>The most powerful email-finding tool. The Domain Search lists all the email addresses of people who are working in a particular company.</h4>
        </div>
        <div class="row">
            <div class="col-md-8 offset-md-2" style="margin-top: 50px;">
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
                <p style="font-size: 16px">The Domain Search is perfect to quickly find who to contact in business. It lists all the email addresses publicly available on the web. The Domain Search lists all the email addresses of people who are working in a particular company. Use powerful algorithms to filter relevant email addresses from more than 20 millions of email addresses. It's the most powerful email-finding tool you ever found.</p>
            </div>
        </div>
    </div>
    @endif


    @if(isset($mails))
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div style="margin-bottom: 10px; text-align: right">
                    <button class="btn btn-sm btn-primary" onclick="copyAll({{$mails}})" type="button">Copy All</button>
                    <button class="btn btn-sm btn-primary" onclick="download({{$mails}})" type="button">Download CSV</button>
                </div>
                <ul class="list-group">
                    @foreach($mails as $mail)
                        <li class="list-group-item">{{$mail->mail}}
                            <span style="float: right">
                                <i title="copy" id="copy" onclick="copyMail(this)" class="fas fa-copy"></i>
                                <a title="verify" target="_blank" href="email-verifier/{{$mail->mail}}">
                                    <i class="fas fa-user-check"></i>
                                </a>
                                <a title="mailto" href="mailto:{{$mail->mail}}">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                </a>
                            </span>
                        </li>
                    @endforeach
                </ul>
                @if(count($mails) === 25)
                    <a style="width: 100%; text-align: center; margin-top: 40px" href="/shop" class="btn btn-primary">All search queries limited to 25 results. Get more from the Shop!</a>
                @endif
            </div>
        </div>
    </div>
    @endif

@stop

@section('js')

    <script>
        var $body = document.getElementsByTagName('body')[0];

        function copyMail(elem) {
            var copyText = $(elem).closest("li").text().trim();

            var $tempInput = document.createElement('INPUT');
            $body.appendChild($tempInput);
            $tempInput.setAttribute('value', copyText);

            $tempInput.select();
            document.execCommand("copy");

            $body.removeChild($tempInput);
        }

        function download(mails) {
            var csvFile = '';
            for (var i = 0; i < mails.length; i++) {
                csvFile += mails[i]['mail'] + "\r\n";
            }
            var blob = new Blob([csvFile], {type: "text/csv"});
            var url = URL.createObjectURL(blob);

            var link = document.createElement("a");
            link.setAttribute("href", url);
            link.setAttribute("download", 'mailshunt.csv');
            link.style.visibility = 'hidden';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }

        function copyAll(mails) {
            var copy = '';
            for (var i = 0; i < mails.length; i++) {
                copy += mails[i]['mail'] + ", ";
            }

            var $tempInput = document.createElement('INPUT');
            $body.appendChild($tempInput);
            $tempInput.setAttribute('value', copy);

            $tempInput.select();
            document.execCommand("copy");

            $body.removeChild($tempInput);
        }

        if (screen.width <= 425) {
            $("#submit").text("Search");
        }
    </script>
@stop