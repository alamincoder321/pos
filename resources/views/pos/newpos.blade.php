@extends('layouts.app')

@section('pos')
    active
@endsection
@push('style')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Category</h3>
                </div>
                <div class="panel-body">
                    @foreach ($categories as $category)
                        <button onclick="updateCategory({{$category->id}})" type="button"
                            class="btn btn-purple waves-effect waves-light w-sm m-b-5" id="cat{{$category->id}}" value="{{$category->id}}">{{ $category->name }}</button>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="row">
                <!-- Product tabel here ----->

        <div class="col-md-6 col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Product table </h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 col-4 col-sm-4 col-xs-12">
                            <table id="datatable" class="col-4 table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Unit Cost</th>
                                        <th>Weight</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody id="product-body">
                                    @foreach ($products as $product)
                                        <tr>
                                            <form action="{{route ('addcart', $product->id)}}" method="POST">
                                                @csrf
                                                
                                                <td>{{ $product->name }}</td>
                                                <td>{{ $product->unit_cost }}</td>
                                                <td>{{ $product->weight }}</td>
                                                <td><button type="submit" class="btn btn-success btn-sm"><i
                                                            class="fa fa-plus-square"></i></button></td>
                                            </form>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-6">
            <div class="price_card text-center">
                <h4 class="bg-info text-center text-white"> Invoice Product </h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center">Sl</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Weight</th>
                            <th class="text-center">Unit Total Price</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($carts as $key=>$cart)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$cart->product->name}}</td>
                            <td>
                                <form action="{{route ('updatecart', $cart->id)}}" method="POST">
                                    @csrf
                                    <input type="number" name="weight" value="{{$cart->weight}}" style="width:30%; padding:3px; text-align:center;">
                                    <button type="submit" class="btn btn-success btn-sm" style="margin-top: 0px;"><i class="fa fa-check"></i></button>
                                </form>
                            </td>
                            <td>{{$cart->weight*$cart->product->unit_cost}}</td>
                            <td>
                                <a href="{{route ('destroy', $cart->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>  
                        @endforeach
                    </tbody>
                </table>
                <div class="pricing-header bg-primary"><br>
                    <h1 class="text-white">Total Price</h1>
                    <h4 class="text-white p-0 m-0">{{$total}} taka</h4>
                    <hr>                    
                </div>

                <div class="col-md-12 d-flex justify-content-between">
                    <input type="radio" name="customer_id" class="form-control"> New Customer
                    <input type="radio" name="customer_id" class="form-control"> Exit Customer
                </div>
                <div class="new-customer">
                    
                </div>
                <button type="submit" class="btn btn-success btn-lg text-center">Save Order</button>
            </div> <!-- end Pricing_card -->
        </div>
    </div> <!-- End Row -->
@endsection

{{-- @push('js')
<script>
    function updateCategory(id){
        $("#product-body").load('{{URL::to('/load/product')}}/'+id);
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endpush --}}
