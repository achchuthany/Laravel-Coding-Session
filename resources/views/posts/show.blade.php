@extends('layouts.master')
@section('title', 'Show Post')
@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header bg-white">
        <h4 class="float-start card-title">{{ $post->title }}</h4>
        <a href="{{route('posts.index')}}" class="btn btn-dark float-end">Back</a>
    </div>
    <div class="card-body">
        <p class="card-text">{{ $post->body }}</p>
    </div>
    <div class="card-footer">
        <p class="float-start">Created by: {{ $post->user->name }}</p>
        <p class="float-end">Created at: {{ $post->created_at }}</p>
    </div>
</div>

<div class="card shadow-sm border-0 mt-4">
    <div class="card-header bg-white">
        <h4 class="card-title">Post a Comment</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('posts.comments.store',[$post]) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="comment" class="form-label">Comment</label>
                <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary float-end">Post Comment</button>
        </form>
    </div>
</div>

<div class="card my-4 shadow-sm border-0">
    <div class="card-header bg-white">
        <h4 class="card-title">Comments</h4>
    </div>
    <div class="card-body">
        @foreach($post->comments as $comment)
        <div class="card border-0 mt-2">
            <div class="card-body">
                <p class="card-text">{{ $comment->comment }}</p>
            </div>
            <div class="card-footer">
                <p class="float-start text-muted">Created by {{ $comment->user->name }} at {{ $comment->created_at->diffForHumans() }}</p>
                <form action="{{ route('posts.comments.destroy', [$post, $comment]) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger float-end" onclick="return confirm('Are you sure you want to delete this comment?')">Delete</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
    
@endsection