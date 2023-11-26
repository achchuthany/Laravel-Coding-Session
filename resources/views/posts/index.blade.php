@extends('layouts.master')
@section('title','Posts')
@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header bg-white">
        <a href="{{route('posts.create')}}" class="btn btn-primary float-end">Create Post</a>
        <h4 class="card-title">Posts</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-borderless table-striped ">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Date</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <td>{{$post->title}}</td>
                        <td>{{$post->user->name}}</td>
                        <td>{{$post->updated_at->diffForHumans()}}</td>
                        <td>
                            <a href="{{route('posts.show',$post)}}" class="btn btn-sm btn-info">View</a>
                            <a href="{{route('posts.edit',$post)}}" class="btn btn-sm btn-dark">Edit</a> 
                            <form action="{{route('posts.destroy',$post)}}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection