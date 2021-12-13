.@extends('layouts.app')
@section('pos')
    active
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h4 class="pull-left page-title">Place Order</h4>
            <ol class="breadcrumb pull-right">
                <li><a href="{{route('dashboard')}}">সাতক্ষীরা মধুভান্ডার</a></li>
                <li class="active"> Place Order </li>
            </ol>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="clearfix">
                            <div class="text-center">
                                <h4>**----সাতক্ষীরা মধুভান্ডার----**</h4>
                                <h6>সাতক্ষীরা, <span>খুলনা</span></h6>
                                <p>নামঃ মোঃ আবু রেফান সোয়াইব</p>
                                <span>মোবাইলঃ 0192855000</span>
                                
                            </div>
                            <div class="pull-right">
                                <h4>Invoice # <br>
                                    <strong>{{date("F j, Y")}}</strong>
                                </h4>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                
                                <div class="pull-left m-t-30">
                                    <address>
                                      <strong>Customer Name:</strong> {{$customer->fname}} {{$customer->lname}}<br>
                                      Address: {{$customer->upozila}}, {{$customer->city_name}}
                                    </address>
                                </div>
                                <div class="pull-right m-t-30">
                                    <p><strong>Order Date: {{date("d.m.Y")}}</strong> </p>
                                    <p class="m-t-10"><strong>Order Status: </strong> <span class="label label-pink">Pending</span></p>
                                    <p class="m-t-10"><strong>Order ID: </strong> 1</p>
                                </div>
                            </div>
                        </div>
                        <div class="m-h-50"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table m-t-30">
                                        <thead>
                                            <tr><th>Sl</th>
                                            <th>Product Name</th>
                                            <th>Weight</th>
                                            <th>Unit Cost</th>
                                            <th>Total</th>
                                        </tr></thead>
                                        <tbody>
                                            @php
                                            $i = 1;
                                            @endphp
                                            @foreach($carts as $cart)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{$cart->product->name}}</td>
                                                <td>{{$cart->weight}}</td>
                                                <td>{{$cart->product->unit_cost}}</td>
                                                <td>{{$cart->weight * $cart->product->unit_cost}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="border-radius: 0px;">
                            <div class="col-md-3 col-md-offset-9 pull-right">
                                <h5>Total Amount: <span>{{$total}} tk</span></h5>
                            </div>
                        </div>
                        <hr>
                        <div class="hidden-print">
                            <div class="pull-right">
                                <a  href="{{route('pos')}}" class="btn btn-danger waves-effect waves-light">Back</a>
                                <button class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <!-- Modal content  --->

    <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog"> 
            <div class="modal-content"> 
                <div class="modal-header"> 
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                    <h4 class="modal-title"> Invoice Of: {{$customer->fname}} {{$customer->lname}} </h4>

                    <span class="pull-right">Sub-Total: {{$total}}</span> 
                </div>
                <form action="{{route ('order.place')}}" method="POST">
                @csrf
                <input type="hidden" name="customer_id" value="{{$customer->id}}"> 
                <input type="hidden" name="total" value="{{$total}}"> 
                <input type="hidden" name="pay_date" value="{{date("d.m.Y")}}"> 
                <input type="hidden" name="month" value="{{date("m.Y")}}"> 
                <div class="modal-body"> 
                    <div class="row"> 
                        <div class="col-md-6"> 
                            <div class="form-group"> 
                                <label for="field-1" class="control-label">Method</label> 
                                <select class="form-control" name="pay_type">
                                    <option>Select Method</option>
                                    <option value="Handcash">Handcash</option>
                                    <option value="Bkash">Bkash</option>
                                    <option value="Nagad">Nagad</option>
                                    <option value="Rocket">Rocket</option>
                                    <option value="Bank Card">Bank Card</option>
                                </select>
                                    @if ($errors->has('pay_type'))
                                    <span class="text-danger">{{$errors->first('pay_type')}}</span>
                                    @endif
                            </div> 
                        </div>

                        <div class="col-md-6"> 
                            <div class="form-group"> 
                                <label for="field-2" class="control-label">Pay Amount</label>
                                <input type="number" name="pay_amount" class="form-control" placeholder="Nullable" autocomplete="off">
                                    @if ($errors->has('pay_amount'))
                                    <span class="text-danger">{{$errors->first('pay_amount')}}</span>
                                    @endif 
                            </div> 
                        </div>

                        <div class="col-md-6"> 
                            <div class="form-group"> 
                                <label for="field-2" class="control-label">Condition</label>
                                <input type="number" name="condition" class="form-control" placeholder="Nullable" autocomplete="off">
                                    @if ($errors->has('condition'))
                                    <span class="text-danger">{{$errors->first('condition')}}</span>
                                    @endif 
                            </div> 
                        </div>

                        <div class="col-md-6"> 
                            <div class="form-group"> 
                                <label for="field-2" class="control-label">Payment Discount</label>
                                <input type="number" name="discount" class="form-control" placeholder="Nullable" autocomplete="off">
                                    @if ($errors->has('discount'))
                                    <span class="text-danger">{{$errors->first('discount')}}</span>
                                    @endif 
                            </div> 
                        </div>

                        <div class="col-md-12"> 
                            <div class="form-group"> 
                                <label for="field-1" class="control-label">Order By</label> 
                                <select class="form-control" name="orderby">
                                    <option value="এ জে আর কুরিয়ার">এ জে আর কুরিয়ার</option>
                                    <option value="জননী কুরিয়ার">জননী কুরিয়ার</option>
                                    <option value="এস এ পরিবহন">এস এ পরিবহন</option>
                                    <option value="সওদাগর কুরিয়ার">সওদাগর কুরিয়ার</option>
                                    <option value="REDEX COURIER">REDEX COURIER</option>
                                    <option value="STEED FAST COURIER">STEED FAST COURIER</option>
                                    <option value="PATHAW COURIER">PATHAW COURIER</option>
                                </select>
                                    @if ($errors->has('orderby'))
                                    <span class="text-danger">{{$errors->first('orderby')}}</span>
                                    @endif
                            </div> 
                        </div>
                    </div>
                <div class="modal-footer"> 
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button> 
                    <button type="submit" class="btn btn-info waves-effect waves-light">Order Place</button> 
                </div>
                </form> 
            </div> 
        </div>
    </div><!-- /.modal -->

@endsection