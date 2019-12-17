@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="bgc-white bd bdrs-3 p-20 mB-20">
                <span class="float-right">
                    @if($showInactive)
                        <a href="{{route('inventory.items.index')}}" class="btn btn-sm btn-secondary"><i class="fa fa-eye-slash"></i> Hide Inactive</a>
                    @else
                        <a href="{{route('inventory.items.index','showInactive')}}" class="btn btn-sm btn-secondary"><i class="fa fa-eye"></i> Show Inactive</a>
                    @endif
                    <button type="button" class="btn btn-sm btn-primary loadModal" data-action="{{route('inventory.items.create')}}">
                        Create New Product / Service
                    </button>

                </span>
                <h4 class="c-grey-900 mB-20">Product / Service List</h4>
                @if(session('success'))
                    <div id="success-alert" class="alert alert-success text-center mb-4">
                        {{session('success')}}
                    </div>
                @endif
                @if(isset($itemCategories) && count($itemCategories))
                    <table class="table table-striped table-bordered dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Category</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Available Qty</th>
                            <th>Price</th>
                            <th>Cost</th>
                            <th>Income Account</th>
                            <th>Expense Account</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($itemCategories as $category)
                            @foreach(($showInactive)?$category->items:$category->items()->where('active',true)->get() as $item)
                                <tr>
                                    <td>{{$category->name}}</td>
                                    <td>
                                        @if(!$item->active)<i class="fa fa-eye-slash"></i>@endif {{$item->name}}
                                    </td>
                                    <td>{{$item->type->name}}</td>
                                    <td>{{$item->qty_on_hand}}</td>
                                    <td>{{$item->unit_price}}</td>
                                    <td>{{$item->purchase_cost}}</td>
                                    <td>{{$item->income_account->name}}</td>
                                    <td>{{(isset($item->expense_account->name))?$item->expense_account->name:null}}</td>
                                    <td class="text-center">
                                        <div class="btn-group btn-group-sm">

                                            <button type="button" class="btn btn-success loadModal" data-action="{{route('inventory.items.edit',$item)}}">
                                                Edit
                                            </button>
                                            <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"
                                                    aria-haspopup="true"
                                                    aria-expanded="false">
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <div class="dropdown-menu">
                                                @if($item->active)
                                                    <a href="{{route('inventory.items.deactivate',$item)}}" class="dropdown-item btn-link">Make Inactive</a>
                                                @else
                                                    <a href="{{route('inventory.items.activate',$item)}}" class="dropdown-item btn-link">Make Active</a>
                                                @endif
                                                <a href="{{route('inventory.items.edit',$item)}}" class="dropdown-item btn-link">Run Report</a>

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            @foreach($category->sub_categories as $sub_category)
                                @foreach(($showInactive)?$sub_category->items:$sub_category->items()->where('active',true)->get() as $item)
                                    <tr>
                                        <td>{{$category->name}} / {{$sub_category->name}}</td>
                                        <td>
                                            @if(!$item->active)
                                                <i class="fa fa-eye-slash"></i>
                                            @endif {{$item->name}}
                                        </td>
                                        <td>{{$item->type->name}}</td>
                                        <td>{{$item->qty_on_hand}}</td>
                                        <td>{{$item->unit_price}}</td>
                                        <td>{{$item->purchase_cost}}</td>
                                        <td>{{$item->income_account->name}}</td>
                                        <td>{{(isset($item->expense_account->name))?$item->expense_account->name:null}}</td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-sm">
                                                <a href="{{route('inventory.items.edit',$item)}}" class="btn btn-success">Edit</a>
                                                <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"
                                                        aria-haspopup="true"
                                                        aria-expanded="false">
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <div class="dropdown-menu">
                                                    @if($item->active)
                                                        <a href="{{route('inventory.items.deactivate',$item)}}" class="dropdown-item btn-link">Make Inactive</a>
                                                    @else
                                                        <a href="{{route('inventory.items.activate',$item)}}" class="dropdown-item btn-link">Make Active</a>
                                                    @endif
                                                    <a href="{{route('inventory.items.edit',$item)}}" class="dropdown-item btn-link">Run Report</a>

                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                        @endforeach

                        </tbody>
                    </table>
                @else
                    <div class="card-body">No Products / Services.</div>
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
    </script>
@endsection


