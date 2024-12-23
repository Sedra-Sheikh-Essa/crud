@extends('layouts.app')
@section('title', 'add user')
@section('content')
    <div class="container mt-5">
        <h1>add new user</h1>
        <form action="{{ route('users.store') }}" method="POST" class="mt-5" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">User Name:</label>
                <input type="text" name="name" placeholder="user name" class="form-control"
                    id="exampleFormControlInput1">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email:</label>
                <input type="email" name="email" placeholder="Enter your Email" class="form-control"
                    id="exampleFormControlInput1">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Password:</label>
                <input type="password" name="password" placeholder="Enter your Password" class="form-label"
                    id="exampleFormControlTextarea1">
            </div>
            <input type="submit" value="send" class="btn btn-primary">
        </form>
    </div>
@endsection
