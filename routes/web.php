<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/posts', [App\Http\Controllers\PostController::class, 'index'])
// ->name('posts.index');

// Route::get('/posts/create', [App\Http\Controllers\PostController::class, 'create'])
// ->name('posts.create');

// Route::post('/posts', [App\Http\Controllers\PostController::class, 'store'])
// ->name('posts.store');

// Route::get('/posts/{post}', [App\Http\Controllers\PostController::class, 'show'])
// ->name('posts.show');

// Route::get('/posts/{post}/edit', [App\Http\Controllers\PostController::class, 'edit'])
// ->name('posts.edit');

// Route::put('/posts/{post}', [App\Http\Controllers\PostController::class, 'update'])->name('posts.update');

// Route::delete('/posts/{post}', [App\Http\Controllers\PostController::class, 'destroy'])->name('posts.destroy');


Route::prefix('posts')->middleware('auth')->controller(App\Http\Controllers\PostController::class)->group(function () {    
    // Route::get('/', 'index')->name('posts.index');
    // Route::get('/create', 'create')->name('posts.create');
    // Route::post('/', 'store')->name('posts.store');
    // Route::get('/{post}', 'show')->name('posts.show');
    // Route::get('/{post}/edit', 'edit')->name('posts.edit');
    // Route::put('/{post}', 'update')->name('posts.update');
    // Route::delete('/{post}', 'destroy')->name('posts.destroy');
    Route::get("/",[
        "uses" => "App\Http\Controllers\PostController@index",
        "as" => "posts.index",
        "middleware" => "role",
        "roles" => ["user","admin"]
    ]);
    Route::get("/create",[
        "uses" => "App\Http\Controllers\PostController@create",
        "as" => "posts.create",
        "middleware" => "role",
        "roles" => ["user","admin"]
    ]);
    Route::post("/",[
        "uses" => "App\Http\Controllers\PostController@store",
        "as" => "posts.store",
        "middleware" => "role",
        "roles" => ["user","admin"]
    ]);
    Route::get("/{post}",[
        "uses" => "App\Http\Controllers\PostController@show",
        "as" => "posts.show",
        "middleware" => "role",
        "roles" => ["user","admin"]
    ]);
    Route::get("/{post}/edit",[
        "uses" => "App\Http\Controllers\PostController@edit",
        "as" => "posts.edit",
        "middleware" => "role",
        "roles" => ["user","admin"]
    ]);
    Route::put("/{post}",[
        "uses" => "App\Http\Controllers\PostController@update",
        "as" => "posts.update",
        "middleware" => "role",
        "roles" => ["user","admin"]
    ]);
    Route::delete("/{post}",[
        "uses" => "App\Http\Controllers\PostController@destroy",
        "as" => "posts.destroy",
        "middleware" => "role",
        "roles" => ["admin"]
    ]);
    Route::post("/{post}/comments",[
        "uses" => "App\Http\Controllers\CommentController@store",
        "as" => "posts.comments.store",
        "middleware" => "role",
        "roles" => ["user","admin"]
    ]);
    Route::delete("/{post}/comments/{comment}",[
        "uses" => "App\Http\Controllers\CommentController@destroy",
        "as" => "posts.comments.destroy",
        "middleware" => "role",
        "roles" => ["admin","user"]
    ]);
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


