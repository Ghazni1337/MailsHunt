                    @extends('layouts.master')
                    @section('content')
                    <div class="">
                        <div class="col-md-6 add-plan-form">
                                    <div class="card" style="min-height: 484px;">
                                        <div class="card-header"><h3>{{ $title }}</h3></div>
                                        <div class="card-body">
                                            <form class="forms-sample" method="post">
                                                @csrf
                                                <div class="form-group row">
                                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Title</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" id="exampleInputUsername2" value="{{ $plan->title }}">
                                                        @if ($errors->has('title'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('title') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Credits</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" name="credits" class="form-control{{ $errors->has('credits') ? ' is-invalid' : '' }}" id="exampleInputEmail2" value="{{ $plan->credits }}">
                                                        @if ($errors->has('credits'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('credits') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Users</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" name="users" class="form-control{{ $errors->has('users') ? ' is-invalid' : '' }}" id="exampleInputConfirmPassword2" value="{{ $plan->users }}">
                                                        @if ($errors->has('users'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('users') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Price</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="price" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" id="exampleInputConfirmPassword2" value="{{ $plan->price }}" value="{{old('price')}}">
                                                        @if ($errors->has('price'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('price') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Daily Emails</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" name="daily_emails" class="form-control{{ $errors->has('daily_emails') ? ' is-invalid' : '' }}" id="exampleInputPassword2" value="{{ $plan->daily_emails }}">
                                                        @if ($errors->has('daily_emails'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('daily_emails') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="exampleInputMobile" class="col-sm-3 col-form-label">Campaigns Accounts</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" name="campaigns" class="form-control{{ $errors->has('campaigns') ? ' is-invalid' : '' }}" id="exampleInputMobile" value="{{ $plan->campaigns }}">
                                                        @if ($errors->has('campaigns'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('campaigns') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary mr-2 submit-btn">Update</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                        @endsection 