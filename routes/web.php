<?php
use App\Post;
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

Route::get('/', function () {

    $posts= Post:: orderBy('created_at','DESC')->paginate(3);
    $lastAddedPosts= Post:: orderBy('created_at','DESC')->take(3)->get();
    return view('index',compact('posts','lastAddedPosts'));
});
Route::resource('/posts','PostsController');
Route::get('/users/add',[
    'uses'=> 'UsersController@create',
    'as'=>'user.add'
]);

Route::post('/users/create',[
    'uses'=> 'UsersController@register',
    'as'=>'user.create'
]);
Route::get('/users/login',[
    'uses'=> 'UsersController@login',
    'as'=>'user.login'
]);
Route::post('/users/auth',[
    'uses'=> 'UsersController@auth',
    'as'=>'user.auth'
]);
Route::get('/users/logout',[
    'uses'=> 'UsersController@logout',
    'as'=>'user.logout'
]);
Route::post('/comment/add',[
    'uses'=> 'CommentsController@store',
    'as'=>'comment.store'
]);
Route::post('/post/{id}/update',[
    'uses'=> 'PostsController@update',
    'as'=>'post.update'
]);
Route::get('/post/{id}/delete',[
    'uses'=> 'PostsController@destroy',
    'as'=>'post.delete'
]);
Route::post('/post/search',[
    'uses'=> 'PostsController@search',
    'as'=>'posts.search'
]);




   

