@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Account</div>
                    <div class="card-body">
                        <form action="{{route('accounting.chartOfAccounts.update',$account)}}" method="post">
                            <input type="hidden" name="_method" value="PUT">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Type</label>
                                <div class="col-sm-10">
                                    <select name="type" class="form-control" id="type">
                                        @foreach($accountTypes as $accountType)
                                            <option value="{{$accountType->id}}" {{($account->type_id == $accountType->id)?'selected':null}}>{{$accountType->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Number</label>
                                <div class="col-sm-10">
                                    <input name="number" type="text" class="form-control" id="number" value="{{old('number',$account->number)}}" placeholder="Account Number">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input name="name" type="text" class="form-control" id="name" value="{{old('name',$account->name)}}" placeholder="Account Name">
                                </div>
                            </div>
                            <div class="form-group text-right mb-0">
                                <button type="submit" name="save" value="close" class="btn btn-success" href="#">Save & Close</button>
                            </div>

                            <input type="hidden" name="page" value="{{Request::get('page')}}">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
