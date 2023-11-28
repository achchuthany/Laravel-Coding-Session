@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card border-0">
                <div class="card-header">{{ __('My Posts') }}</div>
                <div class="row row-cols-1 row-cols-md-3 g-4 mt-1">
                    @foreach($posts as $post)
                    <div class="col">
                        <div class="card h-100 border-0 shadow">
                            <div class="card-header bg-white">
                                <h4>{{ $post->title }}</h4>
                            </div>
                            <div class="card-body">
                                <p class="card-text">{{ $post->body }}</p>
                                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-primary float-end">Read More</a>
                            </div>
                            
                            <div class="card-footer">
                                <span class="text-body-secondary float-start"> {{$post->comments->count()}} Comments </span>
                                <span class="text-body-secondary float-end">Last updated {{$post->updated_at->diffForHumans()}}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
