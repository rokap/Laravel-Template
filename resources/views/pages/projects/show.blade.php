@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 ">
            <div class="bgc-white bd bdrs-3 p-20 mb-4">
                <span class="float-right">
                    <button type="button" class="btn btn-info" data-action="{{route('projects.edit',$project)}}">
                        <i class="fa fa-plus"></i> Edit Project
                    </button>

                    <div class="dropdown d-inline"><button type="button" class="btn btn-success"  data-toggle="dropdown">
                            Add To Project <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-menu">
                                            <div class="dropdown-header">Sales</div>
                                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item btn-link">Estimate</a>
                            <a href="#" class="dropdown-item btn-link">Invoice</a>
                            <a href="#" class="dropdown-item btn-link">Payment</a>
                                            <div class="dropdown-divider"></div>
                                            <div class="dropdown-header">Expenses</div>
                                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item btn-link">Purchase Order</a>
                            <a href="#" class="dropdown-item btn-link">Bill</a>
                            <a href="#" class="dropdown-item btn-link">Check</a>

                        </div>
                    </div>
                </span>
                <h4 class="c-grey-900 mb-0">{{$project->name}}</h4>
                <div>
                    {{$project->customer->name}}<span class="mx-2">|</span>
                    <div class="dropdown d-inline"><button type="button" class="btn btn-success btn-sm" style="vertical-align: baseline;" data-toggle="dropdown">
                            {{$project->status->name}} <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-menu">
                            @foreach($projectStatuses as $status)
                                @if($status->id != $project->project_status_id)
                                    <a href="{{route('projects.status',[$project,$status])}}" class="dropdown-item btn-link">Mark as {{$status->name}}</a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                @if(session('success'))
                    <div id="success-alert" class="alert alert-success text-center my-4">
                        {{session('success')}}
                    </div>
                @endif
                <hr>
                <p class="c-grey-900 mb-0">{{$project->description}}</p>
            </div>

            <div class="bgc-white p-20 mb-4 bd">
                Profit / Loss Chart
            </div>
            <div class="row">
                <div class="col-sm">
                    <div class="bgc-white p-20 mb-4 bd">
                        <h5>Transactions</h5>
                        <hr>
                        <table class="table table-striped table-bordered dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>Type</th>
                                <th>Num</th>
                                <th>Due Date</th>
                                <th>Balance</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($transactions as $transaction)
                                <tr>
                                    <td>{{$transaction->created_at->format("m/d/Y")}}</td>
                                    <td>{{$transaction->type}}</td>
                                    <td>{{$transaction->id}}</td>
                                    <td>{{$transaction->due_date}}</td>
                                    <td>${{number_format($transaction->balance,2)}}</td>
                                    <td>${{number_format($transaction->total,2)}}</td>
                                    <td>{{$transaction->status}}</td>
                                    <td class="text-center">
                                        <div class="btn-group btn-group-sm">

                                            <a class="btn btn-success" href="{{route('projects.show',$transaction['id'])}}">
                                                View Project
                                            </a>
                                            <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"
                                                    aria-haspopup="true"
                                                    aria-expanded="false">
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <div class="dropdown-menu">
                                                <button type="button" class="dropdown-item btn-link loadModal" data-action="{{route('projects.edit',$transaction['id'])}}">
                                                    Edit
                                                </button>

                                                <div class="dropdown-divider"></div>
                                                <a href="{{route('projects.edit',$transaction['id'])}}" class="dropdown-item btn-link">Run Report</a>

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
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
        });
        $('document').ready(function () {

        })
    </script>
@endsection


