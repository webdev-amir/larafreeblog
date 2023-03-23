@extends('layouts.app')
@section('content')
<section class="content-header">

    <div class="row">
        <div class="col-12">
            <h1>Edit Post</h1>
        </div>
        <div class="col-md-12">

            <form action="{{'posts.edit',[$post->id]}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="Enter title" value="{{ $post->title }}">
                    @if($errors->has('title'))
                    <div class="error">{{ $errors->first('title') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="body">Body</label>
                    <textarea name="body" id="body" cols="30" rows="10" class="form-control">{{ $post->body }}</textarea>
                    @if($errors->has('body'))
                    <div class="error">{{ $errors->first('body') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    @if($post->image)
                    <img src="{{ asset('posts/' . $post->image) }}" alt="" width="200">
                    @endif
                    <label for="image">Image</label>
                    <input type="file" name="image" class="form-control" id="image" placeholder="Enter image" value="{{ $post->image }}">
                    @if($errors->has('image'))
                    <div class="error">{{ $errors->first('image') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="published">Published</label>
                    <select name="published" id="published">
                        <option value="1" @if($post->published ==1) selected @endif>Yes</option>
                        <option value="0" @if($post->published ==0) selected @endif>No</option>
                    </select>

                </div>
                <div class="form-group">
                    <label for="published_at">Published At</label>
                    <input type="date" name="published_at" value="{{$post->published_at}}">
                    @if($errors->has('published_at'))
                    <div class="error">{{ $errors->first('published_at') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

            </form>
        </div>

    </div>
</section>

@endsection