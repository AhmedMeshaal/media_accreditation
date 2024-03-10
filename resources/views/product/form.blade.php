@extends('base')
@section('title', ($isUpdate?'Update':'Create').' Product')

@php
    $route = route('products.store');
    if($isUpdate) {
       $route =  route('products.update', $product);
    }
@endphp

@section('content')
    <h1>@yield('title')</h1>

    <form action="{{ $route }}" method="post" enctype="multipart/form-data">
        @csrf

        @if($isUpdate)
            @method('PUT')
        @endif

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="" value="{{old('name', $product->name)}}">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea type="text" name="description" id="description" class="form-control" placeholder="">{{old('description', $product->description)}}</textarea>
        </div>
        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" name="quantity" id="quantity" class="form-control" placeholder="" value="{{old('quantity', $product->quantity)}}">
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control" placeholder="">
            @if($product)
                <img width='100px' src="/storage/{{$product->image}}" alt="">
            @endif
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" name="price" id="price" class="form-control" placeholder="" value="{{old('price', $product->price)}}">
        </div>
        <div class="form-group my-3">
            <input type="submit" class="btn btn-primary w-100" value="{{$isUpdate?'Edit':'Create'}}">
        </div>
    </form>

@endsection


