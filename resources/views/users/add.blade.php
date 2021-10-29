@extends('layout.default')

@section('content')
<div class='mt-5'>
    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name='name'>
            <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name='email'>
            <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name='password'>
            <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
        </div>
        <div class="mb-3">
            <label for="birth_place" class="form-label">Birth Place</label>
            <input type="text" class="form-control" id="birth_place" name='birth_place'>
            <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
        </div>
        <div class="mb-3">
            <label for="birth_date" class="form-label">Birth Place</label>
            <input type="date" class="form-control" id="birth_date" name='birth_date'>
            <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
        </div>
        <div class="form-group mb-3">
            <label for="gender">Gender</label>
            <select class="form-control" id="gender" name='gender'>
            <option value='l'>Laki - Laki</option>
            <option value='p'>Perempuan</option>
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="role">Role</label>
            <select class="form-control" id="role" name='role'>
            <option value='admin'>Admin</option>
            <option value='user'>User</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-danger">Cancel</button>
    </form>
</div>
@stop