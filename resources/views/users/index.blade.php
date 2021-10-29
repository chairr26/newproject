@extends('layout.default')

@section('content')
    <div class='mt-5'>
        <h1>Users</h1>
        <a href="/users/add" type="button" class="btn btn-primary mb-3">Add</a>
        <table class="table table-bordered">
            <thead>
                <tr class="table-success">
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Roles</th>
                    @if(auth()->user()->role =='admin') 
                    <th scope="col">Action</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @forelse($users as $data)
                <tr>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->email }}</td>
                    <td>{{ $data->role }}</td>
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
        {{ $users->links() }}
    </div>
@stop