<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;

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

//Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//ProfilleController
Route::controller(ProfileController::class)->middleware('auth')->group(function () {
    Route::get('/profile', 'edit')->name('profile.edit');
    Route::patch('/profile', 'update')->name('profile.update');
    Route::delete('/profile', 'destroy')->name('profile.destroy');
});

//PostController
Route::controller(PostController::class)->middleware(['auth'])->group(function(){
   Route::get('/posts/create', 'create_post')->name('create_post');
   Route::post('posts', 'store_post')->name('store_post');
   Route::get('/mypage/bookmarks', 'bookmark_posts')->name('mypage_bookmarks');
   Route::get('/mypage', 'mypage')->name('mypage');
   Route::get('/mypage/posts', 'mypage_post')->name('mypage_post');
   Route::get('/posts/{post}/edit', 'edit_post')->name('edit_post');
   Route::put('/posts/{post}', 'update_post')->name('update_post');
   Route::delete('/posts/{post}', 'delete_post')->name('delete_post');
});

//PostController(認証なしで見れる)
Route::controller(PostController::class)->group(function(){
    Route::get('/top', 'top') ->name('top');
    Route::get('/posts/index', 'index_post')->name('index_post');
    Route::get('/posts/{post}', 'show_post')->name('show_post');
});

//WorkController
Route::controller(WorkController::class)->middleware(['auth'])->group(function(){
    Route::get('/works/create', 'create_work')->name('create_work');
    Route::post('/works', 'store_work')->name('store_work');
    Route::get('/works/{work}/edit', 'edit_work')->name('edit_work');
    Route::put('/works/{work}', 'update_work')->name('update_work');
    Route::delete('/works/{work}', 'delete_work')->name('delete_work');
});

//WorkController(認証なしで見れる)
Route::controller(WorkController::class)->group(function(){
    Route::get('/works/index', 'index_work')->name('index_work');
    Route::get('/works/{work}', 'show_work')->name('show_work');
});

//BookmarkController
Route::controller(BookmarkController::class)->middleware(['auth'])->group(function(){
    Route::post('/posts/{post}/bookmark', 'store_bookmark')->name('store_bookmark');
    Route::delete('/posts/{post}/unbookmark', 'delete_bookmark')->name('delete_bookmark');
});

//UserController
Route::controller(UserController::class)->group(function(){
    Route::get('/users/{user}', 'user_post')->name('user_post');
});

//CommentController
Route::controller(CommentController::class)->middleware(['auth'])->group(function(){
    Route::post('/posts/{comment}/comments', 'store_comment')->name('store_comment');
    Route::get('/comments/{comment}', 'delete_comment')->name('delete_comment');
});

require __DIR__.'/auth.php';