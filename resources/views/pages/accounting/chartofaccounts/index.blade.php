@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="bgc-white bd bdrs-3 p-20 mB-20">
                <span class="float-right"><a href="{{route('accounting.chartOfAccounts.create')}}" class="btn btn-sm btn-success">Create Account</a></span>
                <h4 class="c-grey-900 mB-20">Account List</h4>
                @if(session('success'))
                    <div id="success-alert" class="alert alert-success text-center mb-0">
                        {{session('success')}}
                    </div>
                @endif
                @if(isset($accounts) && count($accounts))
                    <table class="table table-striped table-bordered dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Num</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Balance</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($accounts as $account)
                            <tr>
                                <td class="">{{$account->number}}</td>
                                <td>
                                    @if(!$account->status)
                                        <i class="fa fa-eye-slash"></i>
                                    @endif
                                    {{$account->name}}
                                </td>
                                <td>{{$account->type->name}}</td>
                                <td>{{$account->balance(true)}}</td>
                                <td class="text-center fit">
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{route('accounting.chartOfAccounts.register',$account)}}" class="btn btn-success">View Register</a>
                                        <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a href="{{route('accounting.chartOfAccounts.edit',[$account,Request::getQueryString()])}}" class="dropdown-item btn-link">Edit</a>
                                            @if($account->status)
                                                <a href="{{route('accounting.chartOfAccounts.deactivate',$account)}}" class="dropdown-item btn-link">Make Inactive</a>
                                            @else
                                                <a href="{{route('accounting.chartOfAccounts.activate',$account)}}" class="dropdown-item btn-link">Make Active</a>
                                            @endif
                                            <a href="{{route('accounting.chartOfAccounts.edit',$account)}}" class="dropdown-item btn-link">Run Report</a>

                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <div>No Accounts.</div>
                @endif
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script>
        window.addEventListener('load', function () {
            $('#success-alert').delay(5000).slideUp(function () {
                $(this).remove();
            });
        })
    </script>
@endsection