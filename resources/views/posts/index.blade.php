@extends('layouts.app')
@section('title', 'posts')
@section('content')
    <div class="container mt-5">
        <a href="{{ route('posts.create') }}" class="btn btn-secondary mb-5">add new post</a>
        <div class="d-flex flex-wrap">
            @forelse ($posts as $post)
                <div class="card w-25 p-3 me-5">
                    <img class="card-img-top h-75" src="/images/posts/{{ $post->image }}" alt="">
                    <h2 class="card-title">{{ $post->title }}</h2>
                    <p class="card-text">{{ $post->description }}</p>
                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-secondary mb-2">read more about this post</a>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-info px-4">edit post</a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="post" class="">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger px-3">delete post</button>
                        </form>
                    </div>
                </div>
            @empty
                <h1 class="text-bg-primary p-3">there is no post to show</h1>
            @endforelse
        </div>
    </div>
@endsection
