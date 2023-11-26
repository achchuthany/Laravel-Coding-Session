@extends('layouts.master')
@section('title','Edit User')
@section('content')
<div class="card shadow border-0">
    <div class="card-header bg-white">
        <h4 class="card-title float-start">Edit User</h4>
        <a href="{{route('users.index')}}" class="btn btn-dark float-end">Back</a>
    </div>
    <div class="card-body">
        <form action="{{route('users.update',$user)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" value="{{$user->name}}" name="name" class="form-control" id="name" placeholder="Enter name">
                @error('name')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="text" value="{{$user->email}}" name="email" class="form-control" id="email" placeholder="Enter email">
                @error('email')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select name="role" id="role" class="form-control">
                    <option value="user" {{$user->role == 'user' ? 'selected' : ''}}>User</option>
                    <option value="admin" {{$user->role == 'admin' ? 'selected' : ''}}>Admin</option>
                </select>
                @error('role')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary float-end">Update</button>
        </form>
    </div>
</div>
@endsection