# Laravel Coding Session

Welcome to the Laravel Coding Session repository! This guide will walk you through the essential steps of building a Laravel application, covering installation, folder structure, CRUD operations, user authentication, and Bootstrap integration.

## Table of Contents
- [Installation](#installation)
    - [Create a Project](#create-a-project)
    - [Change Initial Configuration](#change-initial-configuration)
    - [Environment Based Configuration](#environment-based-configuration)
    - [Create Post View without Database](#create-post-view-without-database)
    - [Actions Handled By Resource Controller](#actions-handled-by-resource-controller)
    - [Sample Bootstrap 5 Page](#sample-bootstrap-5-page)




## Installation
### Laravel 10 Requirements
1. Open a terminal or command prompt.
    - Type `php -v` and press Enter to check your PHP version.
        - Ensure it's PHP 8.1 or later.
        - If your PHP version is not compatible, Visit the official site & install (https://www.apachefriends.org)
    - Type `node -v` and press Enter to check your Node.js version.
        - If your Node.js version is not compatible, Visit the official site and install (https://nodejs.org/en)

2. If your PHP version is greater than 8.1, download and install Composer. https://getcomposer.org
   
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

## Create Post View without Database

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

Update `resources/view/posts/index.blade.php` with the following code:
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

### Update the Route 
Navigate to `web.php` in `routes` folder: 

```
Route::get('/posts', [App\Http\Controllers\PostController::class, 'index'])->name('posts.index');

Route::get('/posts/create', [App\Http\Controllers\PostController::class, 'create'])->name('posts.create');

Route::post('/posts', [App\Http\Controllers\PostController::class, 'store'])->name('posts.store');
```

### Update the View
List the all post in `resources/view/posts/index.blade.php`:

```
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
                    <tr>
                        <th>Title 1</th>
                        <th>Author 1</th>
                        <th>10/11/2023</th>
                        <th>Edit|Delete</th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

```

create a new post: `resources/view/posts/create.blade.php`:

```
<div class="card shadow-sm border-0">
    <div class="card-header">
        <h3 class="float-start">Create Post</h3>
        <a href="{{route('posts.index')}}" class="btn btn-dark float-end">Back</a>
    </div>
    <div class="card-body">
        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Post Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Post Body</label>
                <textarea class="form-control" id="body" name="body" rows="5" required></textarea>
            </div>
                <button type="submit" class="btn btn-primary float-end">Create</button>
            </form>
        </div>
    </div>
</div>
```

### Update the Controller
navigate to `App\Http\Controllers\PostController.php`:

update the `index` function:
```
return view('posts.index');
```
update the `create` function:
```
return view('posts.create');
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
@section('content')
    <p>This is my body content.</p>
@endsection
```

Update the remaining views of posts by above layout.


## Update Database Migration for Post Model

Laravel Installation have the user migration, lets update the posts table

`database/migrations/yyyy_mm_dd_nnnnnn_posts_table.php`

```
public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title',100);
            $table->text('body',1000);
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')
                    ->onUpdate('cascade')
                    ->onDelete('cascade'); // foreign key
            $table->timestamps();
        });
    }
```

## Update Relationships of each Model

User has May Posts, Post belongs to User 

User->Post : (1->N)

1. User Model

```
public function posts()
{
    return $this->hasMany(Post::class);
}
```

2. Post Model

```
public function user()
{
    return $this->belongsTo(User::class)->withTrashed();
}
```

## Show the Posts in Details
navigate to show view : `resources/view/posts/show.blade.php`:

```
<div class="card shadow-sm border-0">
    <div class="card-header bg-white">
        <h4 class="float-start card-title">Title</h4>
        <a href="{{route('posts.index')}}" class="btn btn-dark float-end">Back</a>
    </div>
    <div class="card-body">
        <p class="card-text">Body........</p>
    </div>
    <div class="card-footer">
        <p class="float-start">Created by: User</p>
        <p class="float-end">Created at: 11/11/2023</p>
    </div>
</div>

```
navigate to `App\Http\Controllers\PostController.php`:
update the `show` function
```
return view('posts.show');
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

## Soft Deleting User
Reference: https://laravel.com/docs/10.x/eloquent#soft-deleting

Add the following in user model
```
use Illuminate\Database\Eloquent\SoftDeletes;

....

 use SoftDeletes;
```

 add the deleted_at column to `users` table

 ```
 php artisan make:migration --table=users add_deleted_at_column_to_users
 ```

add the following in migration file
 ```

Schema::table('flights', function (Blueprint $table) {
    $table->softDeletes();
});
 
Schema::table('flights', function (Blueprint $table) {
    $table->dropSoftDeletes();
});
 
 ```


 Update the Post, Comment Model to fetch deleted user

 `Post,Comment Model`

 ```
    public function user(){
        return $this->belongsTo(User::class)->withTrashed();
    }
 ```


 ## Generating 

Create Post 

```
 php artisan make:factory PostFactory
```
<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Post;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        return [
            'title'         => $this->faker->realText(100),
            'body'          => $this->faker->text(1000),
            'user_id'       => User::factory()->create()->id,
            'created_at'    => now(),
            'updated_at'    => now()
        ];
    }
}

```

 ```
 php artisan tinker
 Post::factory()->count(10)->create();
 ```
