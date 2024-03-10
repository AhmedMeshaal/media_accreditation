@extends('base')
@section('title', 'Products')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Product List</h1>
        <a href="{{route('products.create')}}" class="btn btn-primary">Create</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>#ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Quantity</th>
                <th>Image</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @forelse($products as $product)
                <tr>
                    <th>{{$product->id}}</th>
                    <th>{{$product->name}}</th>
                    <th>{{$product->description}}</th>
                    <th>{{$product->quantity}}</th>
                    <th><img width='100px' src="storage/{{$product->image}}" alt=""></th>
                    <th>{{$product->price}} $</th>
                    <th>
                            <div class="btn-group">
                                <a href="{{route('products.edit', $product)}}" class="btn btn-primary">Update</a>

                                <form method="post" action="{{route('products.destroy', $product)}}">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-danger" value="Delete"/>
                                </form>
                            </div>
                    </th>
                </tr>
            @empty
                <tr>
                    <td colspan="6" align="center"><h6>No Products</h6></td>
                </tr>

            @endforelse
        </tbody>
    </table>
    {{$products->links()}}
@endsection
