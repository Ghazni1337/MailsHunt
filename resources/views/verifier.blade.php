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
                    <p>Enter an email address to verify its accuracy.</p>
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


    @if(isset($verify))
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <table class="table table-striped table-sm table-hover">
                    <tbody>
                    <tr>
                        <th scope="row">deliverable</th>
                        <td>@php echo ($verify["deliverable"]) ? "Yes" : "No" @endphp</td>
                    </tr>
                    <tr>
                        <th scope="row">valid format</th>
                        <td>@php echo ($verify["valid_format"]) ? "Yes" : "No" @endphp</td>
                    </tr>
                    <tr>
                        <th scope="row">disposable</th>
                        <td>@php echo ($verify["disposable"]) ? "Yes" : "No" @endphp</td>
                    </tr>
                    <tr>
                        <th scope="row">server status</th>
                        <td>@php echo ($verify["server_status"]) ? "Yes" : "No" @endphp</td>
                    </tr>
                    <tr>
                        <th scope="row">role</th>
                        <td>@php echo ($verify["role"]) ? "Yes" : "No" @endphp</td>
                    </tr>
                    <tr>
                        <th scope="row">free</th>
                        <td>@php echo ($verify["free"]) ? "Yes" : "No" @endphp</td>
                    </tr>
                    <tr>
                        <th scope="row">email user</th>
                        <td>{{$verify["email_user"]}}</td>
                    </tr>
                    <tr>
                        <th scope="row">email domain</th>
                        <td>{{$verify["email_domain"]}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif

@stop

@section('js')

@stop