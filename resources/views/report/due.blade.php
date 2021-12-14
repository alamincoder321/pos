@extends('layouts.app')
@section('report')
    active
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h4 class="pull-left page-title">Due</h4>
            <ol class="breadcrumb pull-right">
                <li><a href="{{route('dashboard')}}"> সোয়াইব মধুভান্ডার </a></li>
                <li class="active"> Due Payment List </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h5 class="pull-right">
                        <button class="btn btn-info" data-toggle="modal" data-target="#con-close-modal">Pay Due</button>
                        <span class="btn btn-purple">Total Buy: {{$t}}</span>
                        <span class="btn btn-success">Total Payment: {{$paytotal+$due}}</span>
                        <span class="btn btn-danger">Total Due: {{$d-$due}}</span>
                    </h5>
                    <h3 class="panel-title">Due Details Table</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <table id="datatable" class="table table-striped table-bdueed">
                                <thead>
                                    <tr>
                                        <th>Order Date</th>
                                        <th>Customer Name</th>                                     
                                        <th>Buy Product</th>
                                        <th>Payment</th>
                                        <th>Due</th>                                
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($orders as $item)
                                    <tr>
                                        <td>{{$item->pay_date}}</td>
                                        <td>{{$item->customer->name}}</td>
                                        <td>{{$item->total}}</td>
                                        <td>{{$item->pay_amount}}</td>
                                        <td>{{$item->due}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div> <!-- End Row -->


<!-- Modal content  --->

<div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
            </div>
            <form action="{{route ('due.pay')}}" method="POST">
            @csrf
            <input type="hidden" name="customer_id" value="{{$customer->id}}">
            <input type="hidden" name="month" value="{{date('m.Y')}}">
            <div class="modal-body"> 
                <div class="row">  
                    <div class="col-md-6"> 
                        <div class="form-group"> 
                            <label for="field-2" class="control-label">Pay Due</label>
                            <input type="number" name="pay_due" class="form-control" placeholder="Pay Due">
                                @if ($errors->has('pay_due'))
                                <span class="text-danger">{{$errors->first('pay_due')}}</span>
                                @endif 
                        </div> 
                    </div>
                    <div class="col-md-6"> 
                        <div class="form-group"> 
                            <label for="field-2" class="control-label">Pay Date</label>
                            <input type="text" name="pay_date" class="form-control" value="{{date('d.m.Y')}}" readonly>
                        </div> 
                    </div>
                </div>
            <div class="modal-footer"> 
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button> 
                <button type="submit" class="btn btn-info waves-effect waves-light">Due Pay</button> 
            </div>
            </form> 
        </div> 
    </div>
</div><!-- /.modal -->

@endsection

