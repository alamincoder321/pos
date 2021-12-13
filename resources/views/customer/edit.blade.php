@extends('layouts.app')
@section('customer')
    active
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h4 class="pull-left page-title">Customer</h4>
            <ol class="breadcrumb pull-right">
                <li><a href="{{route('dashboard')}}">সাতক্ষীরা মধুভান্ডার</a></li>
                <li class="active"> Update Customer </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{route('customer.index')}}" class="btn btn-info btn-sm pull-right">Customer List</a>
                    <h3 class="panel-title">Update Customer</h3>
                </div>
                <div class="panel-body">
                    <div class=" form">
                        <form class="cmxform form-horizontal tasi-form" method="POST" action="{{route('customer.update', $customer->id)}}" novalidate="novalidate">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label class="control-label col-lg-2">First Name</label>
                                <div class="col-lg-9">
                                    <input type="text" name="fname" class=" form-control" value="{{$customer->fname}}">
                                    @if ($errors->has('fname'))
                                    <span class="text-danger">{{$errors->first('fname')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">Last Name</label>
                                <div class="col-lg-9">
                                    <input type="text" name="lname" class=" form-control" value="{{$customer->lname}}">
                                    @if ($errors->has('lname'))
                                    <span class="text-danger">{{$errors->first('lname')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">Shop Name</label>
                                <div class="col-lg-9">
                                    <input type="text" name="shop_name" class="form-control" value="{{$customer->shop_name}}" placeholder="Nullable">
                                     @if ($errors->has('shop_name'))
                                    <span class="text-danger">{{$errors->first('shop_name')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">Phone Number</label>
                                <div class="col-lg-9">
                                    <input type="number" name="phone" class="form-control" value="{{$customer->phone}}">
                                    @if ($errors->has('phone'))
                                    <span class="text-danger">{{$errors->first('phone')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">City</label>
                                <div class="col-lg-9">
                                    <input type="text" name="city_name" class="form-control" value="{{$customer->city_name}}">
                                    @if ($errors->has('city_name'))
                                    <span class="text-danger">{{$errors->first('city_name')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">Upozila</label>
                                <div class="col-lg-9">
                                    <input type="text" name="upozila" class="form-control" value="{{$customer->upozila}}">
                                    @if ($errors->has('upozila'))
                                    <span class="text-danger">{{$errors->first('upozila')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">Street</label>
                                <div class="col-lg-9">
                                    <input type="text" name="street" class="form-control" value="{{$customer->street}}" placeholder="Nullable">
                                    @if ($errors->has('street'))
                                    <span class="text-danger">{{$errors->first('street')}}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-10 col-lg-offset-1">
                                    <button class="btn btn-success waves-effect waves-light pull-right" type="submit">Add customer</button>
                                </div>
                            </div>
                        </form>
                    </div> <!-- .form -->
                </div> <!-- panel-body -->
            </div> <!-- panel -->
        </div> <!-- col -->
    </div>
@endsection
