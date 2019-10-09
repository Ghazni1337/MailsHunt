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
    </style>
@stop

@section('content')
    <div class="container">
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
                    <h4 style="margin-bottom: 20px">Email Verifier</h4>
                    <form id="target" action="/email-verifier" method="POST">
                        @csrf
                        <div class="form-group">
                            <div class="input-group input-group-lg">
                                <input type="email" name="email" class="form-control form-control-lg"
                                       placeholder="janedoe@company.com"
                                       value="{{ isset($email) ? $email : old('email') }}" required>
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-defalt btn-block btn-lg">
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
                                        <h3 style="color: black">Invalid email address</h3>
                                        <p>This email address isn't used to receive emails.</p>
                                    </div>
                                @elseif($verify['status'] == "DISPOSABLE")
                                    <div class="col-md-1">
                                        <svg style="color: yellow; width: 40px" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="exclamation-circle" class="svg-inline--fa fa-exclamation-circle fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M504 256c0 136.997-111.043 248-248 248S8 392.997 8 256C8 119.083 119.043 8 256 8s248 111.083 248 248zm-248 50c-25.405 0-46 20.595-46 46s20.595 46 46 46 46-20.595 46-46-20.595-46-46-46zm-43.673-165.346l7.418 136c.347 6.364 5.609 11.346 11.982 11.346h48.546c6.373 0 11.635-4.982 11.982-11.346l7.418-136c.375-6.874-5.098-12.654-11.982-12.654h-63.383c-6.884 0-12.356 5.78-11.981 12.654z"></path></svg>
                                    </div>
                                    <div class="col-md-11">
                                        <h3 style="color: black">Disposable email address</h3>
                                        <p>This domain name is used to hide real email addresses.</p>
                                    </div>
                                @else
                                    <div class="col-md-1">
                                        <svg style="color: green; width: 40px" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check-circle" class="svg-inline--fa fa-check-circle fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"></path></svg>
                                    </div>
                                    <div class="col-md-11">
                                        <h3 style="color: black">Valid email address</h3>
                                        <p>This email address can be used safely.</p>
                                    </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="verifier-detail">
                                        Email format
                                        <div class="pull-right"><div class="green">@if($verify['valid_format']) VALID @else INVALID @endif</div></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="verifier-detail">
                                        Email type
                                        <div class="pull-right"><div class="green">@if($verify['free']) Free-email @elseif($verify['role']) Role-base @else PROFESSIONAL @endif</div></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="verifier-detail">
                                        Server status
                                        <div class="pull-right"><div class="red">@if($verify['server_status']) VALID @else INVALID @endif</div></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="verifier-detail">
                                        Disposable
                                        <div class="pull-right"><div class="red">@if($verify['disposable']) TRUE @else FALSE @endif</div></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <p>Enter an email address to verify its accuracy.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @if(!isset($verify))
        <div class="container desc">
            <div class="row">
                <div class="col-md-8 offset-md-2 text-center">
                    <mark>EMAIL VERIFIER</mark>
                    <h4>Verify the deliverability of any email address.</h4>
                    <p style="font-size: 16px">The Email Verifier does a complete check of the email address to let you send your emails with a complete confidence. As it uses our unique set of data, the Email Verifier can return a result even where other standard verification tools fail.</p>
                </div>
            </div>
        </div>
    @endif

@stop

@section('js')

@stop
