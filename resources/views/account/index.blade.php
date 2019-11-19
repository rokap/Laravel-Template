@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Account List</div>
                    <div class="card-body border-bottom text-right">
                        @if($showInactive)
                            <a href="{{route('account.index')}}" class="btn btn-sm btn-secondary"><i class="fa fa-eye-slash"></i> Hide Inactive</a>
                        @else
                            <a href="{{route('account.index','showInactive')}}" class="btn btn-sm btn-secondary"><i class="fa fa-eye"></i> Show Inactive</a>
                        @endif

                        <a href="{{route('account.create')}}" class="btn btn-sm btn-primary">Create New Account</a>
                    </div>
                    @if(session('success'))
                        <div id="success-alert" class="alert alert-success text-center mb-0">
                            {{session('success')}}
                        </div>
                    @endif
                    @if(isset($accounts) && count($accounts))
                        <table class="table table-striped mb-0">
                            <thead>
                            <tr>
                                <th>Number</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Balance</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($accounts as $account)
                                <tr>
                                    <td>{{$account->number}}</td>
                                    <td>
                                        @if(!$account->status)
                                            <i class="fa fa-eye-slash"></i>
                                        @endif
                                        {{$account->name}}
                                    </td>
                                    <td>{{$account->type->name}}</td>
                                    <td>{{$account->balance(true)}}</td>
                                    <td class="text-center">
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{route('account.register',$account)}}" class="btn btn-success">View Register</a>
                                            <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a href="{{route('account.edit',[$account,Request::getQueryString()])}}" class="dropdown-item btn-link">Edit</a>
                                                @if($account->status)
                                                    <a href="{{route('account.deactivate',$account)}}" class="dropdown-item btn-link">Make Inactive</a>
                                                @else
                                                    <a href="{{route('account.activate',$account)}}" class="dropdown-item btn-link">Make Active</a>
                                                @endif
                                                <a href="{{route('account.edit',$account)}}" class="dropdown-item btn-link">Run Report</a>

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="5">
                                    {{$accounts->links()}}
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                    @else
                        <div class="card-body">No Accounts.</div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        window.addEventListener('load', function () {
            $('#success-alert').delay(5000).slideUp(function () {
                $(this).remove();
            });
        })
    </script>
@endsection
