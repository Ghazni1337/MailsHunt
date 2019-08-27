@extends('layouts.app')

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
                    <h3>Bulk API Usage</h3>
                    <p>Using the email verifier bulk API endpoint you can verify unlimited email addresses at one. All you have to do is perform a POST request on the main lookup endpoint using the following schema.</p>
                    <p class="code">
                        curl -X POST https://mailshunt.com/api/verifier-lookup \<br>
                        -H "Content-Type: application/json" \<br>
                        -d '{<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;"emails": [<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"support@devrolabs.com",<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"support@mailshunt.com"<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;]<br>
                        }'
                    </p>
                    <p>sample API response</p>
                    <p class="code">
                        { <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;"emails": [{ <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"success": true, <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"email": "support@devrolabs.com", <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"deliverable": true, <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"valid-format": true, <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"disposable": false, <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"role-base": true, <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"free-mail": false, <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"server-status": true, <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"email-domain": "devrolabs.com", <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"email-user": "support" <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;}, { <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"success": true, <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"email": "support@mailshunt.com", <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"deliverable": true, <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"valid-format": true, <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"disposable": false, <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"role-base": true, <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"free-mail": false, <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"server-status": true, <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"email-domain": "mailshunt.com", <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"email-user": "support" <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;}] <br>
                        } <br>
                    </p>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')

@stop
