<?php

use App\Post;
use App\User;

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
    return view('welcome');
});

Route::get('/create',function(){

	$user = User::findOrFail(1);
	$post = new Post(['title'=>'My first post with edwin diaz','body'=>'I love laravel with edwin diaz']);
	$user->posts()->save($post);

});

Route::get('/read',function(){

	$user = User::findOrFail(1);
	// return $user->posts;
	// dd($user->posts);
	foreach ($user->posts as $post) {
		echo $post->title."<br>";
	}

});

Route::get('/update',function(){

	$user = User::findOrFail(1);
	$user->posts()->whereId(2)->update(['title'=>'I love laravel','body'=>'It is awesome']);

});

Route::get('/delete',function(){

	$user = User::findOrFail(1);
	// $user->posts()->delete();//to delete all rows in post table
	$user->posts()->whereId(2)->delete();

});
