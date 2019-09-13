@extends('layouts.app')

@section('title')
    <title>Support MailsHunt</title>
@stop

@section('description')
    <meta name="description" content="Feel free to reach out to us by sending an email or by filling out the support form. You will receive an instant response from a member of our team."/>
@stop

@section('css')
    <style>
        .container p {
            font-size: 17px;
        }
    </style>
@stop

@section('content')
    <div class="container" style="margin-bottom: 60px; margin-top: 60px">
        <div class="row">
            <div class="col-md-8 offset-md-2 text-center">
                <mark>HAVE ANY QUESTIONS?</mark>

                <p style="margin-top: 40px">Feel free to reach out to us by sending an email to <a
                            href="mailto:support@mailshunt.com"> support@mailshunt.com</a> or by filling out the form below.</p>
                <p>You will receive an instant response from a member of our team.</p>
                <hr>
                <form method="POST" action="https://formsubmit.co/9838707facadedf1b9bbebe70daa7970">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col">
                                <input type="text" name="name" class="form-control" placeholder="Full Name"
                                       value="{{ old('name') }}" required>
                            </div>
                            <div class="col">
                                <input type="email" name="email" class="form-control" placeholder="Email Address"
                                       value="{{ old('email') }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea placeholder="tell us about your problem" class="form-control" name="note" rows="10"
                                  required>{{ old('note') }}</textarea>
                    </div>
                    <input type="text" name="_honey" style="display:none">
                    <input type="hidden" name="_replyto">
                    <input type="hidden" name="_cc" value="devrolabs@gmail.com">
                    <button type="submit" class="btn btn-lg btn-dark btn-block"><i class="fa fa-paper-plane"></i> Submit
                        Form
                    </button>
                </form>
            </div>
        </div>
    </div>
@stop
