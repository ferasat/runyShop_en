<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

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

Auth::routes();

Route::get('/home', 'DashboardController@index')->name('home');
Route::get('/', 'HomeController@index')->name('index');

Route::group(['prefix' => '/dashboard'], function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');
});

//  ---------- SlideShow ---------
Route::group(['prefix' => '/dashboard/slideshow'], function () {
    Route::get('/', 'SlideShowController@index')->name('listSlides');
    Route::get('/new', 'SlideShowController@new')->name('newSlide');
    Route::post('/new', 'SlideShowController@save')->name('saveNewSlide');
    Route::get('/delete/{id}', 'SlideShowController@delete');
    Route::get('/edit/{id}', 'SlideShowController@edit');
    Route::get('/to/{id}', 'SlideShowController@to  ');
    Route::post('/update/{id}', 'SlideShowController@update');
    Route::get('/removePicOfSlide', 'SlideShowController@removePicSlide')->name('removePicOfSlide');
});

//  ---------- Profile ---------
Route::group(['prefix' => '/dashboard/profile'], function () {
    Route::get('/', 'ProfileController@myAcount')->name('myAcount');
    Route::get('/new', 'ProfileController@new');
    Route::get('/save', 'ProfileController@save');
});

//   ------------   Product -----
Route::group(['prefix' => '/dashboard/product'], function () {
    Route::get('/', 'ProductController@index')->name('listProduct');
    Route::get('/new', 'ProductController@new');
    Route::post('/store', 'ProductController@store');
    Route::get('/edit/{id}', 'ProductController@edit');
    Route::post('/update', 'ProductController@update');
    Route::get('/delete/{id}', 'ProductController@delete')->name('deleteProduct');
    Route::get('/copy/{id}', 'ProductController@copy');
    Route::get('/category', 'ProductController@category');
});

Route::group(['prefix' => '/product'], function () {
    Route::get('/shop', 'ProductController@shop')->name('shop');
    Route::get('/{slug}', 'ProductController@showSlug');
//    Route::get('/{id}', 'ProductController@show');
    Route::get('/', 'ProductController@showIdPro');
});
Route::group(['prefix' => '/tag/product'], function () {
    Route::get('/n/{slug}', 'TagProductController@show');
    Route::get('/i/{id}', 'TagProductController@showId');
});

//  -----------  Cart  ---------
Route::group(['prefix' => '/cart'], function () {
    Route::get('/', 'CartController@index');
    Route::get('/addToCart', 'CartController@addToCart')->name('addToCart');
    Route::post('/saveCart', 'CartController@saveCart')->name('saveCart');
    Route::get('/saveOrder', 'CartController@saveOrder')->name('saveOrder');
});

//   ------------   Settings -----
Route::group(['prefix' => '/dashboard/settings'], function () {
    Route::get('/', 'SettingController@index')->name('publicSettings');
    Route::post('/publicSettings/save', 'SettingController@publicSave')->name('publicSettingsSave');

    Route::get('/HomePage', 'ThemeController@HomePage')->name('setHomePage');
    Route::post('/HomePage/save', 'ThemeController@update')->name('saveHomePage');
});

///  -------------- Category Product ------------
Route::group(['prefix' => '/dashboard/category'], function () {
    Route::get('/', 'CategoryProductCotroller@index')->name('catPro');
    Route::post('/save', 'CategoryProductCotroller@save')->name('saveCatPro');
    Route::get('/delete/{id}', 'CategoryProductCotroller@delete');
    Route::get('/edit/{id}', 'CategoryProductCotroller@edit');
});

///  -------------- Category Product For Customer------------
Route::group(['prefix' => '/cat-product'], function () {
    Route::get('', 'CategoryProductCotroller@showId');
    Route::get('/{category_products:slug}', 'CategoryProductCotroller@showSlug');
});

///  -------------- Post For User ------------
Route::group(['prefix' => '/dashboard/posts'], function () {
    Route::get('/', 'PostController@index')->name('indexPost');
    Route::get('/new', 'PostController@new')->name('newPost');
    Route::post('/save', 'PostController@save')->name('savePost');
    Route::get('/edit/{id}', 'PostController@edit');
    Route::post('/update', 'PostController@update')->name('update');
    Route::get('/copy/{id}', 'PostController@copy');
    Route::get('/delete/{id}', 'PostController@delete');
    Route::get('/category', 'PostController@category')->name('categoryPost');
    Route::post('/category/saveCat', 'PostController@saveCat')->name('saveCatPost');
    Route::get('/category/delete/{id}', 'PostController@delCat');
    Route::get('/category/edit/{id}', 'PostController@editCat');
});

///  -------------- Post For Customer ------------
Route::group(['prefix' => '/blog'], function () {
    Route::get('/posts', 'PostController@blog')->name('blogPosts');
    Route::get('/post?id=', 'PostController@showId');
    //Route::get('/post/{url}', 'PostController@showUrl');
    Route::get('/post/{post:slug}', 'PostController@showSlug');
    Route::get('/cat-post', 'PostController@showCat');
});

Route::group(['prefix' => '/s'], function () {
    Route::get('/', 'SearchController@general');
});


/// ----------------- Page For User  -----------------
Route::prefix('/dashboard/pages')->middleware('auth')->group( function () {
    Route::get('/', 'PageController@index')->name('indexPage');
    Route::get('/new', 'PageController@newPage')->name('newPage');
    Route::post('/save', 'PageController@save')->name('savePage');
    Route::get('/edit/{id}', 'PageController@edit');
    Route::post('/update', 'PageController@update')->name('updatePage');
    Route::get('/copy/{id}', 'PageController@copy');
    Route::get('/delete/{id}', 'PageController@delete');
});

///  -------------- Page For Customer ----------------
Route::group(['prefix' => '/'], function () {
    Route::get('/page?id=', 'PageController@showId');
    Route::get('{page:slug}', 'PageController@showSlug');
});
///  -------------- Comments For Customer ----------------
Route::group(['prefix' => '/comment'], function () {
    Route::get('/save', 'CommentController@save');
});


Route::group(['prefix' => '/test'], function () {
    Route::get('/', 'TestController@index');
    Route::get('/theme3', 'TestController@theme3');
    Route::get('/search', 'TestController@search');
    Route::get('/t', 'TestController@test');
    Route::get('/searcht', 'TestController@searchTest');
});
