@extends('layouts.app')

@section('css')
    <style>
        .error-msg {
            color: #FA7C72;
            border-radius: 1rem;
            border: 1px solid #FA7C72;
            font-size: 18px;
            padding: 5px 10px;
        }
        .success-msg {
            color: #80ee6e;
            border-radius: 1rem;
            border: 1px solid #80ee6e;
            font-size: 18px;
            padding: 5px 10px;
        }
    </style>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2" style="margin-top: 50px;">
                <div class="jumbotron" style="box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23); padding: 2rem 2rem !important;">
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
                                <div class="input-group-prepend">
                                    <input type="text" name="name" class="form-control form-control-lg"
                                           placeholder="Jane Doe"
                                           value="{{ old('name') }}" id="inlineFormInputGroup" required>
                                    <div class="input-group-text"><strong><i class="fas fa-at"></i></strong></div>
                                </div>
                                <input type="text" name="domain" class="form-control form-control-lg"
                                       placeholder="company.com"
                                       value="{{ old('domain') }}" id="inlineFormInputGroup" required>
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-defalt btn-block btn-lg"><strong><i
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
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 text-center">
                    <mark style="background-color: #103742; color: white; padding: 5px">EMAIL FINDER</mark>
                    <h4 style="padding: 20px 0; color: #103742; font-weight: bold;">Find the email address of any
                        professional.</h4>
                    <p style="font-size: 16px">Find the email addresses of people you want to contact one by one or in
                        bulk to enrich your database. The Email Finder uses a large number of signals to find the proven
                        or most probable email address of anyone in a fraction of second.</p>
                </div>
            </div>
        </div>
    @endif

    @if(isset($mails))
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <ul class="list-group">
                    @foreach($mails as $mail)
                        <li class="list-group-item">{{$mail->mail}} <span style="float: right"><a href="mailto:{{$mail->mail}}"><i class="fa fa-envelope" aria-hidden="true"></i></a></span></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    @endif

@stop

@section('js')

@stop