            @extends('layouts.master')
            @section('content')

                <div class="main-content">
                    <div class="container-fluid">
                        <div class="page-header">
                            <div class="row align-items-end">
                                <div class="col-lg-8">
                                    <div class="page-header-title">
                                        <i class="ik ik-users" style="color: #7e57c2;"></i>
                                        <div class="d-inline">
                                            <h5>MailsHunt Registered Accounts</h5>
                                            <span>
                                                There are a total of <span id="count" style="color: #7e57c2; font-weight: bold;">{{ $accounts->count() }} Accounts(s)</span> on the system.
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="col-lg-4">
                                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="../index.html"><i class="ik ik-home"></i></a>
                                            </li>
                                            <li class="breadcrumb-item">
                                                <a href="#">Tables</a>
                                            </li>
                                            <li class="breadcrumb-item active" aria-current="page">Data Table</li>
                                        </ol>
                                    </nav>
                                </div> --}}
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header d-block">
                                    </div>
                                    <div class="card-body">
                                        <div class="dt-responsive">
                                            @include('layouts.flash')
                                            <table id="simpletable"
                                                   class="table table-striped table-bordered nowrap">
                                                <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Active Plan</th>
                                                    <th>Actions</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($accounts as $acct)
                                                    <tr>
                                                        <td>{{ $acct->acct_name }}</td>
                                                        <td> Free Plan</td>
                                                        <td class="actions">
                                                            <a href="{{route('account.delete', $acct->id)}}" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Delete account">
                                                               <i class="ik ik-trash-2"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Active Plan</th>
                                                    <th>Actions</th>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    {{-- Plan View Modals --}}
                    {{-- @foreach($plans as $plan)
                        <div class="modal fade" id="plan{{$plan->id}}" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="demoModalLabel"></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="plan">
                                            <div class="pl-header">
                                                <h5 class="pl-title">{{ $plan->title }}</h5>
                                                <h3 class="pl-price">{{ $plan->price }}</h3>
                                                <span class="pl-billing">Billed monthly</span>
                                            </div>
                                            <div></div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach --}}
            @endsection
