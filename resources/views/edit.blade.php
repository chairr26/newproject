@extends('layout.default')

@section('content')
<div class='mt-5'>
    <form action="{{ route('update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="product-name" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="product-name" name='product_name' value="{{ $product->name }}">
            <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name='description'>{{ $product->descrption }}</textarea>
        </div>
        <div class="mb-3">
            <label for="buy-price" class="form-label">Buy Price</label>
            <input type="text" class="form-control" id="buy-price" name='buy_price' value="{{ $product->buy_price }}">
            <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
        </div>
        <div class="mb-3">
            <label for="sell-price" class="form-label">Sell Price</label>
            <input type="text" class="form-control" id="sell-price" name='sell_price' value="{{ $product->sell_price }}">
            <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
        </div>
        <div class="mb-3">
            <label for="file" class="form-label">Image :</label><br>
            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="file">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-danger">Cancel</button>
    </form>
</div>
@stop