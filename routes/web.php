<?php

//User Route
Route::group(['namespace' => 'User'], function(){
Route::get('/', 'HomeController@index');
Route::get('/post', 'PostController@index')->name('post');
});


//admin Route
Route::group(['namespace' => 'Admin'], function(){
Route::get('admin/home', 'HomeController@index')->name('admin.home');
// User Route
Route::resource('admin/user', 'UserController');

// Post Route
Route::resource('admin/post', 'PostController');

//Tag Route
Route::resource('admin/tag', 'TagController');

//Category Route
Route::resource('admin/category', 'CategoryController');
});


/*Route::get('/', function () {
    return view('user.blog');
});

Route::get('/post', function () {
    return view('user.post');
})->name('post'); */

/*Route::get('/admin/home', function () {
    return view('admin.home');
})->name('admin');

Route::get('/admin/post', function () {
    return view('admin.posts.post');
});

Route::get('/admin/tag', function () {
    return view('admin.Tag.tag');
});

Route::get('/admin/category', function () {
    return view('admin.category.category');
});*/
