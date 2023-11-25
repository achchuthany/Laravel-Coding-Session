@extends('layouts.master')
@section('title', 'Edit Post')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="float-start">Edit Post</h3>
        <a href="{{route('posts.index')}}" class="btn btn-dark float-end">Back</a>
    </div>
    <div class="card-body">
        <form action="{{ route('posts.update', $post) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Post Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}" required>
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Post Body</label>
                <textarea class="form-control" id="body" name="body" rows="5" required>{{ $post->body }}</textarea>
            </div>
                <button type="submit" class="btn btn-primary float-end">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection