@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Product / Service List</div>
                    <div class="card-body border-bottom text-right">
                        @if($showInactive ?? '')
                            <a href="{{route('inventory.categories.index')}}" class="btn btn-sm btn-secondary"><i class="fa fa-eye-slash"></i> Hide Inactive</a>
                        @else
                            <a href="{{route('inventory.categories.index','showInactive')}}" class="btn btn-sm btn-secondary"><i class="fa fa-eye"></i> Show Inactive</a>
                        @endif
                        <a href="{{route('inventory.categories.create')}}" class="btn btn-sm btn-primary">Create New Product / Service</a>
                    </div>
                    @if(session('success'))
                        <div id="success-alert" class="alert alert-success text-center mb-0">
                            {{session('success')}}
                        </div>
                    @endif
                    @if(isset($itemCategories) && count($itemCategories))
                        <table id="Items" class="table datatable mb-0">
                            <thead>
                            <tr>
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
                                <tr class="accordion">
                                    <td colspan="8" class="">
                                        <b>{{$category->name}}</b>
                                    </td>
                                </tr>
                                @foreach(($showInactive ?? '')?$category->items:$category->items()->where('active',true)->get() as $item)
                                    <tr>
                                        <td>
                                            @if(!$item->active)<i class="fa fa-eye-slash"></i>@endif
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$item->name}}
                                        </td>
                                        <td>{{$item->type->name}}</td>
                                        <td>{{$item->qty_on_hand}}</td>
                                        <td>{{$item->unit_price}}</td>
                                        <td>{{$item->purchase_cost}}</td>
                                        <td>{{$item->income_account->name}}</td>
                                        <td>{{(isset($item->expense_account->name))?$item->expense_account->name:null}}</td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-sm">
                                                <a href="{{route('inventory.categories.edit',$item)}}" class="btn btn-success">Edit</a>
                                                <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <div class="dropdown-menu">
                                                    @if($item->active)
                                                        <a href="{{route('inventory.categories.deactivate',$item)}}" class="dropdown-item btn-link">Make Inactive</a>
                                                    @else
                                                        <a href="{{route('inventory.categories.activate',$item)}}" class="dropdown-item btn-link">Make Active</a>
                                                    @endif
                                                    <a href="{{route('inventory.categories.edit',$item)}}" class="dropdown-item btn-link">Run Report</a>

                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                @foreach($category->sub_categories as $sub_category)
                                    <tr class="accordion">
                                        <td colspan="8" class="">
                                            <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$category->name}} / {{$sub_category->name}}</b>
                                        </td>
                                    </tr>
                                    @foreach(($showInactive ?? '')?$sub_category->items:$sub_category->items()->where('active',true)->get() as $item)
                                        <tr>
                                            <td>
                                                @if(!$item->active)
                                                    <i class="fa fa-eye-slash"></i>
                                                @endif
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$item->name}}
                                            </td>
                                            <td>{{$item->type->name}}</td>
                                            <td>{{$item->qty_on_hand}}</td>
                                            <td>{{$item->unit_price}}</td>
                                            <td>{{$item->purchase_cost}}</td>
                                            <td>{{$item->income_account->name}}</td>
                                            <td>{{(isset($item->expense_account->name))?$item->expense_account->name:null}}</td>
                                            <td class="text-center">
                                                <div class="btn-group btn-group-sm">
                                                    <a href="{{route('inventory.categories.edit',$item)}}" class="btn btn-success">Edit</a>
                                                    <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"
                                                            aria-haspopup="true"
                                                            aria-expanded="false">
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        @if($item->active)
                                                            <a href="{{route('inventory.categories.deactivate',$item)}}" class="dropdown-item btn-link">Make Inactive</a>
                                                        @else
                                                            <a href="{{route('inventory.categories.activate',$item)}}" class="dropdown-item btn-link">Make Active</a>
                                                        @endif
                                                        <a href="{{route('inventory.categories.edit',$item)}}" class="dropdown-item btn-link">Run Report</a>

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


