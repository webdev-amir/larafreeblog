@extends('layouts.app')
@section('content')
<div class="row">
    @foreach ($posts as $post)

    <div class="col-md-6">
        <a href="{{route('posts.front.show',[$post->slug])}}">
            <h1>{{ $post->title }}</h1>
        </a>
        <p><img src="{{ $post->Pictures }}" alt="" width="100"></p>
        <p>{{ $post->body }}</p>
        <p>{{ $post->published_at }}</p>
    </div>
    @endforeach
</div>
@endsection