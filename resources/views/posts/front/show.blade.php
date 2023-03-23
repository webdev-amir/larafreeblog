@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12">
        <p><img src="{{$post->Pictures}}" alt="" width="100"></p>
        
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->body }}</p>
        <p>{{ $post->slug }}</p>
        <p>{{ $post->published }}</p>
        <p>{{ $post->published_at }}</p>
    </div>
</div>
@endsection