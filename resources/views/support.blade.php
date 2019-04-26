@extends('layouts.app')

@section('title')
    <title>Support MailsHunt</title>
@stop

@section('css')
    <style>
        .container p {
            font-size: 17px;
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
                <h1>We're here to help!</h1>

                <p>Please feel free to Reach out if you have any question, we are 100% responsive and reply
                    instantly.
                    Please send us an e-mail at <a
                            href="mailto:support@mailshunt.com"> support@mailshunt.com</a> or you can fill out below
                    form. We are here to help you.</p>
                {{--<p>--}}
                    {{--Remember to check the <a--}}
                            {{--href="/faq"> FAQ</a> and our <a href="/privacy.pdf"> Privacy Policy</a>.--}}
                {{--</p>--}}
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
