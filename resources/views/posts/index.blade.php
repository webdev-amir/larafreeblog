@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12">
        <h1>Posts</h1>
        <a href="{{ route('posts.create') }}" class="btn btn-primary">Create Post</a>
    </div>
    <div class="col-md-12">
        <table class="table">
            <tr>
                <th>Title</th>
                <th>Slug</th>
                <th>Image</th>
                <th>Published</th>
                <th>Published At</th>
                <th>Actions</th>

            </tr>
            @foreach ($posts as $post)
            <tr>
                <td>{{ $post->title }}</td>
                <td>{{ $post->slug }}</td>
                <td><img src="{{ $post->image }}" alt="" width="100"></td>
                <td>{{ $post->published }}</td>
                <td>{{ $post->published_at }}</td>
                <td>
                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">Show</a>
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>

    </div>
</div>
@endsection