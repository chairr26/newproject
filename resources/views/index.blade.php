@extends('layout.default')

@section('content')
    <div class='mt-5'>
        @if(auth()->user()->role =='admin')   
        <a href="/add" type="button" class="btn btn-primary mb-3">Add</a>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr class="table-success">
                    <th scope="col">Product Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Buy Price</th>
                    <th scope="col">Sell Price</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Image</th>
                    @if(auth()->user()->role =='admin') 
                    <th scope="col">Action</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @forelse($product as $data)
                <tr>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->descrption }}</td>
                    <td>{{ $data->buy_price }}</td>
                    <td>{{ $data->sell_price }}</td>
                    <td>{{ $data->created_at }}</td>
                    <td><img src="{{ Storage::url('public/').$data->image }}" class="rounded" style="width: 100px"></td>
                    @if(auth()->user()->role =='admin')         
                    <td class="text-center">
                        <a href="/edit/{{ $data->id }}" class="btn btn-sm btn-primary">EDIT</a>
                        <a href="/delete/{{ $data->id }}" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                    @endif
                </tr>
                @empty
                <div class="alert alert-danger">
                    Data belum Tersedia.
                </div>
                @endforelse
            </tbody>
        </table>
        {{ $product->links() }}
    </div>
@stop