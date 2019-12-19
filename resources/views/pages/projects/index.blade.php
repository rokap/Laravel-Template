@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 ">
            <div class="bgc-white p-20 mb-4 bd">
                <div class="mT-30">
                    <canvas id="projects-chart" height="75" class="chartjs-render-monitor"></canvas>
                </div>
            </div>
            <div class="bgc-white bd bdrs-3 p-20 mB-4">
                <span class="float-right">

                    <button type="button" class="btn btn-primary loadModal" data-action="{{route('projects.create')}}">
                        <i class="fa fa-plus"></i> New Project
                    </button>

                </span>
                <h4 class="c-grey-900 mB-20">Projects</h4>
                @if(session('success'))
                    <div id="success-alert" class="alert alert-success text-center mb-4">
                        {{session('success')}}
                    </div>
                @endif
                @if(count($projects))
                    <table class="table table-striped table-bordered dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Customer</th>
                            <th>Status</th>
                            <th>Due</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($projects as $project)
                            <tr>
                                <td>{{$project->name}}</td>
                                <td>{{$project->customer->name}}</td>
                                <td>
                                    {{$project->status->name}}
                                </td>
                                <td data-sort="{{$project->due_date->format("Y/m/d")}}">{{$project->due_date->format("D, M d, Y")}} ( {{$project->due_date->diffForHumans()}}
                                    )
                                </td>
                                <td class="text-center">
                                    <div class="btn-group btn-group-sm">

                                        <a class="btn btn-success" href="{{route('projects.show',$project)}}">
                                            View Project
                                        </a>
                                        <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"
                                                aria-haspopup="true"
                                                aria-expanded="false">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu">
                                            <button type="button" class="dropdown-item btn-link loadModal" data-action="{{route('projects.edit',$project)}}">
                                                Edit
                                            </button>
                                            <div class="dropdown-divider"></div>
                                            @foreach($projectStatuses as $status)
                                                @if($status->id != $project->project_status_id)
                                                    <a href="{{route('projects.status',[$project,$status])}}" class="dropdown-item btn-link">Mark as {{$status->name}}</a>
                                                @endif
                                            @endforeach
                                            <div class="dropdown-divider"></div>
                                            <a href="{{route('projects.edit',$project)}}" class="dropdown-item btn-link">Run Report</a>

                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <p>No Projects.</p>
                @endif
            </div>
        </div>
    </div>
    <div class="modal fade" id="MyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-full" role="document">
            <div class="modal-content">

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
        $('.loadModal').on('click', function () {
            var this_action = $(this).attr('data-action');

            $.get(this_action, function (data) {


                $('#MyModal').modal('show');
                $('#MyModal').on('shown.bs.modal', function () {
                    $('#MyModal .modal-content').html(data)
                });
                $('#MyModal').on('hidden', function () {
                    alert(6);
                });
            });
        });
        $('document').ready(function () {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    var json = JSON.parse(this.response);
                    var projects = [];

                    var colors = [
                        "#4527a0",
                        "#c51162"
                    ]

                    var labels = [
                        "{{date("Y")-1}} Projects",
                        "{{date("Y")}} Projects",
                    ]
                    $.each(json, function (index, element) {

                        var data = [];
                        $.each(element, function (i, d) {
                            data.push(d)
                        });
                        year = {
                            label: labels[index],
                            borderColor: colors[index],
                            borderWidth: 2,
                            fill: false,
                            data: data
                        };
                        console.log(year);
                        projects.push(year);
                    });
                    console.log(projects);
                    BuildChart(projects, "{{date('Y')}} Projects"); // Pass in data and call the chart
                }
            };
            xhttp.open("GET", "{{route('projects.chart')}}", false);
            xhttp.send();
        })
    </script>
@endsection


