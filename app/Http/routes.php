<?php

// Home
Route::get('/', [
	'uses' => 'HomeController@index', 
	'as' => 'home'
]);
Route::get('language/{lang}', 'HomeController@language')->where('lang', '[A-Za-z_-]+');


// Admin
Route::get('kadmin', [
	'uses' => 'AdminController@admin',
	'as' => 'admin',
	'middleware' => 'admin'
]);

Route::get('kadmin/medias', [
	'uses' => 'AdminController@filemanager',
	'as' => 'kadmin/medias',
	'middleware' => 'redac'
]);


// Blog
Route::get('blog/order', ['uses' => 'BlogController@indexOrder', 'as' => 'blog.order']);
Route::get('articles2', 'BlogController@indexFront');
Route::get('blog/tag', 'BlogController@tag');
Route::get('blog/search', 'BlogController@search');

Route::put('postseen/{id}', 'BlogController@updateSeen');
Route::put('postactive/{id}', 'BlogController@updateActive');

Route::resource('blog', 'BlogController');

// Comment
Route::resource('comment', 'CommentController', [
	'except' => ['create', 'show']
]);

Route::put('commentseen/{id}', 'CommentController@updateSeen');
Route::put('uservalid/{id}', 'CommentController@valid');


// Contact
Route::resource('contact', 'ContactController', [
	'except' => ['show', 'edit']
]);


// User
Route::get('kadmin/user/sort/{role}', 'UserController@indexSort');

Route::get('kadmin/user/roles', 'UserController@getRoles');
Route::post('kadmin/user/roles', 'UserController@postRoles');

Route::put('userseen/{user}', 'UserController@updateSeen');

Route::resource('kadmin/user', 'UserController');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
Route::get('auth/confirm/{token}', 'Auth\AuthController@getConfirm');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');


/**************************************************************************/

// ASTRO
Route::get('astro', 'Astro\AstroController@index');

//контакты
Route::get('contacts', 'Astro\ContactsController@index');
Route::post('contacts', 'Astro\ContactsController@store');

//статьи
Route::get('articles', 'Astro\ArticlesController@indexFront');
Route::resource('article', 'Astro\ArticlesController');
Route::get('article/order', ['uses' => 'Astro\ArticlesController@indexOrder', 'as' => 'article.order']);
Route::get('articles/search', 'Astro\ArticlesController@search');
Route::get('articles/{slug}', 'Astro\ArticlesController@indexFront');

//Твиттер
Route::resource('twitter', 'Astro\TwitterController');

//Kadmin
Route::get('kadmin/login', 'Auth\AuthController@getLogin');
Route::post('kadmin/login', 'Auth\AuthController@postLogin');
Route::get('kadmin/logout', 'Auth\AuthController@getLogout');

Route::resource('kadmin/contacts', 'Kadmin\ContactsController', [
	'except' => ['show', 'edit']
]);

Route::get('kadmin/articles/order', ['uses' => 'Kadmin\ArticlesController@indexOrder', 'as' => 'kadmin.articles.order']);
Route::resource('kadmin/articles', 'Kadmin\ArticlesController');

Route::get('kadmin/category/order', ['uses' => 'Kadmin\CategoryController@indexOrder', 'as' => 'kadmin.category.order']);
Route::resource('kadmin/category', 'Kadmin\CategoryController');
Route::put('kadmin/postactivecategory/{id}', 'Kadmin\CategoryController@updateActive');