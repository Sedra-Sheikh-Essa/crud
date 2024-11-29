@extends('layouts.app')
@section('title', 'post')
@section('content')
    <div class="container mt-5">
        <div class="card w-75">
            <div class="card-header">
                <h2 class="card-title">Title : {{ $post->title }}</h2>
            </div>
            <div class="card-body">
                <img class="card-img-top" src="/images/posts/{{ $post->image }}" alt="" style="height:450px;">
                <p class="card-text">Description : {{ $post->description }}</p>
                <p>added at :{{ $post->created_at }}</p>
            </div>
        </div>
        <a href="{{ route('posts.index') }}" class="btn btn-danger mt-3 p-3">back</a>


    </div>
@endsection
