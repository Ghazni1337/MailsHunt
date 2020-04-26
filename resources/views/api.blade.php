@extends('layouts.app')

@section('title')
    <title>Email Verifier API</title>
@stop

@section('description')
    <meta name="description" content="Prevent bounced emails and low-quality users with FREE professional-grade email verifier API"/>
@stop

@section('css')
    <style>
        .api {
            padding-top: 50px;
        }
        .api p {
            font-size: 16px;
        }
        .api h3 {
            font-weight: bold;
        }
        .code {
             font-size: 15px !important;
             padding: 0.75em 1em;
             overflow-x: scroll;
             white-space: nowrap;
             border: 1px solid rgba(0, 0, 0, 0.1);
             background-color: #fff;
         }
    </style>
@stop

@section('content')
    <div class="container desc api">
        <div class="row">
            <div class="col-md-8 offset-md-2 text-center">
                <mark>EMAIL VERIFIER API</mark>
                <h4>Prevent bounced emails and low-quality users with FREE professional-grade email verifier API</h4>
                <p style="font-size: 16px">The API was built with the intention of providing software engineers and businesses with a simple and easy to use solution to bounced emails. Whether you're a developer writing an application that requires the registration of new valid users or a business with a large mailing list, We can handle the heavy lifting of verifying the validity of your email addresses so that you can make a confident decision on whether or not to dispatch messages to a given address.</p>
            </div>
        </div>
    </div>
    <div style="background: #e3e3da; padding-bottom: 100px; margin-bottom: -100px;">
        <div class="container api">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <h3>API Usage</h3>
                    <p>Using the email verifier API endpoint is pretty straightforward. All you need to do is perform a GET request on the main lookup endpoint using the following schema.</p>
                    <p class="code">curl -X GET https://mailshunt.com/api/verifier-lookup/test@email.com</p>
                    <p>sample API response</p>
                    <p class="code">{<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;"success": true,<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;"email": "support@devrolabs.com",<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;"deliverable": true,<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;"valid-format": true,<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;"disposable": false,<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;"role-base": true,<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;"free-mail": false,<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;"server-status": true,<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;"email-domain": "devrolabs.com",<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;"email-user": "support"<br>
                        }</p>
                </div>
            </div>
        </div>

        <div class="container api">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <h3>API Limitation</h3>
                    <p>To ensure consistent availability and performance for everyone we apply some limits to how APIs
                        are used. These limits are designed to detect when some applications are making extraordinary
                        demands on server resources. The restrictions shouldn't affect ordinary users. Only certain
                        applications making exceptional requests for APIs will be affected.</p>
                    <p>By default, it is set to 3600 requests per month per user. But the number of requests to the API
                        is restricted to a maximum of 5 requests per hour per user. If you are looking for more requests
                        please contact us!</p>
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
                                    <input type="text" name="company_name" class="form-control" placeholder="No. of requests per month" required>
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-dark btn-block">Submit</button>
                                </div>
                            </div>
                        </div>
                        <input type="text" name="_honey" style="display:none">
                        <input type="hidden" name="_autoresponse" value="We have successfully received your submission. You will receive an instant response from a member of our team.">
                        <input type="hidden" name="_cc" value="devrolabs@gmail.com">
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')

@stop
