# Laravel Coding Session

Welcome to the Laravel Coding Session repository! This guide will walk you through the essential steps of building a Laravel application, covering installation, folder structure, CRUD operations, user authentication, and Bootstrap integration.

## Table of Contents

1. [Installation](#installation)
    1. [Create a Project](#create-a-project)
    2. [Change Initial Configuration](#change-initial-configuration)
    3. [Environment Based Configuration](#change-initial-configuration)
2. [Understanding Folder Structure](#folder-structure)
3. [Creating a Post Model](#post-model)
4. [Implementing CRUD Operations](#crud-operations)
5. [Implementing User Authentication](#user-authentication)
6. [Installing Bootstrap](#installing-bootstrap)

## Installation

### Create a Project

Follow these steps to install Laravel on your machine:

```bash
composer create-project laravel/laravel Laravel-Coding-Session
```

```
cd Laravel-Coding-Session
```

Start Laravel's local development server:

```
php artisan serve
```

### Change Initial Configuration

`config/app.php` : timezone and locale that you may wish to change according to your application.

### Environment Based Configuration

Create a copy of your `.env` file from `.env.example`

```
cp .env.example .env
```

Update `.env` based on you requirements.

generate the app encryption key: encrypting cookies and session

```
php artisan key:generate
```

## Create Post

Create Model, Controller, View by using command: 
```
php artisan make:model Post -mcr
```
`m` - Migration , `c` - Controller, `c` - resource controller

```
php artisan make:view posts/index
php artisan make:view posts/show
php artisan make:view posts/create
php artisan make:view posts/edit
```

### Actions Handled By Resource Controller
Reference: https://laravel.com/docs/10.x/controllers#actions-handled-by-resource-controller

| Verb  | URI                   | Action    | Route Name    |
| ----- | ---------------       |---------- | ---------     |
| GET   | /posts                | index     | posts.index   |
| GET   | /posts/create         | create    | posts.create  |
| POST  | /posts	            | store     | posts.store   |
| GET   | /posts/{post}           | show      | posts.show    |
| GET   | /posts/{post}/edit      | edit      | posts.edit    |
| PATCH	| /posts/{post}	        | update    | posts.update  | 
| DELETE | /posts/{post}	        | destroy   | posts.destroy |


| Verb         | URI                          | Action | Route Name            |
| ------------ | ---------------------------- | ------ | --------------------- |
| GET          | /posts/{post}/comments     | index  | posts.comments.index |
| GET          | /posts/{post}/comments/create | create | posts.comments.create |
| POST         | /posts/{post}/comments     | store  | posts.comments.store |
| GET          | /comments/{comment}          | show   | comments.show         |
| GET          | /comments/{comment}/edit     | edit   | comments.edit         |
| PUT/PATCH    | /comments/{comment}          | update | comments.update       |
| DELETE       | /comments/{comment}          | destroy| comments.destroy      |


### Sample Bootstrap 5 Page

Update `resources/posts/index.blade.php` with the following code:
```
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap 5 Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Logo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Posts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Users</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1>Welcome to my Bootstrap 5 page!</h1>
        <p>This is a basic example of a Bootstrap 5 page with a menu.</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
```

### Making Layout

Reference: https://laravel.com/docs/10.x/blade#defining-a-layout
```
<!-- resources/views/layouts/master.blade.php -->
 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

```

### Extending A Layout

```
<!-- resources/views/posts/index.blade.php -->
 
@extends('layouts.master')
 
@section('title', 'Page Title')
 
@section('sidebar')
    @parent
 
    <p>This is appended to the master sidebar.</p>
@endsection
 
@section('content')
    <p>This is my body content.</p>
@endsection
```

# Laravel UI

Installation : https://github.com/laravel/ui#installation

```
composer require laravel/ui
php artisan ui bootstrap --auth
```


```
 php artisan make:migration --table=users add_user_type_to_user
```