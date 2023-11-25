
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"> -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div class="container">
        @include('layouts.menu')
        @if(session('success'))
            <div class="alert alert-success">{{session('success')}}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{session('error')}}</div>
        @endif
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}</div>
        @endforeach
        @yield('content')
    </div>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->
</body>
</html>
