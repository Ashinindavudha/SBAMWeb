<?php

//User Route
Route::group(['namespace' => 'User'], function(){
Route::get('/', 'HomeController@index');
Route::get('post/{post?}', 'PostController@post')->name('post');


Route::get('post/tag/{tag}', 'HomeController@tag')->name('tag');
Route::get('post/category/{category}', 'HomeController@category')->name('category');
});


//admin Route  // 'middleware' => 'auth:admin'
Route::group(['namespace' => 'Admin'], function(){
Route::get('admin/home', 'HomeController@index')->name('admin.home');

// Role Route
Route::resource('admin/role', 'RoleController');

// Permission Route
Route::resource('admin/permission', 'PermissionController');


// User Route
Route::resource('admin/user', 'UserController');

// Post Route
Route::resource('admin/post', 'PostController');

//Tag Route
Route::resource('admin/tag', 'TagController');

//Category Route
Route::resource('admin/category', 'CategoryController');

//Admin Auth Routes
Route::get('admin-login', 'Auth\LoginController@showLoginForm')->name('admin.login');
Route::post('admin-login', 'Auth\LoginController@login');
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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
