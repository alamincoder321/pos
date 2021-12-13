@extends('layouts.app')
@section('report')
    active
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h4 class="pull-left page-title">Sells Report</h4>
            <ol class="breadcrumb pull-right">
                <li><a href="{{route('dashboard')}}">সোয়াইব মধুভান্ডার</a></li>
                <li class="active">Manage Report</li>
            </ol>
        </div>
    </div>
{{-- Customer Table here --}}
    <div class="row">
        <div class="col-md-10 col-12 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Due Customer Table</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <table id="datatable" class="table table-striped table-bdueed">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Customer Name</th>
                                        <th>Due</th>
                                        <th>Action</th>                                
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($customers as $key=>$customer)
                                    <tr>
                                        @if($customer->order->sum('due')-$customer->due->sum('pay_due') == 0)
                                        @else
                                        <td>{{$key+1}}</td>
                                        <td>{{$customer->fname}} {{$customer->lname}}</td>
                                        <td>{{$customer->order->sum('due')-$customer->due->sum('pay_due')}}</td>
                                        <td class="pull-right align-content-center">
                                            <a href="{{route ('list.due', $customer->id)}}" class="btn btn-success btn-sm"><i class="fa fa-eye text-danger"></i> Due List</a>

                                            <a href="{{route ('due', $customer->id)}}" class="btn btn-purple btn-sm due">Payment</a>
                                            
                                        </td>
                                        @endif
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

@endsection
