@extends('layouts.app')
@section('title', 'login')
@section('content')
    <div class="container mt-5">
        <h1>Login</h1>
        <form action="{{ route('login') }}" method="POST" class="mt-5" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email:</label>
                <input type="email" name="email" placeholder="Enter your Email" class="form-control"
                    id="exampleInputEmail1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password:</label>
                <input type="password" name="password" placeholder="Enter your Password" class="form-control"
                    id="exampleInputPassword1">
            </div>
{{--             <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Confirm Password:</label>
                <input type="password" name="password" placeholder="Confirm Password" class="form-label"
                    id="exampleFormControlTextarea1">
            </div> --}}
            <input type="submit" value="login" class="btn btn-primary">
        </form>
    </div>
@endsection
