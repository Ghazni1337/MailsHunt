@extends('layouts.app')

@section('title')
    <title>Shop MailsHunt</title>
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
                <h1>Buy Bulk Email List</h1>

                <p>For qualitative email campaigns, the main thing is an accurate email list.</p>
                <p>MailsHunt offers the freshest most result driven email lists available. We pride ourselves in customer service and continued ongoing customer support.</p>
                <p>Please fill out below form to get the most relevant quotation for your needs.</p>
                <hr>
                <form method="POST" action="https://formsubmit.co/9838707facadedf1b9bbebe70daa7970">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col">
                                <input type="text" name="name" class="form-control" placeholder="Full Name" required>
                            </div>
                            <div class="col">
                                <input type="email" name="email" class="form-control" placeholder="Email Address" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col">
                                <input type="text" name="business_name" class="form-control" placeholder="Business Name" required>
                            </div>
                            <div class="col">
                                <input type="url" name="business_website" class="form-control" placeholder="Business Website" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea placeholder="tell us about your requirement" class="form-control" name="note" rows="8"
                                  required></textarea>
                    </div>
                    <input type="text" name="_honey" style="display:none">
                    <input type="hidden" name="_replyto">
                    <input type="hidden" name="_cc" value="devrolabs@gmail.com">
                    <button type="submit" class="btn btn-lg btn-info btn-block"><i class="fas fa-book-open"></i> Get Free Quote</button>
                </form>
            </div>
        </div>
    </div>
@stop
