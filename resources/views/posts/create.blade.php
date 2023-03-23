@extends('layouts.app')
@section('content')
<section class="content-header">
    <div class="row">
        <div class="col-12">
            <h1>Create Post</h1>
        </div>
        <div class="col-md-12">
            <form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="Enter title">
                    @if($errors->has('title'))
                    <div class="error">{{ $errors->first('title') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="body">Body</label>
                    <textarea name="body" id="body" cols="30" rows="10" class="form-control"></textarea>
                    @if($errors->has('body'))
                    <div class="error">{{ $errors->first('body') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" class="form-control" id="image" placeholder="Enter image">
                    @if($errors->has('image'))
                    <div class="error">{{ $errors->first('image') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="published">Published</label>
                    <select name="published" id="published">
                        <option value="1" >Yes</option>
                        <option value="0" >No</option>
                    </select>

                    @if($errors->has('published'))
                    <div class="error">{{ $errors->first('published') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="published_at">Published At</label>
                    <input type="date" name="published_at" value="">
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