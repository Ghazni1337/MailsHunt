                    @extends('layouts.master')
                    @section('content')
                    <div class="add-plan-form">
                        <div class="col-md-6">
                                    <div class="card" style="min-height: 484px;">
                                        <div class="card-header"><h3>Horizontal Form</h3></div>
                                        <div class="card-body">
                                            <form class="forms-sample">
                                                <div class="form-group row">
                                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Username</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="exampleInputUsername2" placeholder="Username">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                                                    <div class="col-sm-9">
                                                        <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Email">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="exampleInputMobile" class="col-sm-3 col-form-label">Mobile</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="exampleInputMobile" placeholder="Mobile number">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Password</label>
                                                    <div class="col-sm-9">
                                                        <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Re Password</label>
                                                    <div class="col-sm-9">
                                                        <input type="password" class="form-control" id="exampleInputConfirmPassword2" placeholder="Password">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input">
                                                        <span class="custom-control-label">&nbsp;Remember me</span>
                                                    </label>
                                                </div>
                                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                                <button class="btn btn-light">Cancel</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                        @endsection 