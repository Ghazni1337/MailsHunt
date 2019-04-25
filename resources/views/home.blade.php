@extends('layouts.app')

@section('css')
    <style>

    </style>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2" style="margin-top: 50px;">
                <div class="jumbotron" style="border: 1px solid black">
                    <div class="errors">
                        @if ($errors->any())
                            <div style="text-align: center; line-height: 40px;">
                                @foreach ($errors->all() as $error)
                                    <p class="text-center error-msg"><i class="fa fa-exclamation-circle"
                                                                        aria-hidden="true"></i> {{$error}}</p>
                                @endforeach
                            </div>
                        @endif
                        @if (isset($mgs))
                            <div style="text-align: center; line-height: 40px;">
                                <p class="text-center success-msg"><i class="fa fa-check-circle"
                                                                      aria-hidden="true"></i> {{$mgs}}
                                </p>
                            </div>
                        @endif
                    </div>
                    <form id="target" action="/domain-search" method="POST">
                        @csrf
                        <div class="form-group">
                            <div class="input-group input-group-lg">
                                <input type="text" name="domain" class="form-control form-control-lg"
                                       placeholder="company.com"
                                       value="{{ old('domain') }}" required>
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-defalt btn-block btn-lg"><strong>
                                            Find emails addresses</strong></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <ul class="list-group">
                    @if(isset($mails))
                        @foreach($mails as $mail)
                            <li class="list-group-item">{{$mail->mail}} <span style="float: right"><a href="mailto:{{$mail->mail}}"><i class="fa fa-envelope" aria-hidden="true"></i></a></span></li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </div>

@stop

@section('js')

@stop