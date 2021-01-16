<?php

use Illuminate\Support\Facades\Route;
// Controller for admin
use App\Http\Controllers\AdminAuth;
use App\Http\Controllers\admin\Post;
use App\Http\Controllers\admin\PageController;
use App\Http\Controllers\ContactController;

// Controller for frontend
use App\Http\Controllers\frontend\PostController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/*
        Frontend Route
    ======================
*/

Route::get('/', [PostController::class, 'home']);
Route::get('/post/{id}', [PostController::class, 'post']);








/*
                Backend Route
            ======================
*/
Route::get('/admin/login', [AdminAuth::class, 'login']);
Route::post('/admin/login-submit', [AdminAuth::class, 'login_submit']);
Route::get('/admin/logout', function () {
    session()->forget('BLOG_USER_ID');
    return redirect('/admin/login');
});

Route::group(['middleware' => 'adminCheck'], function ()
{

    Route::view('layout', '/admin/layout/layout');
    Route::view('admin/dashboard', '/admin/dashboard');

    Route::get('admin/post-list', [Post::class, 'listing']);

    Route::view('admin/post-add', '/admin/post/add');
    Route::post('admin/post-Submit', [Post::class, 'submit']);
    Route::get('admin/post-delete/{id}', [Post::class, 'delete']);

    // post update
    // Route::get('admin/post-edit', [Post::class, 'edit']);
    // Route::view('admin/post-edit', 'admin/post/edit');
    Route::get('/admin/post-edit/{id}', [Post::class, 'edit']);
    Route::post('admin/post-update/{id}', [Post::class, 'update']);

    // page
    Route::get('/admin/page/list', [PageController::class, 'listing']);
    Route::view('admin/page/add', '/admin/page/add');
    Route::post('admin/page/Submit', [PageController::class, 'submit']);
    Route::get('/admin/page/edit/{id}', [PageController::class, 'edit']);
    Route::post('/admin/page/update/{id}', [PageController::class, 'update']);
    Route::get('/admin/page/delete/{id}', [PageController::class, 'delete']);

    Route::get('/admin/contact/list', [ContactController::class, 'listing']);
});


