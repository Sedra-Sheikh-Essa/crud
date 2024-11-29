@extends('layouts.app')
@section('title', 'add post')
@section('content')
    <div class="container mt-5">
        <h1>add new post</h1>
        <form action="{{ route('posts.store') }}" method="POST" class="mt-5" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Title Post:</label>
                <input type="text" name="title" placeholder="post title" class="form-control"
                    id="exampleFormControlInput1">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description Post:</label>
                <textarea name="description" placeholder="post description" class="form-control" id="exampleFormControlTextarea1"
                    rows="3"></textarea>
            </div>
            <div class="mb-3">
                <input name="image[]" class="form-control" type="file" multiple>
            </div>
            <input type="submit" value="send" class="btn btn-primary">
        </form>
    </div>
@endsection
