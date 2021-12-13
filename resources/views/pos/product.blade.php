@foreach ($products as $product)
    <tr>
        <form action="{{route ('addcart', $product->id)}}" method="POST">
            @csrf
            
            <td>{{ $product->name }}</td>
            <td>{{ $product->unit_cost }}</td>
            <td>{{ $product->weight }}</td>
            <td><button type="submit" class="btn btn-success btn-sm"><i class="fa fa-plus-square"></i></button></td>
        </form>
    </tr>
@endforeach