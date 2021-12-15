@extends('layouts.app')
@section('supplier')
    active
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h4 class="pull-left page-title">Supplier Due</h4>
            <ol class="breadcrumb pull-right">
                <li><a href="{{route('dashboard')}}"> সোয়াইব মধুভান্ডার </a></li>
                <li class="active"> Supplier Due Payment List </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Supplier Due Table</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <table id="datatable" class="table table-striped table-bdueed">
                                <thead>
                                    <tr>
                                        <th>Pay Date</th>
                                        <th>Due payment</th>                                
                                        <th>Action</th>                                
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($suppays as $item)
                                    <tr>
                                        <td>{{$item->pay_date}}</td>
                                        <td>{{$item->pay_due}}</td>
                                        <td>
                                            <a href="{{route('supedit', $item->id)}}" class="btn btn-info btn-sm button"><i class="fa fa-edit"></i></button>
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
        
    </div> <!-- End Row -->

@endsection


