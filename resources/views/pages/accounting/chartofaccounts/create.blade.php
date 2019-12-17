@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Account</div>
                    <div class="card-body">
                        <form action="{{route('accounting.chartOfAccounts.store')}}" method="post">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Type</label>
                                <div class="col-sm-10">
                                    <select name="type" class="form-control" id="type">
                                        @foreach($accountTypes as $accountType)
                                            <option value="{{$accountType->id}}">{{$accountType->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Number</label>
                                <div class="col-sm-10">
                                    <input name="number" type="text" class="form-control" id="number" value="{{old('number')}}" placeholder="Account Number">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input name="name" type="text" class="form-control" id="name" value="{{old('name')}}" placeholder="Account Name">
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
        </div>
    </div>
@endsection
