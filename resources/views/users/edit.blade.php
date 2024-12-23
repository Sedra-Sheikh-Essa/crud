@extends('layouts.app')
@section('title', 'edit user')
@section('content')
    <div class="container mt-5">
        <h1>update {{ $user->name }} user</h1>
        <form action="{{ route('users.update', $user->id) }}" method="POST" class="mt-5" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">User Name:</label>
                <input type="text" name="name" placeholder="user name" class="form-control"
                    id="exampleFormControlInput1" value="{{ $user->name }}">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email:</label>
                <input type="email" name="email" placeholder="Enter your Email" class="form-control"
                    id="exampleFormControlInput1" value="{{ $user->email }}">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Password:</label>
                <input type="password" name="password" placeholder="Enter your Password" class="form-label"
                    id="exampleFormControlTextarea1" value="{{ $user->password }}">
            </div>
            <input type="submit" value="send" class="btn btn-primary">
        </form>
    </div>
@endsection
