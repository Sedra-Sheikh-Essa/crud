@extends('layouts.app')
@section('title', 'edit post')
@section('content')
    <div class="container mt-5">
        <h1>update {{ $post->title }} post</h1>
        <form action="{{ route('posts.update', $post->id) }}" method="POST" class="mt-5" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Title Post:</label>
                <input type="text" name="title" placeholder="post title" class="form-control"
                    id="exampleFormControlInput1" value="{{ $post->title }}">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description Post:</label>
                <textarea name="description" placeholder="post description" class="form-control" id="exampleFormControlTextarea1"
                    rows="3">{{ $post->description }}</textarea>
            </div>
            <div class="mb-3">
                <input name="image" id="image" class="form-control" type="file" hidden>
                <label for="image">
                    <img src="/images/posts//{{ $post->image }}" alt="" class="form-control w-50">
                </label>
            </div>
            <input type="submit" value="send" class="btn btn-primary">
        </form>
    </div>
@endsection
