@extends('layouts.master')
@section('title', 'Unauthorized')
@section('content')
<div class="row align-items-center justify-content-center vh-100">
    <div class="col-md-4 text-center">
        <h1>Unauthorized</h1>
        <p>You are not authorized to access this page.</p>
        <a href="{{route('home')}}" class="btn btn-primary">Go Home</a>
</div>
@endsection