@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Create Item</div>
            <div class="card-body">
                <form action="{{route('inventory.categories.store')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <h4>General</h4>
                            <hr>
                            <div class="form-group">
                                <label>Type</label>
                                <select name="item_type_id" class="form-control" id="item_type_id">
                                    @foreach($itemTypes as $itemType)
                                        <option value="{{$itemType->id}}">{{$itemType->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <select name="item_category_id" class="form-control" id="item_category_id">
                                    <option value="">None</option>
                                    @foreach($itemCategories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-sm">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input name="name" type="text" class="form-control" id="name" value="{{old('name')}}" placeholder="Product / Service Name">
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="form-group">
                                        <label>Sku</label>
                                        <input name="sku" type="text" class="form-control" id="sku" value="{{old('sku')}}" placeholder="Product / Service Sku">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-check form-group">
                                        <label class="form-check-label">
                                            <input name="purchase" id="can_purchase" type="checkbox" class="form-check-input" value="purchase">I Purchase this Item
                                        </label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-check form-group">
                                        <label class="form-check-label">
                                            <input name="taxable" id="taxable" type="checkbox" class="form-check-input" value="taxable">Is this item Taxable?
                                        </label>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <h4 class="mt-4">Sales</h4>
                            <hr>

                            <div class="form-group">
                                <label>Unit Price</label>
                                <input name="unit_price" type="text" class="form-control" id="unit_price" value="{{old('unit_price')}}" placeholder="Unit Price ( 0.00 )">

                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" id="description" class="form-control" rows="10"
                                          placeholder="Description on Sales Forms">{{old('description')}}</textarea>

                            </div>
                            <div class="form-group">
                                <label>Income Account</label>
                                <select name="income_account_id" class="form-control" id="income_account_id">
                                    @foreach($incomeAccounts as $account)
                                        <option value="{{$account->id}}">{{$account->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div id="purchases" class="col-md d-none">
                            <h4 class="mt-4">Purchases</h4>
                            <hr>
                            <div class="form-group">
                                <label>Purchase Price</label>
                                <input name="purchase_cost" type="text" class="form-control" id="purchase_cost" value="{{old('unit_price')}}"
                                       placeholder="Unit Price ( 0.00 )">

                            </div>
                            <div class="form-group">
                                <label>Purchase Description</label>
                                <textarea name="purchase_description" id="purchase_description" class="form-control" rows="10"
                                          placeholder="Description on Sales Forms">{{old('description')}}</textarea>

                            </div>
                            <div class="form-group">
                                <label>Expense Account</label>
                                <select name="expense_account_id" class="form-control" id="expense_account_id">
                                    <option value="">None</option>
                                    @foreach($expenseAccounts as $account)
                                        <option value="{{$account->id}}">{{$account->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div id="inventory" class="col-md d-none">
                            <h4 class="mt-4">Inventory</h4>
                            <hr>
                            <div class="form-group">
                                <label>Asset Account</label>
                                <select name="asset_account_id" class="form-control" id="asset_account_id">
                                    <option value="">None</option>
                                    @foreach($assetAccounts as $account)
                                        <option value="{{$account->id}}">{{$account->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Qty on Hand</label>
                                <input name="qty_on_hand" type="text" class="form-control" id="qty_on_hand" value="{{old('qty_on_hand')}}" placeholder="Available Qty">

                            </div>
                            <div class="form-group">
                                <label>Inventory Start Date</label>
                                <input name="inventory_start_date" type="text" class="form-control" id="inventory_start_date" value="{{old('inventory_start_date')}}"
                                       placeholder="Available Qty">

                            </div>
                        </div>
                    </div>
                    <div class="form-group text-right mb-0">

                        <!-- Example split danger button -->
                        <div class="btn-group">
                            <button type="submit" name="save" value="new" class="btn btn-success">Save & New</button>
                            <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu">
                                <button type="submit" name="save" value="close" class="dropdown-item btn-link" href="#">Save & Close</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection
@section('javascript')
        <script>
        $("#item_type_id")
            .change(function () {
                $("select#item_type_id option:selected").each(function () {
                    var type = $(this).val();
                    if (type == 3) {
                        $("#inventory").removeClass('d-none');
                    } else {
                        $("#inventory").addClass('d-none');
                    }
                });
            })
            .change();
        $('#can_purchase').click(function () {
            if ($(this).is(':checked')) {
                $("#purchases").removeClass('d-none');
            } else {
                $("#purchases").addClass('d-none');
            }
        })
        $(function () {
            $("#inventory_start_date").datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: "yy-mm-dd"
            });
        });

    </script>
@endsection