<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\ImageController;
use App\Http\Controllers\PostController;

use Illuminate\Support\Facades\Mail;


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


Route::get('/', [MainController::class, 'home'])->name('home');;



// Route::get('/posts/add_category', [PostController:: class, 'edit_add_category'])->name('posts.edit_add_category');
Route::get('/posts/{id}/editcategory', [PostController:: class, 'editcategory'])->name('posts.editcategory');
Route::get('/posts/{id}/updated', [PostController:: class, 'updatedcategory'])->name('posts.updatedcategory');
Route::get('/posts/{id}/deletecat', [PostController:: class, 'deletecat'])->name('posts.deletecat');

Route::get('/posts/trash', [PostController:: class, 'trashed'])->name('posts.trashed');
Route::get('/posts/{id}/restore', [PostController:: class, 'restore'])->name('posts.restore');
Route::delete('posts/{id}/force-delete',[PostController::class, 'forceDelete'])->name('posts.force_delete');
Route::get('posts/{id}/comments',[PostController::class, 'comments'])->name('posts.comments');



Route::resource('/posts', PostController:: class);



Route::get('send-mail', function(){
    Mail::raw('this is a test mail', function($message){
        $message->to('mikettahadson@gmail.com')->subject('test - subject');
    });

    dd('success');
});
