@extends('layouts.app')
@section('title', 'users')
@section('content')
    <div class="container mt-5">
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <input type="submit" value="logout" class="btn btn-danger px-3 mb-5">
        </form>
        <form action="{{ route('posts.index') }}" method="get" class="">
            @csrf
{{--             @method('DELETE')
 --}}            <input type="submit" value="show posts" class="btn btn-secondary px-3 mb-5">
        </form>
        <a href="{{ route('users.create') }}" class="btn btn-secondary mb-5">add new user</a>
        <div class="d-flex flex-wrap">
            @forelse ($users as $user)
                <div class="card w-25 p-3 me-5 mb-5">
                    <h2 class="card-title">{{ $user->name }}</h2>
                    <p class="card-text">{{ $user->email }}</p>
{{--                     <a href="{{ route('users.show', $user->id) }}" class="btn btn-secondary mb-2">read more about this
                        user</a> --}}
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info px-4">edit user</a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="post" class="">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger px-3">delete user</button>
                        </form>
                    </div>
                </div>
            @empty
                <h1 class="text-bg-primary p-3">there is no user to show</h1>
            @endforelse

        </div>
    </div>
@endsection
